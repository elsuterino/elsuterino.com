<?php


namespace App\Console\Commands;

use App\Job;
use App\Traits\ScrapeTrait;
use Goutte\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class LarajobsScrapeCommand extends Command
{
    use ScrapeTrait;

    protected $signature = 'scrape:larajobs';
    protected $description = 'Scrapes larajobs.com';
    protected $provider = 'larajobs';
    protected $config;

    public function handle()
    {
        $this->config = $this->getConfig($this->provider);

        $this->getJobs();
    }

    public function getJobs()
    {
        $client = new Client();

        $data = $client->request('get', $this->config['url']);

        $data->filter('.jobs tr')
            ->each(function (Crawler $node) {
                $this->doJob($node);
            });
    }

    public function doJob(Crawler $node){
        Job::firstOrCreate(
            [
                'provider' => $this->provider,
                'provider_id' => $this->getUrl($node),
            ],
            [
                'title' => trim($node->filter('.details .description')->first()->text(null)),
                'company' => trim($node->filter('.details > h4')->first()->text(null)),
                'location' => trim($node->filter('.job-wrap div')->last()->text(null)),
                'url' => $this->getUrl($node),
                'logo' => $this->firstNodeAttribute($node, 'a > img', 'src', 'https://larajobs.com'),
            ]
        );
    }

    public function getUrl(Crawler $node)
    {
        $dataUrl = (string) $node->filter('a')->first()->attr('data-url');
        $href = $node->filter('a')->first()->link()->getUri();

        if (!empty($dataUrl)) {
            return $dataUrl;
        }

        if(!empty($href)){
            return $href;
        }

        return null;
    }
}
