<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramImage extends Model
{
    protected $fillable = ['program_id', 'image', 'order'];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
