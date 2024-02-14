<?php

namespace App\Services;

use App\Enum\TypeFolder;
use App\Models\Folder;
use App\Models\Step;

class FolderService
{
    public function __construct()
    {
        // Constructor of the class
    }

    public function createFolder(array $folderData): Folder
    {
        $folder = new Folder($folderData);
        $folder->save();
        $this->generateDefaultData($folderData['folder_type'], $folder);
        return $folder;
    }
    public function createStepForFolder(array $stepData): Step
    {
        $step = new Step($stepData);
        $step->save();
        return $step;
    }

    public function generateDefaultData(string $folderType, Folder $folder)
    {
        $generateStepService = new GenerateStepService();
        switch ($folderType) {
            case TypeFolder::VENTE->value:
                $generateStepService->generateVenteStep($folder);
                break;
            case TypeFolder::LOCATION->value:
                $generateStepService->generateLocationOrGestionStep($folder);
                break;
            case TypeFolder::GESTION->value:
                $generateStepService->generateLocationOrGestionStep($folder);
                break;
            default:
                $generateStepService->generateVenteStep($folder);
                break;
        }
    }
}
