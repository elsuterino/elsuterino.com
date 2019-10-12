<?php

namespace App\Console\Commands\JobScrape;

use App\Traits\CrawlerTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class RemoteCoScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:remoteco {--silent}';
    protected $description = 'Scrapes remote.co';

    public $key = 'remoteco';

    public function getJobs($url)
    {
        $crawler = $this->crawlerGet($url);

        $jobs = $crawler->filter('ul.job_listings li.job_listing')
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
            'provider_id' => $this->firstNodeLink($node, 'a'),
            'title' => $this->firstNodeText($node, '.position > h3'),
            'company' => $this->firstNodeText($node, '.company > span'),
            'url' => $this->firstNodeLink($node, 'a'),
            'logo' => $this->firstNodeAttribute($node, 'img.company_logo', 'src'),
            'tags' => $node->filter('.company > span.job_flag')->extract(['_text'])
        ];
    }
}
