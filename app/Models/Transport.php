<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transport extends Model
{
    protected $table = 'transports';

    protected $fillable = [
        'number',
        'model',
        'mark',
        'color',
        'company_id',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
    
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
