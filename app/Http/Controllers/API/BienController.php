<?php

namespace App\Http\Controllers\API;

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
use App\Services\AdvertissementsService;
use App\Http\Requests\Detail\CreateInteriorDetailRequest;
use App\Http\Requests\Contact\CreateContactRequest;
use App\Http\Requests\Detail\CreateExternDetailRequest;
use App\Http\Requests\InfoCopropriete\CreateInfoCoprprieteRequest;
use App\Http\Requests\Terrain\CreateTerrainRequest;
use App\Http\Requests\Diagnostique\CreateDiagnostiqueRequest;
use App\Http\Requests\RentalInvest\RentalInvestRequest;
use App\Http\Requests\InfoFinanciere\InfoFinanciereRequest;
use App\Http\Requests\Sector\SectorRequest;
use App\Http\Requests\Photos\PhotoRequest;
use App\Http\Requests\Bien\BienRequest;
use App\Http\Requests\Advertissement\AdvertissementRequest;
use Illuminate\Validation\ValidationException;
use Exception; 
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\JsonResponse;
use App\Exceptions\CustomException;

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
        public BienService $bienService

        )
    {
        
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
        BienRequest $requestBien
    )
    {
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
            $typeOffertId = $requestBien->input('type_offert_id');
            $typeEstateId = $requestBien->input('type_estate_id');
            $classificationEstateId = $requestBien->input('classification_estate_id');
            $classificationOffertId = $requestBien->input('classification_offert_id');
            $requestData['biens']['type_offert_id'] = $typeOffertId;
            $requestData['biens']['type_estate_id'] = $typeEstateId;
            $requestData['biens']['classsification_estate_id'] = $classificationEstateId;
            $requestData['biens']['classification_offert_id'] = $classificationOffertId;
            
            $this->handleBien($requestData);
            // commit 
            return response(['message' => 'Bien créé avec succès'], Response::HTTP_CREATED);

        } catch (ValidationException $e) {

            return response(['message' => $e->validator->errors()], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            //roll back
            return response(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // advertissement
    private function handleAdvertissement(array $requestData): array
    {
        $data = $this->advertissementService->store($requestData);
        $response = ['id' =>$data];

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
        $response = ['id' =>$data];

        return $response;
    }

    // ajout et recuperation de la diagnostique 
    private function handleDiagnostique(array $requestData): array
    {
        $dataId = $this->diagnostiqueService->createDiagnostic($requestData);
        $response = ['id' =>$dataId];

        return $response;
    }

    // ajout et recuperation de la info copropriete 
    private function handleInfoCopropriete(array $requestData): array
    {
        $dataId = $this->infoCoproprieteService->createInfoCopropriete($requestData);
        $response = ['id' =>$dataId];

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
        $response = ['id' =>$data];

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

    // ajout et recuperation du photos
    private function handlePhotos(array $requestData): array
    {
        $data = $this->photoService->addPhotos($requestData);
        $response= ['id' =>$data];
        return $response;
    }

    /**
     * return array
     * list de la bien avec leur relation
     */
    public function findAll() : Collection
    {
        return $this->bienService->findAll();
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
}