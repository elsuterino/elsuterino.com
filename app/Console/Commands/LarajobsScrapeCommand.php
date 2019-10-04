<?php


namespace App\Console\Commands;

use App\Traits\CrawlerTrait;
use Symfony\Component\DomCrawler\Crawler;

class LarajobsScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:larajobs';
    protected $description = 'Scrapes larajobs.com';

    public $provider = 'larajobs';

    public function getJobs($url)
    {
        $crawler = $this->crawlerGet($url);

        return $crawler->filter('.jobs tr')
            ->each(function (Crawler $node) {
                return $this->formatJob($node);
            });
    }

    public function formatJob(Crawler $node)
    {
        return [
            'provider_id' => $this->getUrl($node),
            'title' => trim($node->filter('.details .description')->first()->text(null)),
            'company' => trim($node->filter('.details > h4')->first()->text(null)),
            'location' => trim($node->filter('.job-wrap div')->last()->text(null)),
            'url' => $this->getUrl($node),
            'logo' => $this->firstNodeAttribute($node, 'a > img', 'src', 'https://larajobs.com'),
        ];
    }

    public function getUrl(Crawler $node)
    {
        $dataUrl = (string) $node->filter('a')->first()->attr('data-url');
        $href = $node->filter('a')->first()->link()->getUri();

        if (!empty($dataUrl)) {
            return $dataUrl;
        }

        if (!empty($href)) {
            return $href;
        }

        return null;
    }
}
