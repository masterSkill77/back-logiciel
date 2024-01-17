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
        BienRequest $requestBien
    )
    {
        $this->handleBien($requestBien->validated());

    }   


    private function handleBien(array $requestData): array
    {
        return $this->bienService->createBien($requestData);
    }

    private function handleExteriorDetail(array $requestData): array
    {
        return $this->exteriorDetailService->createExteriorDetail($requestData);
    }

    private function handleTerrain(array $terrainData)
    {
        return $this->terrainService->createTerrain($terrainData);
    }
    

    private function handleInteriorDetail(array $requestData): array
    {
        return $this->interiorDetailService->createInteriorDetail($requestData);
    }

    private function handleInfoCopropriete(array $requestData): array
    {
        return $this->infoCoproprieteService->createInfoCopropriete($requestData);
    }

    private function handleDiagnostique(array $requestData): array
    {
        return $this->diagnostiqueService->createDiagnostic($requestData);
    }

    private function handleRentalInvest(array $requestData): array
    {
        return $this->rentalInvestService->createRentalInvest($requestData);
    }

    private function handleInfoFinanciere(array $requestData): array
    {
        return $this->infoFinanciereService->createInfoFinanciere($requestData);
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