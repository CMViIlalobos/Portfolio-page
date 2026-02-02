<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'description',
        'cover_image',
        'images',
        'demo_url',
        'github_url',
        'category',
        'technologies',
        'featured',
        'published',
        'sort_order',
        'published_at'
    ];

    protected $casts = [
        'technologies' => 'array',
        'images' => 'array',
        'featured' => 'boolean',
        'published' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}