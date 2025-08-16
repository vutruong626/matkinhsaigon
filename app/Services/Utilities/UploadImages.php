<?php

namespace App\Services\Utilities;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;


trait UploadImages
{
    /**
     * @param UploadedFile $requestFile
     * @param string $path
     * @return string|null
     */
    public static function storeImageAs( $requestFile, $path = 'public/uploads'): ?string
    {
        if($requestFile ){
            $name = time().'-'.$requestFile->getClientOriginalName();
            $requestFile->move($path, $name);
            return $name;
        }
        return null;
    }


    public static function dropzoneStore($requestFile, $path = 'public/uploads'): ?string {
        if($requestFile ){
            $name = time().'-'.$requestFile->getClientOriginalName();
            $requestFile->move($path, $name);
            return $name;
        }
        return null;
    }
}
