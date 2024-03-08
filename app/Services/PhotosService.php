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
    public function addPhotos(array $params): array
    {
        if(isset($params['photos']) && is_array($params['photos'])) {
            $photo = (new Photos($params['photos']));
            $photo->save();

            return ['id' => $photo->id_photos];
        }

        return ['id' => 0];
    }

    public function savePhotos(UploadedFile $file, array $slides): string
    {
        $originalFilename = $file->getClientOriginalName();
        $path = $file->move(public_path('/document/photos/bien'), $originalFilename);

        return $originalFilename;
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
