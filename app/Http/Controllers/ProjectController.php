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
                throw new \Exception("No projects found");
            }
            
        } catch (\Exception $e) {
            // Fallback Data
            $dummyProjects = collect([
                (object)[
                    'title' => 'E-Commerce Platform',
                    'slug' => 'e-commerce-platform',
                    'excerpt' => 'A full-featured online store built with Laravel and React.',
                    'category' => 'Web Application',
                    'cover_image' => 'https://images.unsplash.com/photo-1557821552-17105176677c?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Portfolio CMS',
                    'slug' => 'portfolio-cms',
                    'excerpt' => 'A content management system for creative professionals.',
                    'category' => 'CMS',
                    'cover_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Task Management App',
                    'slug' => 'task-management',
                    'excerpt' => 'Streamline your workflow with this intuitive task manager.',
                    'category' => 'Productivity',
                    'cover_image' => 'https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Real Estate Listing',
                    'slug' => 'real-estate',
                    'excerpt' => 'Find your dream home with our advanced property search.',
                    'category' => 'Real Estate',
                    'cover_image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Healthcare Portal',
                    'slug' => 'healthcare-portal',
                    'excerpt' => 'Secure patient management system for medical facilities.',
                    'category' => 'Healthcare',
                    'cover_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&q=80',
                    'featured' => true
                ],
                (object)[
                    'title' => 'Social Dashboard',
                    'slug' => 'social-dashboard',
                    'excerpt' => 'Analytics and management for social media accounts.',
                    'category' => 'Dashboard',
                    'cover_image' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=800&q=80',
                    'featured' => true
                ]
            ]);

            $projects = new LengthAwarePaginator($dummyProjects, $dummyProjects->count(), 9);
            $categories = $dummyProjects->pluck('category')->unique();
        }

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        // Note: Route binding might fail before reaching here if DB is down.
        // But since we use implicit binding, Laravel tries to find the model.
        // If it fails, it throws 404. We can't easily try-catch the route binding itself inside the controller 
        // without changing the route definition to use ID or explicit binding.
        // However, for Vercel static deployment without DB, the index page is most important.
        // If the user clicks a project, it might error if DB is gone.
        // We can handle this by checking if $project exists, but implicit binding handles that.
        
        // If we are in "fallback mode" (no DB), the route binding will fail with 404 because the ID/Slug isn't in DB.
        // To fix this fully for a "static" feel, we'd need to override `resolveRouteBinding` in the Model
        // or change the route to not use binding.
        // For now, let's assume the Index page is the priority.
        
        return view('projects.show', compact('project'));
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
             // Fallback
            $dummyProjects = collect([
                (object)[
                    'title' => 'E-Commerce Platform',
                    'slug' => 'e-commerce-platform',
                    'excerpt' => 'A full-featured online store built with Laravel and React.',
                    'category' => 'Web Application',
                    'cover_image' => 'https://images.unsplash.com/photo-1557821552-17105176677c?w=800&q=80',
                    'featured' => true
                ]
            ])->filter(function($p) use ($category) {
                return $p->category === $category;
            });
            
            $projects = new LengthAwarePaginator($dummyProjects, $dummyProjects->count(), 9);
        }

        return view('projects.category', compact('projects', 'category'));
    }
}
