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
            // Try to connect to DB
            DB::connection()->getPdo();
            
            $featuredProjects = Project::where('featured', true)
                ->where('published', true)
                ->orderBy('sort_order')
                ->limit(6)
                ->get();

            $skills = Skill::orderBy('sort_order')->get();
            
            // If DB is empty, use fallback
            if ($featuredProjects->isEmpty()) {
                throw new \Exception("No projects in DB");
            }
            
        } catch (\Exception $e) {
            // Fallback for Vercel / No DB
            $featuredProjects = collect([
                (object)[
                    'title' => 'E-Commerce Platform',
                    'slug' => 'e-commerce-platform',
                    'category' => 'Web Application',
                    'cover_image' => 'https://images.unsplash.com/photo-1557821552-17105176677c?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Portfolio CMS',
                    'slug' => 'portfolio-cms',
                    'category' => 'CMS',
                    'cover_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Task Management App',
                    'slug' => 'task-management',
                    'category' => 'Productivity',
                    'cover_image' => 'https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Real Estate Listing',
                    'slug' => 'real-estate',
                    'category' => 'Real Estate',
                    'cover_image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Healthcare Portal',
                    'slug' => 'healthcare-portal',
                    'category' => 'Healthcare',
                    'cover_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Social Dashboard',
                    'slug' => 'social-dashboard',
                    'category' => 'Dashboard',
                    'cover_image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=800&q=80',
                    'featured' => true
                ]
            ]);

            $skills = collect([]);
        }

        return view('home', compact('featuredProjects', 'skills'));
    }
}
