<?php
namespace App\Services;

use Buglinjo\LaravelWebp\Webp;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageService{
    public function storageImage(UploadedFile $image) : String
    {
        $name = time() . ".";
        $path = public_path(). '/storage/images/';
        Storage::disk('public')->putFileAs('images',$image,$name.$image->getClientOriginalExtension());
        Webp::make($image)->save($path.$name."webp");
        if (Storage::disk('public')->exists('images/'.$name."webp")) {
            return $name . $image->getClientOriginalExtension();
        }
        Storage::disk('public')->delete('images/'.$name.$image->getClientOriginalExtension());
        return 'error';

    }

    public function deleteImage(String $path){
        $explode =explode(".",$path);
        $extension = end($explode);
        $archivo_webp = str_replace($extension,"webp",$path);
        if (Storage::disk('public')->exists($archivo_webp)) {
            Storage::disk('public')->delete($archivo_webp);
        }
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
