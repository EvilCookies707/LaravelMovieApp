<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    /**
     * The users that belong to the favorite movies.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'favorite_user');
    }
}
