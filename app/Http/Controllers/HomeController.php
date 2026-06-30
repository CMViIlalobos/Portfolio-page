<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Support\PortfolioProjects;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
        try {
            DB::connection()->getPdo();

            $featuredProjects = Project::where('featured', true)
                ->where('published', true)
                ->orderBy('sort_order')
                ->get();

            $featuredProjects = PortfolioProjects::mergeWith($featuredProjects)
                ->sortBy('sort_order')
                ->values();

            $skills = Skill::orderBy('sort_order')->get();

            if ($featuredProjects->isEmpty()) {
                throw new \Exception('No projects in DB');
            }
        } catch (\Exception $e) {
            $featuredProjects = PortfolioProjects::all();

            $skills = collect([]);
        }

        return view('home', compact('featuredProjects', 'skills'));
    }
}
