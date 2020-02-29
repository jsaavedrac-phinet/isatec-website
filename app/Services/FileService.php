<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileService{
    public function storageFile(UploadedFile $file) : String
    {
        $name = time() . ".".$file->getClientOriginalExtension();
        $path = public_path(). '/storage/files/';
        Storage::disk('public')->putFileAs('files',$file,$name);
        if (Storage::disk('public')->exists('files/'.$name)) {
            return $name;
        }
        return 'error';
    }

    public function deleteFile(String $path){
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
