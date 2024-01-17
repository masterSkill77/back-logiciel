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
        CreateExternDetailRequest $requestExterior
    )
    {
        $this->handleExteriorDetail($requestExterior->toArray());

    }   

    private function handleExteriorDetail(array $requestData): array
    {
        dd($requestData);
        $data = $requestData->validated();

        return $this->exteriorDetailService->createExteriorDetail($data);
    }

    private function handleTerrain(array $terrainData)
    {
        $data = $terrainData->validated();
        return $this->terrainService->createTerrain($data);
    }
    

    private function handleInteriorDetail(array $requestData): array
    {
        $data = $requestData->validated();

        return $this->interiorDetailService->createInteriorDetail($data);
    }

    private function handleInfoCopropriete(array $requestData): array
    {
        $data = $requestData->validated();

        return $this->infoCoproprieteService->createInfoCopropriete($data);
    }

    private function handleDiagnostique(array $requestData): array
    {
        $data = $requestData->validated();

        return $this->diagnostiqueService->createDiagnostic($data);
    }

    private function handleRentalInvest(array $requestData): array
    {
        $data = $requestData->validated();

        return $this->rentalInvestService->createRentalInvest($data);
    }

    private function handleInfoFinanciere(array $requestData): array
    {
        $data = $requestData->validated();

        return $this->infoFinanciereService->createInfoFinanciere($data);
    }

    private function handleSector(array $requestData): array
    {
        $data = $requestData->validated();

        return $this->sectorService->createSector($data);
    }

    private function handlePhotos(array $requestData): array
    {
        $data = $requestData->validated();

        return $this->photoService->addPhotos($data);
    }

    private function handleBien(array $requestData): array
    {
        $data = $requestData->validated();

        return $this->bienService->createBien($data);
    }
}