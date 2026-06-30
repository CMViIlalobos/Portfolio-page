<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Support\PortfolioProjects;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ProjectController
{
    public function index()
    {
        try {
            DB::connection()->getPdo();

            $projectCollection = Project::where('published', true)
                ->orderBy('sort_order')
                ->get();

            $projectCollection = PortfolioProjects::mergeWith($projectCollection)
                ->sortBy('sort_order')
                ->values();

            $projects = $this->paginateCollection($projectCollection, 9);

            $categories = $projectCollection
                ->pluck('category')
                ->unique()
                ->values();

            if ($projects->isEmpty()) {
                throw new \Exception('No projects found');
            }
        } catch (\Exception $e) {
            $fallback = PortfolioProjects::all();
            $projects = $this->paginateCollection($fallback, 9);
            $categories = $fallback->pluck('category')->unique();
        }

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(string $project)
    {
        try {
            DB::connection()->getPdo();

            $project = Project::where('slug', $project)
                ->where('published', true)
                ->firstOrFail();

            $relatedProjects = Project::where('published', true)
                ->whereKeyNot($project->id)
                ->orderBy('sort_order')
                ->limit(3)
                ->get();
        } catch (\Exception $e) {
            $fallback = PortfolioProjects::all();
            $project = $fallback->firstWhere('slug', $project);

            abort_if(! $project, 404);

            $relatedProjects = $fallback
                ->where('slug', '!=', $project->slug)
                ->take(3)
                ->values();
        }

        return view('projects.show', compact('project', 'relatedProjects'));
    }

    public function byCategory($category)
    {
        try {
            DB::connection()->getPdo();

            $projectCollection = Project::where('published', true)
                ->orderBy('sort_order')
                ->get();

            $projectCollection = PortfolioProjects::mergeWith($projectCollection)
                ->sortBy('sort_order')
                ->values();

            $projects = $this->paginateCollection(
                $projectCollection->where('category', $category)->values(),
                9
            );

            $allCategories = $projectCollection->pluck('category')->unique()->values();
        } catch (\Exception $e) {
            $fallback = PortfolioProjects::all()->where('category', $category)->values();
            $projects = $this->paginateCollection($fallback, 9);
            $allCategories = PortfolioProjects::all()->pluck('category')->unique()->values();
        }

        return view('projects.category', compact('projects', 'category', 'allCategories'));
    }

    private function paginateCollection($items, int $perPage): LengthAwarePaginator
    {
        $items = collect($items)->values();
        $page = LengthAwarePaginator::resolveCurrentPage();

        return new LengthAwarePaginator(
            $items->forPage($page, $perPage)->values(),
            $items->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}
