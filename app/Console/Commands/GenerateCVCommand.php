<?php

namespace App\Console\Commands;

use Elsuterino\CV;
use Illuminate\Console\Command;

class GenerateCVCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:cv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates and saves CV';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        (new CV)->save();
    }
}
