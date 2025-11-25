<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'user_id',
        'role_id',
        'company_id'
    ];

    public function user(): BelongsTo  
    {
        return $this->belongsTo(User::class);
    }

    public function role(): BelongsTo  
    {
        return $this->belongsTo(Role::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
