<?php


namespace Tests\Feature\ScrapeCommandTests;


use App\Interfaces\JobScrapeInterface;
use Illuminate\Support\Arr;
use Tests\TestCase;

class AbstractScrape extends TestCase
{
    public function validate_array(JobScrapeInterface $class){
        $urls = Arr::wrap($class->config['url']);

        foreach($urls as $url){
            $this->assertIsString($url);

            $jobs = $class->getJobs($url);

            $this->assertIsArray($jobs);
            $this->assertNotCount(0, $jobs);

            foreach($jobs as $job){
                $this->assertTrue(!empty($job['provider_id']));
                $this->assertTrue(!empty($job['title']));
            }
        }
    }
}
