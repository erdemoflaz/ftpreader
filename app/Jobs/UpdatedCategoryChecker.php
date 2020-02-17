<?php

namespace App\Jobs;

use App\Services\Category\ReadCategories;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdatedCategoryChecker implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var ReadCategories
     */
    private $readCategory;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->readCategory = new ReadCategories();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->readCategory->findLatestXlsx();
    }
}
