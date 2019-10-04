<?php


namespace App\Console\Commands;

use App\Traits\CrawlerTrait;
use Symfony\Component\DomCrawler\Crawler;

class IndeedScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:indeed';
    protected $description = 'Scrapes Indeed.com';

    public $provider = 'indeed';

    public function getJobs($url)
    {
        $crawler = $this->crawlerGet($url);

        $jobs = $crawler->filter('#resultsCol .jobsearch-SerpJobCard')
            ->each(function (Crawler $node) {
                return $this->formatJob($node);
            });

        // pagination
        if (count($crawler->filter('#resultsCol .pagination > a'))) {

            $lastPagination = $crawler->filter('#resultsCol .pagination > a')->last();

            if ($text = trim($lastPagination->filter('.pn .np')->first()->text(null))) {
                if (strtolower($text) === 'next »') {
                    $jobs = array_merge(
                        $jobs,
                        $this->getJobs($lastPagination->link()->getUri())
                    );
                }
            }
        }

        return $jobs;
    }

    public function formatJob(Crawler $node)
    {
        return [
            'provider_id' => $node->attr('id'),
            'title' => trim($node->filter('.title > a')->first()->text(null)),
            'company' => trim($node->filter('.sjcl .company')->first()->text(null)),
            'location' => trim($node->filter('.sjcl .location')->first()->text(null)),
            'description' => trim($node->filter('.summary')->first()->text(null)),
            'url' => $this->firstNodeLink($node, '.title > a'),
            'salary' => trim($node->filter('.salaryText')->first()->text(null)),
        ];
    }
}
