<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title', 'subtitle', 'image', 'button_text', 'button_link', 'status', 'order'];

    public function scopeActive($query)
    {
        return $query->where('status', true)->orderBy('order');
    }
}
