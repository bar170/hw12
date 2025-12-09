<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventState extends Model
{
    protected $table = 'event_state';

    protected $fillable = [
        'event_id',
        'state_id',
    ];

    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
