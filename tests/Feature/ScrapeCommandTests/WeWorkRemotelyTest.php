<?php

namespace Tests\Feature\ScrapeCommandTests;

use App\Console\Commands\JobScrape\WeWorkRemotelyScrapeCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class WeWorkRemotelyTest extends AbstractScrape
{
    /** @test * */
    public function it_has_proper_array_results()
    {
        $class = new WeWorkRemotelyScrapeCommand();

        $this->validate_array($class);
    }
}
