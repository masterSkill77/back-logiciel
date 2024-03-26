<?php

namespace App\Http\Controllers\API;

use App\Exceptions\NotAllowedRessourceException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\ExteriorDetailService;
use App\Services\InteriorDetailService;
use App\Services\InfoCoproprieteService;
use App\Services\TerrainService;
use App\Services\DiagnosticService;
use App\Services\RentalInvestService;
use App\Services\InfoFinanciereService;
use App\Services\SectorService;
use App\Services\PhotosService;
use App\Services\BienService;
use App\Services\AvalaibilitiesService;
use App\Services\AdvertissementsService;
use App\Http\Requests\Detail\CreateInteriorDetailRequest;
use App\Http\Requests\Detail\CreateExternDetailRequest;
use App\Http\Requests\InfoCopropriete\CreateInfoCoprprieteRequest;
use App\Http\Requests\Terrain\CreateTerrainRequest;
use App\Http\Requests\Diagnostique\CreateDiagnostiqueRequest;
use App\Http\Requests\RentalInvest\RentalInvestRequest;
use App\Http\Requests\InfoFinanciere\InfoFinanciereRequest;
use App\Http\Requests\Sector\SectorRequest;
use App\Http\Requests\Photos\PhotoRequest;
use App\Http\Requests\Bien\BienRequest;
use App\Http\Requests\Mandate\MandateRequest;
use App\Http\Requests\Advertissement\AdvertissementRequest;
use App\Http\Requests\Avalaibilities\AvalaibilitiesRequest;
use App\Models\Bien;
use App\Services\MandateService;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BienController extends Controller
{
    public function __construct(
        public ExteriorDetailService $exteriorDetailService,
        public InteriorDetailService $interiorDetailService,
        public TerrainService $terrainService,
        public InfoCoproprieteService $infoCoproprieteService,
        public DiagnosticService $diagnostiqueService,
        public RentalInvestService $rentalInvestService,
        public InfoFinanciereService $infoFinanciereService,
        public SectorService $sectorService,
        public PhotosService $photoService,
        public AdvertissementsService $advertissementService,
        public BienService $bienService,
        public MandateService $mandateService,
        public AvalaibilitiesService $avalaibilitiesService

    ) {
    }

    /**
     * creation du bien
     * return json
     */
    public function createBien(
        CreateExternDetailRequest $requestExterior,
        CreateTerrainRequest $requestTerrain,
        CreateInteriorDetailRequest $requestInterior,
        CreateInfoCoprprieteRequest $infoCoproprieteRequest,
        CreateDiagnostiqueRequest $requestDiagnostique,
        RentalInvestRequest $requestRentalInvest,
        InfoFinanciereRequest $requestInfoFinanciere,
        SectorRequest $requestSector,
        PhotoRequest $requestPhoto,
        AdvertissementRequest $requestAdvertissement,
        BienRequest $requestBien,
        MandateRequest $Mandaterequest,
        AvalaibilitiesRequest $requestAvalaibilitie
    ) {
        DB::beginTransaction();
        try {
            // transaction
            $advertissementId = $this->handleAdvertissement($requestAdvertissement->toArray());
            $exteriorId = $this->handleExteriorDetail($requestExterior->toArray());
            $terrainId = $this->handleTerrain($requestTerrain->toArray());
            $interiorDetailId = $this->handleInteriorDetail($requestInterior->toArray());
            $infoCoproprieteId = $this->handleInfoCopropriete($infoCoproprieteRequest->toArray());
            $diagnostiqueId = $this->handleDiagnostique($requestDiagnostique->toArray());
            $rentalInvestId = $this->handleRentalInvest($requestRentalInvest->toArray());
            $infoFinanciereId = $this->handleInfoFinanciere($requestInfoFinanciere->toArray());
            $sectorId = $this->handleSector($requestSector->toArray());
            $photosId = $this->handlePhotos($requestPhoto->toArray());
            $requestData = $requestBien->validated();
            $avalaibilitieId = $this->handleAbilities($requestAvalaibilitie->toArray());
            $user = Auth::user();

            Log::info([json_encode($requestData)]);

            $requestData['biens']['advertisement_id'] = $advertissementId['id'];
            $requestData['biens']['exterior_detail_id'] = $exteriorId['id'];
            $requestData['biens']['photos_id_photos'] = $photosId['id'];
            $requestData['biens']['info_copropriete_id_infocopropriete'] = $infoCoproprieteId['id'];
            $requestData['biens']['interior_detail_id'] = $interiorDetailId['id'];
            $requestData['biens']['diagnostic_id_diagnostics'] = $diagnostiqueId['id'];
            $requestData['biens']['rental_invest_id_rental_invest'] = $rentalInvestId['id'];
            $requestData['biens']['sector_id_sector'] = $sectorId['id'];
            $requestData['biens']['terrain_id'] = $terrainId['id'];
            $requestData['biens']['info_financiere_id'] = $infoFinanciereId['id'];
            $requestData['biens']['recent_construct'] = json_encode($requestData['biens']['recent_construct']);
            $requestData['biens']['equipment'] = json_encode($requestData['biens']['equipment']);
            $requestData['biens']['status'] = json_encode($requestData['biens']['status']);
            $requestData['biens']['availabilities_id_availability'] = $avalaibilitieId['id'];
            $typeOffertId = $requestBien->input('type_offert_id');
            $typeEstateId = $requestBien->input('type_estate_id');
            $classificationEstateId = $requestBien->input('classification_estate_id');
            $classificationOffertId = $requestBien->input('classification_offert_id');
            $requestData['biens']['type_offert_id'] = $typeOffertId;
            $requestData['biens']['type_estate_id'] = $typeEstateId;
            $requestData['biens']['classsification_estate_id'] = $classificationEstateId;
            $requestData['biens']['classification_offert_id'] = $classificationOffertId;

            $requestData['biens']['agent_id'] = $user->id;
            $agency = $user->agency;
            $requestData['biens']['agency_id'] = $agency->id;

            Log::info([json_encode($requestData['biens'])]);

            $bienId = $this->handleBien($requestData);


            $mandateData = $Mandaterequest->input('Mandate');
            $mandateData['bien_id_bien'] = $bienId['id'];
            if (isset($mandateData['contact_id_contact'])) {
                $this->mandateService->udpateMandate($mandateData);
            } else {
                $this->mandateService->addMandate($mandateData);
            }

            DB::commit();

            return response(['message' => 'Bien créé avec succès', $sectorId], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            DB::rollBack();

            return response(['message' => $e->validator->errors()], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            DB::rollBack();

            return response(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // advertissement
    private function handleAdvertissement(array $requestData): array
    {
        $data = $this->advertissementService->store($requestData);
        $response = ['id' => $data];

        return $response;
    }

    // ajout et recuperation d'identification de la info financiere
    private function handleInfoFinanciere(array $requestData): array
    {
        $data = $this->infoFinanciereService->createInfoFinanciere($requestData);
        $response = ['id' => $data];

        return $response;
    }

    // ajout et recuperation de la rental invest
    private function handleRentalInvest(array $requestData): array
    {
        $data = $this->rentalInvestService->createRentalInvest($requestData);
        $response = ['id' => $data];

        return $response;
    }

    // ajout et recuperation de la diagnostique
    private function handleDiagnostique(array $requestData): array
    {
        $dataId = $this->diagnostiqueService->createDiagnostic($requestData);
        $response = ['id' => $dataId];

        return $response;
    }

    // ajout et recuperation de la info copropriete
    private function handleInfoCopropriete(array $requestData): array
    {
        $dataId = $this->infoCoproprieteService->createInfoCopropriete($requestData);
        $response = ['id' => $dataId];

        return $response;
    }

    // ajout et recuperation de l'interieuur de la detail
    private function handleInteriorDetail(array $requestData): array
    {
        $interiorDetailId = $this->interiorDetailService->createInteriorDetail($requestData);
        $response =  ['id' => $interiorDetailId];

        return $response;
    }

    // ajout et recuperation du bien
    private function handleBien(array $requestData): array
    {
        $data = $this->bienService->createBien($requestData);
        $response = ['id' => $data];

        return $response;
    }

    // ajout et recuperation du l'exterieur du detail
    private function handleExteriorDetail(array $requestData): array
    {
        $exteriorId = $this->exteriorDetailService->createExteriorDetail($requestData);
        $responseDetail = ['id' => $exteriorId];

        return $responseDetail;
    }

    // ajout et recuperation du terrain
    private function handleTerrain(array $terrainData)
    {
        $terrainId = $this->terrainService->createTerrain($terrainData);
        $responsseTerrainId = ['id' => $terrainId];

        return $responsseTerrainId;
    }


    // ajout et recuperation du secteur
    private function handleSector(array $requestData): array
    {
        $data = $this->sectorService->createSector($requestData);
        $response = ['id' => $data];

        return $response;
    }

    // Dossier et disponibilite
    private function handleAbilities(array $requestData): array
    {
        $data = $this->avalaibilitiesService->addAvalaibilities($requestData);
        $response = ['id' => $data];

        return $response;
    }

    private function handlePhotos(array $requestPhoto)
    {
        $photosData = $requestPhoto['photos'];

        if (!$photosData) {
            return response()->json(['error' => 'No photos provided'], 400);
        }
        $originalFilenames = [];
        $slideFilenames = [];
        foreach ($photosData['photos_couvert'] as $photo) {
            if (isset($photo['photos_slide1']) && isset($photo['photos_slide1_description'])) {

                $filename = time() . '_' . $photo['photos_slide1']->getClientOriginalName();
                $destination = '/document/photos_couvert';
                $photo['photos_slide1']->move(public_path($destination), $filename);
                $originalFilenames[] = [
                    'photos_slide1' => '/' . $filename,
                    'photos_slide1_description' => $photo['photos_slide1_description']
                ];
            }
        }

        foreach ($photosData['photos_slide'] as $slideKey => $slide) {
            // foreach ($slide as $slideField => $slideValue) {
            //     if (strpos($slideField, 'photos_slide') === 0) {
            //         $slideNumber = substr($slideField, -1);
            //         $descriptionKey = $slideField . '_description';

            //         if (isset($slide[$slideField]) && isset($slide[$descriptionKey])) {
            //             $filename = time() . '_' . $slide[$slideField]->getClientOriginalName();
            //             $destination = '/document/photos_slide';
            //             $slide[$slideField]->move(public_path($destination), $filename);
            //             $slideFilenames[$slideNumber][] = [
            //                 $slideField => '/' . $filename,
            //                 $descriptionKey => $slide[$descriptionKey]
            //             ];
            //         }
            //     }
            // }
        }
        $photos = [
            'photos_couvert' => $originalFilenames,
            'photos_slide' => $slideFilenames
        ];

        try {
            return $this->photoService->addPhotos($photos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add photos'], 500);
        }
    }

    /**
     * Get all Biens with pagination
     *
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function findAll(Request $request): LengthAwarePaginator
    {
        $perPage = $request->input('perPage', 10);
        $sortBy = $request->input('sortBy', 'id_bien');
        $sortOrder = $request->input('sortOrder', 'asc');
        $search = $request->input('search');
        $filters = $request->all();

        return $this->bienService->findAll($perPage, $sortBy, $sortOrder, $filters, $search);
    }

    /**
     * return json
     * get identification du bien
     */
    public function findById(int $bienId): JsonResponse
    {
        $findBienId = $this->bienService->getById($bienId);

        if (!$findBienId) {
            return response()->json(['error' => "Bien with ID $bienId not found"], 404);
        }

        return response()->json($findBienId);
    }

    // test add photos
    public function testPhotos(Request $request)
    {
        $photosData = $request['photos'];

        if (!$photosData) {
            return response()->json(['error' => 'No photos provided'], 400);
        }
        $originalFilenames = [];
        $slideFilenames = [];
        foreach ($photosData['photos_couvert'] as $photo) {
            if (isset($photo['photos_slide1']) && isset($photo['photos_slide1_description'])) {

                $filename = time() . '_' . $photo['photos_slide1']->getClientOriginalName();
                $destination = '/document/photos_couvert';
                $photo['photos_slide1']->move(public_path($destination), $filename);
                $originalFilenames[] = [
                    'photos_slide1' => '/' . $filename,
                    'photos_slide1_description' => $photo['photos_slide1_description']
                ];
            }
        }

        foreach ($photosData['photos_slide'] as $slideKey => $slide) {
            foreach ($slide as $slideField => $slideValue) {
                if (strpos($slideField, 'photos_slide') === 0) {
                    $slideNumber = substr($slideField, -1);
                    $descriptionKey = $slideField . '_description';

                    if (isset($slide[$slideField]) && isset($slide[$descriptionKey])) {
                        $filename = time() . '_' . $slide[$slideField]->getClientOriginalName();
                        $destination = '/document/photos_slide';
                        $slide[$slideField]->move(public_path($destination), $filename);
                        $slideFilenames[$slideNumber][] = [
                            $slideField => '/' . $filename,
                            $descriptionKey => $slide[$descriptionKey]
                        ];
                    }
                }
            }
        }
        $photos = [
            'photos_couvert' => $originalFilenames,
            'photos_slide' => $slideFilenames
        ];

        try {
            return $this->photoService->addPhotos($photos);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add photos'], 500);
        }
    }



    /**
     * Retrieve estate from numFolder
     * @param int $folderNum
     * @return JsonResponse
     */
    public function getEstateByMandat(int $folderNum): JsonResponse
    {
        $user = Auth::user();
        $bien = $this->bienService->getByMandat($folderNum);

        if ($bien->agency_id !== $user->agency_id)
            throw new NotAllowedRessourceException();
        return response()->json($bien);
    }


    public function udpateStatus(int $bienId, Request $request): JsonResponse
    {
        $status = $request->toArray();
        $findBienId = $this->bienService->updateStatusById($bienId, $status);

        if (!$findBienId) {
            return response()->json(['error' => "Bien with ID $bienId not found"], 404);
        }

        return response()->json(['message' => "Un bien a été change avec succés"]);
    }
}
