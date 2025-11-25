<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class State extends Model
{
    protected $table = 'states';

    protected $fillable = [
        'name',
        'description'
    ];

    public function passengers(): BelongsToMany
    {
        return $this->belongsToMany(Passenger::class, 'state_logs')
            ->withTimestamps();
    }

    public function logs(): HasMany
    {
        return $this->hasMany(StateLog::class, 'state_id');
    }
}
