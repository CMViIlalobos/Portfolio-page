<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ProjectController
{
    public function index()
    {
        try {
            DB::connection()->getPdo();

            $projects = Project::where('published', true)
                ->orderBy('sort_order')
                ->paginate(9);

            $categories = Project::where('published', true)
                ->select('category')
                ->distinct()
                ->pluck('category');

            if ($projects->isEmpty()) {
                throw new \Exception('No projects found');
            }
        } catch (\Exception $e) {
            $fallback = $this->fallbackProjects();
            $projects = new LengthAwarePaginator($fallback, $fallback->count(), 9);
            $categories = $fallback->pluck('category')->unique();
        }

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        $relatedProjects = Project::where('published', true)
            ->whereKeyNot($project->id)
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }

    public function byCategory($category)
    {
        try {
            DB::connection()->getPdo();

            $projects = Project::where('category', $category)
                ->where('published', true)
                ->orderBy('sort_order')
                ->paginate(9);
        } catch (\Exception $e) {
            $fallback = $this->fallbackProjects()->where('category', $category)->values();
            $projects = new LengthAwarePaginator($fallback, $fallback->count(), 9);
        }

        return view('projects.category', compact('projects', 'category'));
    }

    private function fallbackProjects()
    {
        return collect([
            (object) [
                'title' => 'Baby Day Tracker',
                'slug' => 'baby-day-tracker',
                'excerpt' => 'A calm Flutter care companion for feeding, sleep, diapers, vaccines, appointments, memories, reminders, and pediatrician-ready exports.',
                'category' => 'Mobile App',
                'technologies' => ['Flutter', 'Dart', 'Riverpod', 'Hive', 'PDF Export'],
                'cover_image' => 'project-assets/baby-day-phone-collage-classic.png',
                'featured' => true,
            ],
            (object) [
                'title' => 'HRIS',
                'slug' => 'hris',
                'excerpt' => 'A large Laravel HR operations platform for employee records, PDS data, plantilla, recruitment, competency, reports, monitoring, and admin controls.',
                'category' => 'Enterprise System',
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'ApexCharts'],
                'cover_image' => 'project-assets/hris-dashboard.png',
                'featured' => true,
            ],
            (object) [
                'title' => 'ORAS of PPA',
                'slug' => 'oras-of-ppa',
                'excerpt' => 'A Laravel + React/Inertia public-service travel appointment and QR verification system for PPA passenger and vessel workflows.',
                'category' => 'Government Workflow',
                'technologies' => ['Laravel', 'Inertia React', 'TypeScript', 'Tailwind CSS', 'QR/OTP'],
                'cover_image' => 'project-assets/oras-language-selection.png',
                'featured' => true,
            ],
        ]);
    }
}
