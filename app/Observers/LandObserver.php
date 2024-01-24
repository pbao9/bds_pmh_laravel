<?php

namespace App\Observers;

use App\Models\Land;

class LandObserver
{
    /**
     * Handle the Land "created" event.
     *
     * @param  \App\Models\Land  $land
     * @return void
     */
    public function saving(Land $land)
    {
        //
        $land->slug = $land->createSlug($land->title, $land->id ? $land->id : 0);
    }
    /**
     * Handle the Land "created" event.
     *
     * @param  \App\Models\Land  $land
     * @return void
     */
    public function created(Land $land)
    {
        //
    }

    /**
     * Handle the Land "updated" event.
     *
     * @param  \App\Models\Land  $land
     * @return void
     */
    public function updated(Land $land)
    {
        //
    }

    /**
     * Handle the Land "deleted" event.
     *
     * @param  \App\Models\Land  $land
     * @return void
     */
    public function deleted(Land $land)
    {
        //
    }

    /**
     * Handle the Land "restored" event.
     *
     * @param  \App\Models\Land  $land
     * @return void
     */
    public function restored(Land $land)
    {
        //
    }

    /**
     * Handle the Land "force deleted" event.
     *
     * @param  \App\Models\Land  $land
     * @return void
     */
    public function forceDeleted(Land $land)
    {
        //
    }
}
