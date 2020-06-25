<?php

namespace App\Http\View\Composers;

use App\Services\GuzzleService;
use Illuminate\View\View;

class AdmisionComposer
{
    protected $admision;


    public function __construct(GuzzleService $guzzleService)
    {
        $this->admision = $guzzleService->get(config('app.url_api').'admision');
        if($this->admision != null){
            if(date('yy-m-d') > $this->admision['shedules'][2]['final_date']){
                $this->admision = null;
            }
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
        ->with('admision', $this->admision)
        ;
    }
}
