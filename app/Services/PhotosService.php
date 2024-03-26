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
        $photosData = [];
        $slideData = [];
    
        // Traitement des photos couvertes
        foreach ($params['photos_couvert'] as $photoData) {
            $photosData[] = [
                'type' => 'photos_couvert',
                'filename' => $photoData['filename'],
                'description' => $photoData['description']
            ];
        }

        // Traitement des photos de diapositives
        foreach ($params['photos_slide'] as $slide) {
            $slideInfo = [];
            foreach ($slide as $data) {
                $slideData[] = $data;
            }
        }

        $photo = new Photos();
        $photo->photos_couvert = $photosData;
        $photo->photos_slide = $slideData;
        $photo->save();
    
        return ['id' => $photo->id_photos];
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
