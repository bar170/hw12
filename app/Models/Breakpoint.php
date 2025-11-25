<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Breakpoint extends Model
{
    protected $table = 'breakpoints';

    protected $fillable = [
        'name',
        'latitude',
        'longitude'
    ];

    public function startSegments(): HasMany
    {
        return $this->hasMany(Segment::class, 'start_id');
    }

    public function endSegments(): HasMany
    {
        return $this->hasMany(Segment::class, 'end_id');
    }
}
