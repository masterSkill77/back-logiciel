<?php

namespace App\Jobs;

use App\Services\PigeService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateOrSkipPigeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $pige)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        (new PigeService)->createOrSkip($this->pige);
    }
}
