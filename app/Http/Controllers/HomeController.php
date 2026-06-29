<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
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
                ->limit(3)
                ->get();

            $skills = Skill::orderBy('sort_order')->get();

            if ($featuredProjects->isEmpty()) {
                throw new \Exception('No projects in DB');
            }
        } catch (\Exception $e) {
            $featuredProjects = collect([
                (object) [
                    'title' => 'Baby Day Tracker',
                    'slug' => 'baby-day-tracker',
                    'category' => 'Mobile App',
                    'excerpt' => 'A calm Flutter care companion for feeding, sleep, diapers, vaccines, appointments, memories, reminders, and pediatrician-ready exports.',
                    'technologies' => ['Flutter', 'Dart', 'Riverpod', 'Hive', 'PDF Export'],
                    'cover_image' => 'project-assets/baby-day-phone-collage-classic.png',
                    'featured' => true,
                ],
                (object) [
                    'title' => 'HRIS',
                    'slug' => 'hris',
                    'category' => 'Enterprise System',
                    'excerpt' => 'A large Laravel HR operations platform for employee records, PDS data, plantilla, recruitment, competency, reports, monitoring, and admin controls.',
                    'technologies' => ['Laravel', 'PHP', 'MySQL', 'Blade', 'ApexCharts'],
                    'cover_image' => 'project-assets/hris-dashboard.png',
                    'featured' => true,
                ],
                (object) [
                    'title' => 'ORAS of PPA',
                    'slug' => 'oras-of-ppa',
                    'category' => 'Government Workflow',
                    'excerpt' => 'A Laravel + React/Inertia public-service travel appointment and QR verification system for PPA passenger and vessel workflows.',
                    'technologies' => ['Laravel', 'Inertia React', 'TypeScript', 'Tailwind CSS', 'QR/OTP'],
                    'cover_image' => 'project-assets/oras-language-selection.png',
                    'featured' => true,
                ],
            ]);

            $skills = collect([]);
        }

        return view('home', compact('featuredProjects', 'skills'));
    }
}
