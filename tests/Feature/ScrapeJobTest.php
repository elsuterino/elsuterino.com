<?php

namespace Tests\Feature;

use Elsuterino\ScrapeCommand\JobScrapeInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Console\Commands\JobScrape\{
    BestRemotejobScrapeCommand,
    GlassDoorScrapeCommand,
    IndeedScrapeCommand,
    LarajobsScrapeCommand,
    RemoteCoScrapeCommand,
    RemotiveScrapeCommand,
    WeWorkRemotelyScrapeCommand,
    RedditScrapeCommand
};

class ScrapeJobTest extends TestCase
{
    public function validate_array(JobScrapeInterface $class, $canHaveZero = true)
    {
        foreach ($class->provider()->query_urls as $url) {
            $this->assertIsString($url);

            $jobs = $class->getJobs($url);

            $this->assertIsArray($jobs);

            if($canHaveZero === true){
                $this->assertNotCount(0, $jobs);
            }

            foreach ($jobs as $job) {
                $this->assertTrue(!empty($job['provider_id']));
                $this->assertTrue(!empty($job['url']));
            }
        }
    }

    /** @test * */
    public function best_remote_has_jobs()
    {
        $bestRemote = new BestRemotejobScrapeCommand();

        $this->validate_array($bestRemote);
    }

    /** @test * */
    public function glass_door_has_jobs()
    {
        $glassDoor = new GlassDoorScrapeCommand();

        $this->validate_array($glassDoor);
    }

    /** @test * */
    public function best_remote_jobs_has_jobs()
    {
        $bestRemote = new BestRemotejobScrapeCommand();

        $this->validate_array($bestRemote);
    }

    /** @test * */
    public function indeed_has_jobs()
    {
        $indeed = new IndeedScrapeCommand();

        $this->validate_array($indeed);
    }

    /** @test * */
    public function larajobs_has_jobs()
    {
        $laraJobs = new LarajobsScrapeCommand();

        $this->validate_array($laraJobs);
    }

    /** @test * */
    public function remote_co_has_jobs()
    {
        $remoteCoJobs = new RemoteCoScrapeCommand();

        $this->validate_array($remoteCoJobs);
    }

    /** @test * */
    public function remotive_has_jobs()
    {
        $remotiveJobs = new RemotiveScrapeCommand();

        $this->validate_array($remotiveJobs);
    }

    /** @test * */
    public function we_work_remotely_has_jobs()
    {
        $wwrJobs = new WeWorkRemotelyScrapeCommand();

        $this->validate_array($wwrJobs);
    }

    /** @test * */
    public function reddit_has_jobs()
    {
        $redditJobs = new RedditScrapeCommand();

        $this->validate_array($redditJobs, false);
    }
}
