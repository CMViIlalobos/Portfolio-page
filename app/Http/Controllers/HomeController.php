<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;

class HomeController
{
    public function index()
    {
        try {
            $featuredProjects = Project::where('featured', true)
                ->where('published', true)
                ->orderBy('sort_order')
                ->limit(3)
                ->get();

            $skills = Skill::orderBy('sort_order')->get();
        } catch (\Illuminate\Database\QueryException $e) {
            // Fallback for when database is not available (e.g. Vercel without DB)
            $featuredProjects = collect([]);
            $skills = collect([]);
        } catch (\Exception $e) {
            $featuredProjects = collect([]);
            $skills = collect([]);
        }

        return view('home', compact('featuredProjects', 'skills'));
    }
}