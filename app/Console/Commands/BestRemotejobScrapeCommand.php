<?php


namespace App\Console\Commands;

use App\Job;
use App\Traits\ScrapeTrait;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class BestRemotejobScrapeCommand extends Command
{
    use ScrapeTrait;

    protected $signature = 'scrape:bestremotejob';
    protected $description = 'Scrapes bestremotejob.com';
    protected $provider = 'bestremotejob';
    protected $config;

    public function handle()
    {
        $this->config = $this->getConfig($this->provider);

        $this->getJobs();
    }

    public function getJobs()
    {
        $url = $this->config['url'];

        $client = new Client();

        $data = $client->request('get', $url);

        $data = json_decode($data->getBody());

        foreach($data->results as $job){
            if($job->job_type !== 'remote'){
                continue;
            }

            if($job->is_active === false){
                continue;
            }

            if(Carbon::parse($job->created_at)->lt(Carbon::now()->subMonth())){
                continue;
            }

            $this->doJob($job);
        }
    }

    public function doJob($job)
    {
        Job::firstOrCreate(
            [
                'provider' => $this->provider,
                'provider_id' => $job->id
            ],
            [
                'title' => $job->title,
                'company' => $job->client,
                'location' => $job->location,
                'url' => $job->url,
                'tags' => array_merge($job->tools, $job->languages),
                'salary' => $job->flat_rate ?? $job->hourly_rate
            ]
        );
    }
}
