<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InertiaTest extends TestCase
{
    public function innertiaResponse($url)
    {
        $this->get($url)->assertStatus(200);
        $this->get($url, ['X-Inertia' => true])->assertStatus(200)->assertJsonStructure([
            'component', 'props', 'url', 'version',
        ]);
    }

    /** @test * */
    public function home_page_returns_inertia_response()
    {
        $this->innertiaResponse('/');
    }

    /** @test * */
    public function about_page_returns_inertia_response()
    {
        $this->innertiaResponse('/about');
    }

    /** @test * */
    public function skills_page_returns_inertia_response()
    {
        $this->innertiaResponse('/skills');
    }

    /** @test * */
    public function portfolio_page_returns_inertia_response()
    {
        $this->innertiaResponse('/portfolio');
    }

    /** @test * */
    public function contact_page_returns_inertia_response()
    {
        $this->innertiaResponse('/contact');
    }
}
