<?php

namespace App\Jobs;

use App\Services\Parsing;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Redis;

class GetParseContent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Redis::throttle('key')->allow(10)->every(10)->then(function () {
            $parsing = new Parsing();
            $parsing->makeParsing();
//        }, function () {
//            return $this->release(10);
//        });

    }
}
