<?php

namespace App\Observers;

use App\Virtual_Book;
use Illuminate\Support\Str;
class VirtualBookObserver
{
    public function saving(Virtual_Book $book){
        $book->slug = Str::slug($book->title, '-');
    }
}
