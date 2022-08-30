<?php

namespace App\Observers;

use App\Models\Assessment;

class AssessmentObserver
{
    /**
     * Handle the Assessment "created" event.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return void
     */
    public function created(Assessment $assessment)
    {
        //
    }

    /**
     * Handle the Assessment "updated" event.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return void
     */
    public function updated(Assessment $assessment)
    {
        if(is_null($assessment->completed) || !$assessment->completed) return;



       $assessment->score = 0;
       $assessment->save();
    }

    /**
     * Handle the Assessment "deleted" event.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return void
     */
    public function deleted(Assessment $assessment)
    {
        //
    }

    /**
     * Handle the Assessment "restored" event.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return void
     */
    public function restored(Assessment $assessment)
    {
        //
    }

    /**
     * Handle the Assessment "force deleted" event.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return void
     */
    public function forceDeleted(Assessment $assessment)
    {
        //
    }
}
