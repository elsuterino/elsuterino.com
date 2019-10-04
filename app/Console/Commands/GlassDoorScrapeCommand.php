<?php


namespace App\Console\Commands;

use App\Traits\CrawlerTrait;
use Symfony\Component\DomCrawler\Crawler;

class GlassDoorScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:glassdoor';
    protected $description = 'Scrapes glassdoor.com';

    public $provider = 'glassdoor';

    public function getJobs($url)
    {
        $url .= '?' . http_build_query($this->config['params']);

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
            'title' => trim($node->filter('.jobContainer > a.jobTitle')->first()->text(null)),
            'company' => trim($node->filter('.jobEmpolyerName')->first()->text(null)),
            'location' => trim($node->filter('.subtle.loc')->first()->text(null)),
            'url' => $this->firstNodeLink($node, 'a.jobTitle'),
            'logo' => $this->firstNodeAttribute($node, '.logoWrap img', 'data-original'),
        ];
    }
}
