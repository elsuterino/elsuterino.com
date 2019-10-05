<?php

namespace Tests\Feature\ScrapeCommandTests;

use App\Console\Commands\JobScrape\GlassDoorScrapeCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GlassDoorTest extends AbstractScrape
{
    /** @test * */
    public function it_has_proper_array_results()
    {
        $class = new GlassDoorScrapeCommand();

        $this->validate_array($class);
    }
}
