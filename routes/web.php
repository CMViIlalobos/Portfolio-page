<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;
use App\Models\Project;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/category/{category}', [ProjectController::class, 'byCategory'])->name('projects.category');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Demos
Route::get('/demos/real-estate', [DemoController::class, 'realEstate'])->name('demos.real-estate');

// Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendMessage'])->name('contact.send');
Route::get('/sitemap.xml', function () {
    $staticUrls = collect([
        ['loc' => route('home'), 'priority' => '1.0'],
        ['loc' => route('projects.index'), 'priority' => '0.9'],
        ['loc' => route('about'), 'priority' => '0.8'],
        ['loc' => route('contact'), 'priority' => '0.8'],
    ]);

    try {
        $projectUrls = Project::published()
            ->orderBy('sort_order')
            ->get()
            ->map(fn (Project $project) => [
                'loc' => route('projects.show', $project),
                'priority' => '0.8',
            ]);
    } catch (\Throwable $e) {
        $projectUrls = collect([]);
    }

    return response()
        ->view('sitemap', ['urls' => $staticUrls->merge($projectUrls)])
        ->header('Content-Type', 'application/xml');
});
