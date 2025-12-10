<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Segment extends Model
{
    use HasFactory;
    
    protected $table = 'segments';

    protected $fillable = [
        'name',
        'description',
        'cost',
        'order',
        'start_id',
        'end_id',
        'route_id',
    ];

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }
    public function start(): BelongsTo
    {
        return $this->belongsTo(Breakpoint::class, 'start_id');
    }

    public function end(): BelongsTo
    {
        return $this->belongsTo(Breakpoint::class, 'end_id');
    }
}
