<?php


namespace App\Console\Commands;


use App\Interfaces\JobScrapeInterface;
use App\Job;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

abstract class AbstractJobScrape extends Command implements JobScrapeInterface
{
    public $config;
    public $provider;

    public function __construct()
    {
        parent::__construct();

        if(!$this->provider){
            logger()->critical(get_class($this) . ' Provider not set');

            exit();
        }

        $this->config = $this->getConfig($this->provider);

        if(!$this->config){
            logger()->critical(get_class($this) . ' Config not set');

            exit();
        }
    }

    public function handle()
    {
        $urls = Arr::wrap($this->config['url']);

        foreach($urls as $url){
            $jobs = $this->getJobs($url);

            $this->saveJobs($jobs);
        }
    }

    protected function getConfig(String $provider)
    {
        $config = config("job.providers.{$provider}", null);

        if (!$config) {
            logger()->critical(get_class($this) . ' Config not set');

            exit();
        }

        return $config;
    }

    public function saveJobs(array $job)
    {
        Job::firstOrCreate(
            [
                'provider' => $this->provider,
                'provider_id' => $job['provider_id']
            ],
            [
                'title' => $job['title'],
                'company' => $job['client'] ?? null,
                'location' => $job['location'] ?? null,
                'url' => $job['url'],
                'tags' => $job['tags'] ?? null,
                'salary' => $job['salary'] ?? null,
                'description' => $job['description'] ?? null,
                'logo' => $job['logo'] ?? null
            ]
        );
    }
}
