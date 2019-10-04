<?php

namespace Tests\Feature\ScrapeCommandTests;

use App\Console\Commands\WeWorkRemotelyScrapeCommand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;

class WeWorkRemotelyTest extends AbstractScrape
{
    /** @test * */
    public function it_has_proper_array_results()
    {
        $class = new WeWorkRemotelyScrapeCommand();

        $urls = Arr::wrap($class->config['url']);

        foreach($urls as $url) {
            $this->assertIsString($url);

            $jobs = $class->getJobs($url);
            dd($jobs);
        }

//        $this->validate_array($class);
    }
}
