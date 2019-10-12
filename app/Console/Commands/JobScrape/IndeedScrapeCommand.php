<?php


namespace App\Console\Commands\JobScrape;

use App\Traits\CrawlerTrait;
use Symfony\Component\DomCrawler\Crawler;

class IndeedScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:indeed {--silent}';
    protected $description = 'Scrapes Indeed.com';

    public $key = 'indeed';

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

            if ($text = $this->firstNodeText($lastPagination, '.pn .np')) {
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
            'title' => $this->firstNodeText($node, '.title > a'),
            'company' => $this->firstNodeText($node, '.sjcl .company'),
            'location' => $this->firstNodeText($node, '.sjcl .location'),
            'description' => $this->firstNodeText($node, '.summary'),
            'url' => $this->firstNodeLink($node, '.title > a'),
            'salary' => $this->firstNodeText($node, '.salaryText'),
        ];
    }
}
