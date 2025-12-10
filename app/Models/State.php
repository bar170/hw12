<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

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

    public function passengers_states(): HasMany
    {
        return $this->hasMany(PassengerState::class, 'state_id');
    }

        public function event_states(): HasMany
    {
        return $this->hasMany(EventState::class, 'state_id');
    }
}
