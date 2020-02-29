<?php

namespace App\Observers;

use App\Book;
use Illuminate\Support\Str;
class BookObserver
{
    public function saving(Book $book){
        $book->slug = Str::slug($book->title, '-');
    }
}
