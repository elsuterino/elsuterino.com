<?php


namespace Elsuterino\ScrapeCommand;


use App\Job;
use App\Provider;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

abstract class AbstractJobScrape extends Command implements JobScrapeInterface
{
    /**
     * @var Provider|\Illuminate\Database\Eloquent\Model|object|null
     */
    protected $provider;

    /**
     * @var array
     */
    protected $settings;

    /**
     * AbstractJobScrape constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->provider = $this->provider();

        if (!$this->provider) {
            logger()->critical(get_class($this) . ' Provider not set');

            exit();
        }
    }

    public function handle()
    {
        foreach ($this->provider->query_urls as $url) {
            $jobs = $this->getJobs($url);

            $this->info('Found ' . count($jobs) . ' jobs in ' . $url);

            $this->saveJobs($jobs, $this->option('silent'));
        }
    }

    /**
     * @return Provider|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function provider()
    {
        $provider = Provider::where('title', $this->settings['title'])->first();

        if (!$provider) {
            $provider = Provider::create($this->settings);
        }

        return $provider;
    }

    /**
     * @param  array  $jobs
     * @return array
     */
    public function sainitiseTags(array $jobs)
    {
        foreach ($jobs as $index => $job) {
            if (isset($job['tags']) && is_array($job['tags'])) {
                $jobs[$index]['tags'] = json_encode($job['tags']);
            }
        }

        return $jobs;
    }

    /**
     * @param  array  $jobs
     * @param  null  $silent
     */
    public function saveJobs(array $jobs, $silent = null)
    {
        if ($silent) {
            DB::table('jobs')->insertOrIgnore($this->sainitiseTags($jobs));
        } else {
            foreach ($jobs as $job) {
                $this->provider
                    ->jobs()
                    ->firstOrCreate(
                        [
                            'url' => $job['url'],
                        ],
                        [
                            'title' => $job['title'],
                            'company' => $job['company'] ?? null,
                            'location' => $job['location'] ?? null,
                            'tags' => $job['tags'] ?? null,
                            'salary' => $job['salary'] ?? null,
                            'description' => $job['description'] ?? null,
                            'logo' => $job['logo'] ?? null,
                        ]
                    );
            }
        }
    }
}
