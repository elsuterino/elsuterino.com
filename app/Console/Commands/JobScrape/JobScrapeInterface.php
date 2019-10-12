<?php


namespace App\Console\Commands\JobScrape;


interface JobScrapeInterface
{
    public function getJobs($config);
}
