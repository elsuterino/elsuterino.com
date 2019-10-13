<?php

namespace App\Observers;

use Elsuterino\Discord;
use App\Job;
use Illuminate\Support\Str;

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
        $payload = [
            'title' => $job->title,
            'color' => hexdec($job->provider->color),
            'url' => $job->url,
            'author' => [
                'name' => $job->provider->title,
                'url' => $job->provider->url,
                'icon_url' => $job->provider->media->first()->getFullUrl(),
            ],
            'description' => $job->description,
        ];

        if ($job->company) {
            $payload['fields'][] = [
                'name' => 'Company',
                'value' => $job->company,
                'inline' => true,
            ];
        }

        if ($job->location) {
            $payload['fields'][] = [
                'name' => 'Location',
                'value' => $job->location,
                'inline' => true,
            ];
        }

        if ($job->salary) {
            $payload['fields'][] = [
                'name' => 'Salary',
                'value' => $job->salary,
                'inline' => true,
            ];
        }

        if ($job->logo) {
            $payload['thumbnail']['url'] = $job->logo;
        }

        if ($job->tags && is_array($job->tags) && count($job->tags)) {
            $payload['fields'][] = [
                'name' => 'Tags',
                'value' => implode(', ', $job->tags),
                'inline' => true,
            ];
        }

        if ($this->isLaravelJob($job)) {
            $payload['footer']['text'] = 'Laravel !!!';
        }

        $disc = new Discord();

        $disc->embed($payload)->send();
        // discord spam limit
        sleep(2);
    }

    private function isLaravelJob(Job $job)
    {
        // tags
        if(is_array($job->tags) && in_array('laravel', array_map('strtolower', $job->tags))){
            return true;
        }

        // description
        if(Str::contains(strtolower($job->description), 'laravel')){
            return true;
        }

        // title
        if(Str::contains(strtolower($job->title), 'laravel')){
            return true;
        }

        return false;
    }
}
