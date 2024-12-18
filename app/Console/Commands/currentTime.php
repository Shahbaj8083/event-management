<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class currentTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'time:current';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'show the current time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = Carbon::now();
        return $this->line('<fg=red>' . $currentTime->toDateTimeString() . '</fg=red>');
    }
}
