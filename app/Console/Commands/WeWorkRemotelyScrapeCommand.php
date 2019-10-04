<?php

namespace App\Console\Commands;

use App\Job;
use App\Traits\CrawlerTrait;
use App\Traits\JobCommandTrait;
use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class WeWorkRemotelyScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:weworkremotely';
    protected $description = 'Scrapes WeWorkRemotely.com';

    public $provider = 'weworkremotely';

    public function getJobs($url)
    {
        $crawler = $this->crawlerGet($url);

        $jobs = $crawler->filter('.jobs li')
            ->each(function (Crawler $node) {
                return $this->formatJob($node);
            });

        // needs some filtering due to last li element being navigation
        return Arr::where($jobs, function($item){
            return $item['provider_id'] && $item['title'];
        });
    }

    public function formatJob(Crawler $node)
    {
        return [
            'provider_id' => $this->url($node),
            'title' => $node->filter('.title')->first()->text(null),
            'company' => $node->filter('.company')->first()->text(null),
            'url' => $this->url($node),
            'location' => $node->filter('.region.company')->first()->text(null),
            'logo' => $this->logo($node),
        ];
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
