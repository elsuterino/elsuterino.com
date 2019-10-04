<?php

namespace Tests\Feature\ScrapeCommandTests;

use App\Console\Commands\LarajobsScrapeCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class LarajobsTest extends AbstractScrape
{
    /** @test * */
    public function it_has_proper_array_results()
    {
        $class = new LarajobsScrapeCommand();

        $this->validate_array($class);
    }
}
