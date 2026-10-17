<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'category', 'level', 'sort_order'];

    public function scopeByCategory($query)
    {
        return $query->orderBy('category')->orderBy('sort_order');
    }
}
