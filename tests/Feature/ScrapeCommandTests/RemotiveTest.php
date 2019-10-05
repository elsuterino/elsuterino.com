<?php

namespace Tests\Feature\ScrapeCommandTests;

use App\Console\Commands\JobScrape\RemotiveScrapeCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class RemotiveTest extends AbstractScrape
{
    /** @test * */
    public function it_has_proper_array_results()
    {
        $class = new RemotiveScrapeCommand();

        $this->validate_array($class);
    }
}
