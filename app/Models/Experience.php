<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'job_title', 'company', 'location', 'start_date', 'end_date',
        'current', 'description', 'sort_order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'current' => 'boolean',
    ];

    public function getPeriodAttribute(): string
    {
        $start = $this->start_date?->format('m/Y');
        $end = $this->current ? 'Actualidad' : ($this->end_date?->format('m/Y') ?? '');
        return trim("{$start} - {$end}");
    }
}
