<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str as str;

class Post extends Model
{
    use HasFactory;

    public function comments() :HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function slug(): Attribute {

        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => str::slug($this->title)
        );
    }


    /**
     * Get the route key for the model.
     *Method 1
     * @return string
     */
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    
}
