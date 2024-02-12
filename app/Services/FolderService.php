<?php

namespace App\Services;

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
        return $folder;
    }
    public function createStepForFolder(array $stepData): Step
    {
        $step = new Step($stepData);
        $step->save();
        return $step;
    }
}
