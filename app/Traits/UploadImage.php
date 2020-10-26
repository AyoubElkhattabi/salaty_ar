<?php
namespace App\Traits;

trait UploadImage{


    function uploadImage($image,$path)
        {
                    $fileNameWithExtention = $image->getClientOriginalName();
                    $fileNameOriginal = pathinfo($fileNameWithExtention, PATHINFO_FILENAME);;
                    $fileExtension = pathinfo($fileNameWithExtention, PATHINFO_EXTENSION);
                    $fileName = time().'_'.$fileNameOriginal.'.'.$fileExtension;
                    $pathLocation = $image->storeAs($path,$fileName);
                    return [
                        'name'=>$fileName,
                        'path'=>$pathLocation
                    ];
        }

}
