<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = App\Models\Project::first();
if ($project) {
    echo "Title: " . $project->title . "\n";
    echo "Cover Image: " . $project->cover_image . "\n";
    echo "Images: " . json_encode($project->images) . "\n";
} else {
    echo "No projects found.\n";
}
