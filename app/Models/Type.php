<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $table = 'types';

    protected $fillable = [
        'name',
        'description',
        'entity'
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
