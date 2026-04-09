<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Itinerary extends Model
{
    protected $fillable = ['program_id', 'day_title', 'description', 'order'];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
