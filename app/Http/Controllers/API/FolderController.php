<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Folder\RegisterRequest;
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
     * @param \Illuminate\Http\Request $registerRequest
     * @return\Illuminate\Http\JsonResponse
     */
    public function registerFolder(RegisterRequest $registerRequest): JsonResponse
    {
        $user = Auth::user();
        $folder = $this->folderService->createFolder($registerRequest->toArray());
        return response()->json($folder);
    }
}
