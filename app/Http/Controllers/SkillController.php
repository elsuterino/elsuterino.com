<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillRequest;
use App\Skill;
use App\SkillGroup;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SkillController extends Controller
{
    public function index()
    {
        $skills = SkillGroup::with(['skills'])
            ->ordered()
            ->get(['id', 'title', 'order']);

        return Inertia::render('Skills', ['skills' => $skills]);
    }
}
