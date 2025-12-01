<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transport extends Model
{
    use HasFactory;
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
