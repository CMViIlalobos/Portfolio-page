<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/category/{category}', [ProjectController::class, 'byCategory'])->name('projects.category');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

// Demos
Route::get('/demos/real-estate', [DemoController::class, 'realEstate'])->name('demos.real-estate');

// Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendMessage'])->name('contact.send');
Route::get('/test-vite', function() {
    return view('test-vite');
});