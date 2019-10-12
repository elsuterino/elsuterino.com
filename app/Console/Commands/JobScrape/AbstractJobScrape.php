<?php


namespace App\Console\Commands\JobScrape;


use App\Job;
use App\Provider;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

abstract class AbstractJobScrape extends Command implements JobScrapeInterface
{
    public $key;

    protected $provider;

    public function __construct()
    {
        parent::__construct();

        $this->provider = Provider::where('title', $this->key)->first();

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

    public function sainitiseTags(array $jobs){
        foreach($jobs as $index => $job){
            if(isset($job['tags']) && is_array($job['tags'])){
                $jobs[$index]['tags'] = json_encode($job['tags']);
            }
        }

        return $jobs;
    }

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
