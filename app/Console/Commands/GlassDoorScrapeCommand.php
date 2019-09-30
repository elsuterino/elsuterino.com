<?php


namespace App\Console\Commands;

use App\Job;
use App\Traits\ScrapeTrait;
use Goutte\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class GlassDoorScrapeCommand extends Command
{
    use ScrapeTrait;

    protected $signature = 'scrape:glassdoor';
    protected $description = 'Scrapes glassdoor.com';
    protected $provider = 'glassdoor';
    protected $config;

    public function handle()
    {
        $this->config = $this->getConfig($this->provider);

        $this->getJobs();
    }

    public function getJobs()
    {
        $url = $this->config['url'] . '?' . http_build_query($this->config['params']);

        $client = new Client();

        $data = $client->request('get', $url);

        $data->filter("ul.jlGrid > li.jl")
            ->each(function (Crawler $node) {
                $this->doJob($node);
            });
    }

    public function doJob(Crawler $node)
    {
        Job::firstOrCreate(
            [
                'provider' => $this->provider,
                'provider_id' => $node->attr('data-id')
            ],
            [
                'title' => trim($node->filter('.jobContainer > a.jobTitle')->first()->text(null)),
                'company' => trim($node->filter('.jobEmpolyerName')->first()->text(null)),
                'location' => trim($node->filter('.subtle.loc')->first()->text(null)),
                'url' => $this->firstNodeLink($node, 'a.jobTitle'),
                'logo' => $this->firstNodeAttribute($node, '.logoWrap img', 'data-original'),
//                'rating' => $node->filter('.compactStars')->first()->text(null),
            ]
        );
    }
}
