<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;

class HomeController
{
    public function index()
    {
        $featuredProjects = Project::where('featured', true)
            ->where('published', true)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        $skills = Skill::orderBy('sort_order')->get();

        return view('home', compact('featuredProjects', 'skills'));
    }
}