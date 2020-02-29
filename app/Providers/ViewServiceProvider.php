<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        // Using class based composers...
        View::composer(
            ['web.*','admin.login'], 'App\Http\View\Composers\SettingComposer'
        );
        View::composer(
            'web.*', 'App\Http\View\Composers\ProgramsComposer'
        );
        View::composer(
            'web.*','App\Http\View\Composers\AdmisionComposer'
        );
        View::composer(
            'virtual-library.*', 'App\Http\View\Composers\VirtualLibraryComposer'
        );
    }
}
