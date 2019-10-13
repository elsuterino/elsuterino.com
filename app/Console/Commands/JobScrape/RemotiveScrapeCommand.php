<?php


namespace App\Console\Commands\JobScrape;

use Elsuterino\ScrapeCommand\AbstractJobScrape;
use Elsuterino\Traits\CrawlerTrait;
use Symfony\Component\DomCrawler\Crawler;
use Spatie\Regex\Regex;

class RemotiveScrapeCommand extends AbstractJobScrape
{
    use CrawlerTrait;

    protected $signature = 'scrape:remotive {--silent}';

    protected $description = 'Scrapes remotive.io';

    /**
     * Title most important, others take priority from database
     *
     * @var array
     */
    public $settings = [
        'title' => 'remotive',
        'url' => 'https://remotive.io',
        'color' => '#0096e3',
        'query_urls' => [
            'https://remotive.io/remote-jobs/software-dev?search=php',
            'https://remotive.io/remote-jobs/software-dev?search=laravel',
        ]
    ];

    public function getJobs($url)
    {
        $crawler = $this->crawlerGet($url);

        return $crawler->filter('.job-list > li')
            ->each(function (Crawler $node) {
                return $this->formatJob($node);
            });
    }

    public function formatJob(Crawler $node)
    {
        return [
            'provider_id' => $this->getId($node),
            'title' => $this->firstNodeText($node, '.position a'),
            'company' => $this->firstNodeText($node, '.company span'),
            'location' => $this->firstNodeText($node, '.company > .location'),
            'url' => $node->filter('.position > a')->first()->link()->getUri(),
            'logo' => $this->getLogo($node),
            'tags' => $node->filter('.job-tags > .job-tag')->extract(['_text']),
        ];
    }

    public function getId(Crawler $node)
    {
        $url = $node->filter('.position a')->first()->link()->getUri();

        $url = Regex::match('/([0-9]+)$/', $url)->groupOr(1, 'none');

        return $url === 'none' ? null : $url;
    }

    public function getUrl(Crawler $node)
    {
        $dataUrl = (string) $node->filter('a')->first()->attr('data-url');
        $href = $node->filter('a')->first()->link()->getUri();

        if (!empty($dataUrl)) {
            return 'https://remotive.io' . $dataUrl;
        }

        if (!empty($href)) {
            return $href;
        }

        return null;
    }

    public function getLogo(Crawler $node)
    {
        $img = $node->filter('.job-logo');

        if (!count($img)) {
            return null;
        }

        $img = $img->first()->attr('style');

        $img = Regex::match('/(?:url\()([a-z0-9-:.\/]+)\)/i', $img)->groupOr(1, 'none');

        return $img === 'none' ? null : 'https://remotive.io' . $img;
    }
}
