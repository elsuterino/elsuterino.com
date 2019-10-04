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

        foreach($this->config['url'] as $url){
            $this->getJobs($url);
        }
    }

    public function getJobs($url = null)
    {
        $url .= '&created_at__gte=' . Carbon::now()->subMonth()->timestamp * 1000;

        $client = new Client();

        $data = $client->request('get', $url);

        $data = json_decode($data->getBody());

        foreach($data->results as $job){
            if($job->is_active === false){
                continue;
            }

            if(!$job->id){
                continue;
            }

            $this->doJob($job);
        }

        if($data->next){
            $this->getJobs($data->next);
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
