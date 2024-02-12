<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Folder\RegisterRequest;
use App\Http\Requests\Folder\RegisterStepRequest;
use App\Services\FolderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function __construct(protected FolderService $folderService)
    {
    }

    /**
     * Register a new folder for an estate
     * @param \Illuminate\Http\Requests\Folder\RegisterRequest $registerRequest
     * @return\Illuminate\Http\JsonResponse
     */
    public function registerFolder(RegisterRequest $registerRequest): JsonResponse
    {
        $user = Auth::user();
        $folder = $this->folderService->createFolder($registerRequest->toArray());
        return response()->json($folder);
    }

    /**
     * Register a new folder for an estate
     * @param \Illuminate\Http\Requests\Folder\RegisterStepRequest $registerRequest
     * @return\Illuminate\Http\JsonResponse
     */
    public function registerStep(RegisterStepRequest $registerStepRequest): JsonResponse
    {
        $step = $this->folderService->createStepForFolder($registerStepRequest->toArray());
        return response()->json($step);
    }
}
