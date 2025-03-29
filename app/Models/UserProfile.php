<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class UserProfile extends Model
{
    protected $guarded = [];

    // One to one relationship with user
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
