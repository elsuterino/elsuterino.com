<?php


namespace App\Console\Commands\JobScrape;

use Elsuterino\ScrapeCommand\AbstractJobScrape;
use Elsuterino\Traits\CrawlerTrait;
use Symfony\Component\DomCrawler\Crawler;

class GlassDoorScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:glassdoor {--silent}';
    protected $description = 'Scrapes glassdoor.com';

    /**
     * Title most important, others take priority from database
     *
     * @var array
     */
    public $settings = [
        'title' => 'glassdoor',
        'url' => 'https://glassdoor.com',
        'color' => '#01b552',
        'query_urls' => [
            'https://www.glassdoor.com/Job/jobs.htm',
        ],
        'query_params' => [
            'applicationType' => "0",
            'cityId' => "-1",
            'companyId' => "-1",
            'employerSizes' => "0",
            'fromAge' => "3",
            'includeNoSalaryJobs' => "true",
            'industryId' => "-1",
            'jobType' => "all",
            'locId' => "11047",
            'locKeyword' => "Remote",
            'locT' => "S",
            'minRating' => "0",
            'minSalary' => "50000",
            'radius' => "25",
            'remoteWorkType' => "0",
            'sc.keyword' => "php",
            'seniorityType' => "all",
            'sgocId' => "-1",
        ],
    ];

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
