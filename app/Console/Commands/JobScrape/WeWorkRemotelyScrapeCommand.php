<?php

namespace App\Console\Commands\JobScrape;

use App\Traits\CrawlerTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class WeWorkRemotelyScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:weworkremotely {--silent}';
    protected $description = 'Scrapes WeWorkRemotely.com';

    public $key = 'weworkremotely';

    public function getJobs($url)
    {
        $crawler = $this->crawlerGet($url);

        $jobs = $crawler->filter('.jobs li')
            ->each(function (Crawler $node) {
                return $this->formatJob($node);
            });

        // needs some filtering due to last li element being navigation
        return $this->trimJobsArray($jobs);
    }

    public function trimJobsArray($jobs)
    {
        return Arr::where($jobs, function ($item) {
            return $item['provider_id'] && $item['title'];
        });
    }

    public function formatJob(Crawler $node)
    {
        return [
            'provider_id' => $this->url($node),
            'title' => $this->firstNodeText($node, '.title'),
            'company' => $this->firstNodeText($node, '.company'),
            'url' => $this->url($node),
            'location' => $this->firstNodeText($node, '.region.company'),
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
