<?php


namespace App\Console\Commands\JobScrape;

use App\Traits\CrawlerTrait;
use Symfony\Component\DomCrawler\Crawler;

class GlassDoorScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:glassdoor {--silent}';
    protected $description = 'Scrapes glassdoor.com';

    public $key = 'glassdoor';

    public function getJobs($url)
    {
        $url .= '?' . http_build_query($this->provider->query_params);

        $crawler = $this->crawlerGet($url);

        return $crawler->filter("ul.jlGrid > li.jl")
            ->each(function (Crawler $node) {
                return $this->formatJob($node);
            });
    }

    public function formatJob(Crawler $node)
    {
        return [
            'provider_id' => $node->attr('data-id'),
            'title' => $this->firstNodeText($node, '.jobContainer > a.jobTitle'),
            'company' => $this->firstNodeText($node, '.jobEmpolyerName'),
            'location' => $this->firstNodeText($node, '.subtle.loc'),
            'url' => $this->firstNodeLink($node, 'a.jobTitle'),
            'logo' => $this->firstNodeAttribute($node, '.logoWrap img', 'data-original'),
        ];
    }
}
