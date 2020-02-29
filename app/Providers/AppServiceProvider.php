<?php

namespace App\Providers;

use App\Book;
use App\Image;
use App\Observers\BookObserver;
use App\Observers\ImageObserver;
use App\Observers\PostObserver;
use App\Observers\SectionObserver;
use App\Observers\VirtualBookObserver;
use App\Post;
use App\Section;
use App\Virtual_Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Image::observe(ImageObserver::class);
        Section::observe(SectionObserver::class);
        Post::observe(PostObserver::class);
        Virtual_Book::observe(VirtualBookObserver::class);
        Book::observe(BookObserver::class);
    }
}
