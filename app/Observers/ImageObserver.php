<?php

namespace App\Observers;

use App\Image;

class ImageObserver
{
    public function retrieved(Image $image){
        $explode =explode(".",$image->url);
		$image->extension = end($explode);
		$image->webp = str_replace($image->extension,"webp",$image->url);
    }
}
