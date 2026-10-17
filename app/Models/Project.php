<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'technologies', 'image_path',
        'demo_url', 'github_url', 'completed_at', 'featured', 'sort_order',
    ];

    protected $casts = [
        'completed_at' => 'date',
        'featured' => 'boolean',
    ];

    public function getTechnologiesArrayAttribute(): array
    {
        return $this->technologies ? explode(',', $this->technologies) : [];
    }
}
