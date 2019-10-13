<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::with('media')
            ->ordered()
            ->get()
            ->map(function ($item) {
                return [
                    'title' => $item->title,
                    'body' => $item->body,
                    'website' => $item->website,
                    'github' => $item->github,
                    'src_set' => $item->media->first()->getSrcset('conversion'),
                    'img' => $item->media->first()->getUrl(),
                ];
            });

        return Inertia::render('Portfolio', [
            'projects' => $projects,
        ]);
    }
}
