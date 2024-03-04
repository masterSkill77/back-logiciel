<?php

namespace App\Services;

use App\Models\Photos;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

class PhotosService
{
    public function __construct()
    {
        // Constructor of the class
    }
    public function addPhotos(array $photosData): int
    {
        $photo = new Photos($photosData);
        $photo->save();
    
        return $photo->id_photos;
    }
    

    public function savePhotos(UploadedFile $files): array
    {
        $filenames = [];
        foreach ($files as $file) {
            $originalFilename = $file->getClientOriginalName();
            $path = $file->move(public_path('/document/photos/bien'), $originalFilename);
            $filenames[] = $originalFilename;
        }
        return $filenames;
    }
    

    /**
     * Update an Photos row based on infoId
     * @param \App\Models\Photos $photo
     * @param array $params
     * @return \App\Models\Photos
     */

    public function updatePhotos(Photos $photo, array $params): Photos
    {
        $photo->update($params);
        return $photo;
    }


    public function getPhotos() : Collection
    {
        return Photos::all();
    }
}
