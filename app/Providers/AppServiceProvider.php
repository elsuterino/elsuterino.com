<?php

namespace App\Providers;

use App\Job;
use App\Observers\JobObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerInertia();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Job::observe(JobObserver::class);
    }

    public function registerInertia()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
            'auth' => function () {
                return [
                    'user' => Auth::user() ? [
                        'id' => Auth::user()->id,
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                    ] : null,
                ];
            },
            'flash' => function () {
                return [
                    'success' => Session::get('success'),
                ];
            },
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            }
        ]);
    }
}
