<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name', 'title', 'bio', 'email', 'phone', 'phone_alt',
        'address', 'city', 'state', 'country', 'postal_code',
        'birth_date', 'nationality', 'marital_status',
        'github_url', 'linkedin_url', 'website_url',
        'languages', 'photo_path',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function getLanguagesArrayAttribute(): array
    {
        return $this->languages ? explode(',', $this->languages) : [];
    }
}
