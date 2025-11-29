<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'description'
    ];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function transports(): HasMany
    {
        return $this->hasMany(Transport::class);
    }

    public function routes(): HasMany
    {
        return $this->hasMany(Route::class);
    }
}
