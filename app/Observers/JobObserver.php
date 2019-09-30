<?php

namespace App\Observers;

use App\Discord;
use App\Job;

class JobObserver
{
    /**
     * Handle the job "created" event.
     *
     * @param  Job  $job
     * @return void
     */
    public function created(Job $job)
    {
        $config = config("job.providers.{$job->provider}");

        if(!$config || !config('job.discordWebhook')){
            return;
        }

        $payload = [
            'title' => $job->title,
            'color' => $config['color'],
            'url' => $job->url,
            'author' => [
                'name' => $config['name'],
                'url' => $config['displayUrl'],
                'icon_url' => $config['iconUrl'],
            ],
            'description' => $job->description,
        ];

        if($job->company){
            $payload['fields'][] = [
                'name' => 'Company',
                'value' => $job->company,
                'inline' => true,
            ];
        }

        if($job->location){
            $payload['fields'][] = [
                'name' => 'Location',
                'value' => $job->location,
                'inline' => true,
            ];
        }

        if($job->salary){
            $payload['fields'][] = [
                'name' => 'Salary',
                'value' => $job->salary,
                'inline' => true,
            ];
        }

        if($job->logo){
            $payload['thumbnail']['url'] = $job->logo;
        }

        if($job->tags && is_array($job->tags) && count($job->tags)){
            $payload['fields'][] = [
                'name' => 'Tags',
                'value' => implode(', ', $job->tags),
                'inline' => true,
            ];
        }

        $disc = new Discord();

        $disc->embed($payload)->send();

        // discord spam limit
        sleep(2);
    }
}
