<?php

namespace App\Jobs;

use App\Imports\DelegateImport;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ImportDelegatesJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private  $uploadFile, private $eventId) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            Excel::import(new DelegateImport($this->eventId), $this->uploadFile);
    }
}
