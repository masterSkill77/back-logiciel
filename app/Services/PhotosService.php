<?php

namespace App\Services;

use App\Models\Photos;
use Illuminate\Database\Eloquent\Collection;

class PhotosService
{
    public function __construct()
    {
        // Constructor of the class
    }
    public function addPhotos(array $params): Photos
    {
        $photo = (new Photos($params));
        $photo->save();
        return $photo;
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
