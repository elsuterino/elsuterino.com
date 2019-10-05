<?php

namespace Tests\Feature\ScrapeCommandTests;

use App\Console\Commands\JobScrape\IndeedScrapeCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndeedTest extends AbstractScrape
{
    /** @test * */
    public function it_has_proper_array_results()
    {
        $class = new IndeedScrapeCommand();

        $this->validate_array($class);
    }
}
