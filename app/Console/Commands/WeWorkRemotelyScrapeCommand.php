<?php

namespace App\Console\Commands;

use App\Job;
use App\Traits\ScrapeTrait;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class WeWorkRemotelyScrapeCommand extends Command
{
    use ScrapeTrait;

    protected $signature = 'scrape:weworkremotely';
    protected $description = 'Scrapes WeWorkRemotely.com';
    protected $provider = 'weworkremotely';
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

        $data->filter('.jobs li')
            ->each(function (Crawler $node) {
                $this->doJob($node);
            });
    }

    public function doJob(Crawler $node)
    {
        Job::firstOrCreate(
            [
                'provider' => $this->provider,
                'provider_id' => $this->url($node),
            ],
            [
                'title' => $node->filter('.title')->first()->text(null),
                'company' => $node->filter('.company')->first()->text(null),
                'url' => $this->url($node),
                'location' => $node->filter('.region.company')->first()->text(null),
                'logo' => $this->logo($node),
            ]
        );
    }

    public function url(Crawler $node)
    {
        $urls = $node->filter('a')->each(function (Crawler $node) {
            return $node->link()->getUri();
        });

        foreach ($urls as $url) {
            if (Str::contains($url, 'https://weworkremotely.com/remote-jobs/')) {
                return $url;
            }
        }

        return null;
    }

    public function logo(Crawler $node)
    {
        if (!count($node->filter('.flag-logo'))) {
            return null;
        }

        $logo = $node->filter('.flag-logo')->first()->attr('style');

        preg_match('/(?:\()([a-z0-9-:.\/]+)/i', $logo, $logos);

        return $logos[1] ?? null;
    }
}
