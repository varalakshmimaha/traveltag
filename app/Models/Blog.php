<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'image', 'author',
        'meta_title', 'meta_description', 'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
