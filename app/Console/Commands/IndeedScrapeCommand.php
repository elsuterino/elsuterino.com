<?php


namespace App\Console\Commands;

use App\Job;
use App\Traits\ScrapeTrait;
use Goutte\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class IndeedScrapeCommand extends Command
{
    use ScrapeTrait;

    protected $signature = 'scrape:indeed';
    protected $description = 'Scrapes Indeed.com';
    protected $provider = 'indeed';
    protected $config;

    public function handle()
    {
        $this->config = $this->getConfig($this->provider);

        $this->getJobs($this->config['url']);
    }

    public function getJobs($url)
    {
        $client = new Client();

        $data = $client->request('get', $url);

        $jobs = $data->filter('#resultsCol .jobsearch-SerpJobCard')
            ->each(function (Crawler $node) {
                $this->doJob($node);
            });

        // pagination
        if (count($data->filter('#resultsCol .pagination > a'))) {

            $lastPagination = $data->filter('#resultsCol .pagination > a')->last();

            if ($text = trim($lastPagination->filter('.pn .np')->first()->text(null))) {
                if (strtolower($text) === 'next »') {
                    $this->getJobs($lastPagination->link()->getUri());
                }
            }
        }

        return $jobs;
    }

    public function doJob(Crawler $node)
    {
        Job::firstOrCreate(
            [
                'provider' => $this->provider,
                'provider_id' => $node->attr('id'),
            ],
            [
                'title' => trim($node->filter('.title > a')->first()->text(null)),
                'company' => trim($node->filter('.sjcl .company')->first()->text(null)),
                'location' => trim($node->filter('.sjcl .location')->first()->text(null)),
                'description' => trim($node->filter('.summary')->first()->text(null)),
                'url' => $this->firstNodeLink($node, '.title > a'),
                'salary' => trim($node->filter('.salaryText')->first()->text(null)),
            ]
        );
    }
}
