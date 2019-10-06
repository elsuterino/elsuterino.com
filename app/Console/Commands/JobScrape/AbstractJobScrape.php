<?php


namespace App\Console\Commands\JobScrape;


use App\Job;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

abstract class AbstractJobScrape extends Command implements JobScrapeInterface
{
    public $provider;

    public function __construct()
    {
        parent::__construct();

        if (!$this->provider) {
            logger()->critical(get_class($this) . ' Provider not set');

            exit();
        }

        if (!config("job.providers.{$this->provider}")) {
            logger()->critical(get_class($this) . ' Config not set');

            exit();
        }
    }

    public function handle()
    {
        $urls = Arr::wrap($this->config('url'));

        foreach ($urls as $url) {
            $jobs = $this->getJobs($url);

            $this->info('Found ' . count($jobs) . ' jobs in ' . $this->config('url'));

            $this->saveJobs($jobs);
        }
    }

    public function config(String $key = null)
    {
        if (!$key) {
            return config("job.providers.{$this->provider}", null);
        }

        return config("job.providers.{$this->provider}.{$key}", null);
    }

    public function saveJobs(array $jobs)
    {
        foreach ($jobs as $job) {
            Job::firstOrCreate(
                [
                    'provider' => $this->provider,
                    'provider_id' => $job['provider_id'],
                ],
                [
                    'title' => $job['title'],
                    'company' => $job['client'] ?? null,
                    'location' => $job['location'] ?? null,
                    'url' => $job['url'],
                    'tags' => $job['tags'] ?? null,
                    'salary' => $job['salary'] ?? null,
                    'description' => $job['description'] ?? null,
                    'logo' => $job['logo'] ?? null,
                ]
            );
        }
    }
}
