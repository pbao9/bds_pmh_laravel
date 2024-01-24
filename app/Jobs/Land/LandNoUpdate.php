<?php

namespace App\Jobs\Land;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class LandNoUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $repository;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    
    public function __construct(){
        $this->repository = \App::make('App\Repositories\Land\LandRepositoryInterface');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $date = now()->subDays(30);
        
        $this->repository->deleteBy('updated_at', $date, '<=');

    }
}
