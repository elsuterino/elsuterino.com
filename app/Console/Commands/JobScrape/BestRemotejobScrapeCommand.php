<?php


namespace App\Console\Commands\JobScrape;

use Elsuterino\ScrapeCommand\AbstractJobScrape;
use Elsuterino\Traits\GuzzleTrait;
use Carbon\Carbon;

class BestRemotejobScrapeCommand extends AbstractJobScrape
{
    use GuzzleTrait;

    protected $signature = 'scrape:bestremotejob {--silent}';

    protected $description = 'Scrapes bestremotejob.com';

    /**
     * Title most important, others take priority from database
     *
     * @var array
     */
    protected $settings = [
        'title' => 'bestremotejob',
        'url' => 'https://bestremotejob.com',
        'color' => '#3D90E3',
        'query_urls' => [
            'https://api.doask.net/search/query/jobs/?is_active=true&search=php&limit=1000',
            'https://api.doask.net/search/query/jobs/?is_active=true&search=laravel&limit=1000',
        ]
    ];

    public function getJobs($url)
    {
        $jobs = [];

        // limit only to last month
        $url .= '&created_at__gte=' . Carbon::now()->subMonth()->timestamp * 1000;

        $data = $this->guzzleGetJson($url);

        foreach ($data->results as $job) {
            if ($job->is_active === false) {
                continue;
            }

            if (!$job->id) {
                continue;
            }

            $jobs[] = $this->formatJob($job);
        }

        if ($data->next) {
            array_merge($jobs, $this->getJobs($data->next));
        }

        return $jobs;
    }

    public function formatJob($job)
    {
        return [
            'provider_id' => $job->id,
            'title' => $job->title,
            'company' => $job->client,
            'location' => $job->location,
            'url' => $job->url,
            'tags' => array_merge($job->tools, $job->languages),
            'salary' => $job->flat_rate ?? $job->hourly_rate,
        ];
    }
}
