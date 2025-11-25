<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Route extends Model
{
    protected $table = 'routes';

    protected $fillable = [
        'name',
        'description',
        'company_id',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function segments(): HasMany
    {
        return $this->hasMany(Segment::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
