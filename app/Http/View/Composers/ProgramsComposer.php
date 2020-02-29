<?php

namespace App\Http\View\Composers;

use App\Services\GuzzleService;
use Illuminate\View\View;

class ProgramsComposer
{
    protected $programs;


    public function __construct(GuzzleService $guzzleService)
    {
        $this->programs = $guzzleService->post(config('app.url_api').'programs');
        for ($i=0; $i < count($this->programs) ; $i++) {
            $this->programs[$i]['banner'] = \App\Banner::where('name',$this->programs[$i]['slug'])->with('image')->first();
        }
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
        ->with('programs', $this->programs)

        ;
    }
}
