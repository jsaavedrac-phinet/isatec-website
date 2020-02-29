<?php

namespace App\Http\View\Composers;

use App\Banner;
use Illuminate\View\View;

class VirtualLibraryComposer
{
    protected $banner;


    public function __construct()
    {
        $this->banner = Banner::where('name','biblioteca-virtual')->first();

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view
        ->with('banner', $this->banner)

        ;
    }
}
