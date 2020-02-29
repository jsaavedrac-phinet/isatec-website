<?php

namespace App\Observers;

use App\Banner;
use App\Section;
use Illuminate\Support\Str;

class SectionObserver
{

    public function saving(Section $section){

        $section->slug = Str::slug($section->title, '-');
        Banner::where('name',$section->getOriginal('slug'))->update(['name'=> $section->slug]);
    }



    /**
     * Handle the section "created" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function created(Section $section)
    {
        //
    }

    /**
     * Handle the section "updated" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function updated(Section $section)
    {
        //
    }

    /**
     * Handle the section "deleted" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function deleted(Section $section)
    {
        //
    }

    /**
     * Handle the section "restored" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function restored(Section $section)
    {
        //
    }

    /**
     * Handle the section "force deleted" event.
     *
     * @param  \App\Section  $section
     * @return void
     */
    public function forceDeleted(Section $section)
    {
        //
    }
}
