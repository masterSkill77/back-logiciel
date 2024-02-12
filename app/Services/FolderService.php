<?php

namespace App\Services;

use App\Models\Folder;

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
}
