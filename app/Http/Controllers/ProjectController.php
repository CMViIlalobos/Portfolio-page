<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController
{
    public function index()
    {
        try {
            $projects = Project::where('published', true)
                ->orderBy('sort_order')
                ->paginate(9);

            $categories = Project::where('published', true)
                ->select('category')
                ->distinct()
                ->pluck('category');
        } catch (\Exception $e) {
            $projects = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 9);
            $categories = collect([]);
        }

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        if (!$project->published) {
            abort(404);
        }

        $relatedProjects = Project::where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->where('published', true)
            ->limit(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }

    public function byCategory($category)
    {
        $projects = Project::where('category', $category)
            ->where('published', true)
            ->orderBy('sort_order')
            ->paginate(9);

        return view('projects.category', compact('projects', 'category'));
    }
}