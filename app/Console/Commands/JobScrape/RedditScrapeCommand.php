<?php

namespace App\Console\Commands\JobScrape;

use Elsuterino\ScrapeCommand\AbstractJobScrape;
use Elsuterino\Traits\CrawlerTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Regex\Regex;
use Symfony\Component\DomCrawler\Crawler;

class RedditScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:reddit {--silent}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapes reddit.com';

    /**
     * Title most important, others take priority from database
     *
     * @var array
     */
    public $settings = [
        'title' => 'reddit',
        'url' => 'https://reddit.com',
        'color' => '#ff4500',
        'query_urls' => [
            'https://www.reddit.com/r/forhire/search/?q=(title%3A%22%5Bhiring%5D%22%20OR%20flair%3AHiring)%20AND%20(subreddit%3Aforhire%20OR%20subreddit%3Ajobbit%20OR%20subreddit%3Ajobopenings)&restrict_sr=1&t=day',
            'https://www.reddit.com/r/forhire/search/?q=(title%3A%22%5Bhiring%5D%22%20OR%20flair%3AHiring)%20AND%20(subreddit%3Aforhire%20OR%20subreddit%3Ajobbit%20OR%20subreddit%3Ajobopenings)&restrict_sr=1&t=hour',
        ],
        'other' => [
            'keywords' => ['web', 'developer', 'backend', 'laravel', 'php'],
        ],
    ];

    public function getJobs($url)
    {
        $crawler = $this->crawlerGet($url);

        $jobs = $crawler->filter('.Post')
            ->each(function (Crawler $node) {
                return $this->formatJob($node);
            });

        return $this->filterJobs($jobs);
    }

    public function filterJobs(array $jobs)
    {
        return Arr::where($jobs, function($job){
            return Str::contains($job['title'], $this->provider()->other['keywords']);
        });
    }

    public function formatJob(Crawler $node)
    {
        $url = $this->firstNodeLink($node, 'a[data-click-id="body"]');

        return [
            'provider_id' => $url,
            'title' => $this->firstNodeText($node, 'a h3 > span'),
            'url' => $url,
            'logo' => $this->getLogo($node),
        ];
    }

    public function getLogo(Crawler $node)
    {
        $img = $node->filter('div[data-click-id="image"][role="img"]');

        if (!count($img)) {
            return null;
        }

        $img = $img->first()->attr('style');

        $img = Regex::match('/(?:url\()([a-z0-9-:.\/_]+)\)/i', $img)->groupOr(1, 'none');

        return $img === 'none' ? null : $img;
    }
}
