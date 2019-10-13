<?php

namespace Elsuterino\ScrapeCommand;

interface JobScrapeInterface
{
    public function getJobs($config);
    public function provider();
}
