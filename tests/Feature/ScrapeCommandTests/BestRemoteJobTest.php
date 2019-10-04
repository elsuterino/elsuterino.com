<?php

namespace Tests\Feature\ScrapeCommandTests;

use App\Console\Commands\BestRemotejobScrapeCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class BestRemoteJobTest extends AbstractScrape
{
    /** @test * */
    public function it_has_proper_array_results()
    {
        $class = new BestRemotejobScrapeCommand();

        $this->validate_array($class);
    }
}
