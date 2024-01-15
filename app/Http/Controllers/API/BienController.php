<?php

namespace App\Http\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ExteriorDetailService;
use App\Services\InteriorDetailService;
use App\Http\Requests\Detail\CreateExteriorDetailRequest;
use App\Http\Requests\Detail\CreateInteriorDetailRequest;

class BienController extends Controller
{
    public function __construct( 
        public InteriorDetailService $interiorDetailService,
        public ExteriorDetailService $exteriorDetailService,
        public CreateInteriorDetailRequest $createInteriorDetail,
        public CreateExteriorDetailRequest $createexteriorDetail
        )
    {
        
    }

    public function createBien(Request $request)
    {
        try {
            $details = $this->detailRequest();
            return response()->json(['details' => $details], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
    private function detailRequest($request)
    {
        $interior = $this->handleInteriorDetail($this->createInteriorDetail->toArray());
        
        $exterior = $this->handleExteriorDetail($this->createExteriorDetail->toArray());

        return ['interior' => $interior, 'exterior' => $exterior];

    }

    private function handleInteriorDetail($request)
    {
        $interior = $this->interiorDetailService->createInteriorDetail($request);

        return $interior;
    }

    private function handleExteriorDetail($request)
    {
        $exterior = $this->exteriorDetailService->createExteriorDetail($request);

        return $exterior;
    }
}