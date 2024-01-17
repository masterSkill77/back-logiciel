<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
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


class BienController extends Controller
{
    public function __construct( 
        public InteriorDetailService $interiorDetailService,
        public ExteriorDetailService $exteriorDetailService,
        public TerrainService $terrainService,
        public InfoCoproprieteService $infoCoproprieteService,
        public DiagnosticService $diagnostiqueService,
        public RentalInvestService $rentalInvestService,
        public InfoFinanciereService $infoFinanciereService,
        public SectorService $sectorService,
        public PhotosService $photoService,
        public BienService $bienService
        )
    {
        
    }

    public function createBien(
        InfoFinanciereRequest $requestInfoFinanciere,
    )
    {
        $this->handleInfoFinanciere($requestInfoFinanciere->toArray());
    }   


    private function handleInfoFinanciere(array $requestData): array
    {
        $data = $this->infoFinanciereService->createInfoFinanciere($requestData);
        $response = ['id' => $data];
        
        return $response;
    }

    private function handleRentalInvest(array $requestData): array
    {
        $data = $this->rentalInvestService->createRentalInvest($requestData);
        $response = ['id' =>$data];

        return $response;
    }

    private function handleDiagnostique(array $requestData): array
    {
        $dataId = $this->diagnostiqueService->createDiagnostic($requestData);
        $response = ['id' =>$dataId];

        return $response;
    }

    private function handleInfoCopropriete(array $requestData): array
    {
        $dataId = $this->infoCoproprieteService->createInfoCopropriete($requestData);
        $response = ['id' =>$dataId];

        return $response;
    }

    private function handleInteriorDetail(array $requestData): array
    {
        $interiorDetailId = $this->interiorDetailService->createInteriorDetail($requestData);
        $response =  ['id' => $interiorDetailId];

        return $response;
    }

    private function handleBien(array $requestData): array
    {
        return $this->bienService->createBien($requestData);
    }

    private function handleExteriorDetail(array $requestData): array
    {
        $exteriorId = $this->exteriorDetailService->createExteriorDetail($requestData);
        $responseDetail = ['id' => $exteriorId];

        return $responseDetail;
    }

    private function handleTerrain(array $terrainData)
    {
        $terrainId = $this->terrainService->createTerrain($terrainData);
        $responsseTerrainId = ['id' => $terrainId];

        return $responsseTerrainId;
    }


    private function handleSector(array $requestData): array
    {
        return $this->sectorService->createSector($requestData);
    }

    private function handlePhotos(array $requestData): array
    {
        return $this->photoService->addPhotos($requestData);
    }
}