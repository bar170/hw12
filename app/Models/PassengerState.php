<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PassengerState extends Model
{
    protected $table = 'passenger_state';

    protected $fillable = [
        'passenger_id',
        'state_id',
    ];

    public function passenger(): BelongsTo
    {
        return $this->belongsTo(Passenger::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
