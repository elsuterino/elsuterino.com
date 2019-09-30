<?php


namespace App\Console\Commands;

use App\Job;
use App\Traits\ScrapeTrait;
use Goutte\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
use Spatie\Regex\Regex;

class RemotiveScrapeCommand extends Command
{
    use ScrapeTrait;

    protected $signature = 'scrape:remotive';
    protected $description = 'Scrapes remotive.io';
    protected $provider = 'remotive';
    protected $config;

    public function handle()
    {
        $this->config = $this->getConfig($this->provider);

        $this->getJobs();
    }

    public function getJobs()
    {
        $client = new Client();

        $data = $client->request('get', $this->config['url']);

        $data->filter('.job-list > li')
            ->each(function (Crawler $node) {
                $this->doJob($node);
            });
    }

    protected function doJob(Crawler $node)
    {
        Job::firstOrCreate(
            [
                'provider' => $this->provider,
                'provider_id' => $this->getId($node),
            ],
            [
                'title' => trim($node->filter('.position a')->first()->text(null)),
                'company' => trim($node->filter('.company span')->first()->text(null)),
                'location' => trim($node->filter('.company > .location')->first()->text(null)),
                'url' => $node->filter('.position > a')->first()->link()->getUri(),
                'logo' => $this->getLogo($node),
                'tags' => $node->filter('.job-tags > .job-tag')->extract(['_text']),
            ]
        );
    }

    protected function getId(Crawler $node)
    {
        $url = $node->filter('.position a')->first()->link()->getUri();

        $url = Regex::match('/([0-9]+)$/', $url)->groupOr(1, 'none');

        return $url === 'none' ? null : $url;
    }

    protected function getUrl(Crawler $node)
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

    protected function getLogo(Crawler $node)
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
