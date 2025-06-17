<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'password_confirmation',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts() :HasMany
    {
        return $this->hasMany(Post::class);
    }

    protected $appends = ['name','username'];
 
    protected function name(): Attribute{
        return new Attribute(
            get: fn () => $this->firstname . ' ' . $this->lastname,
        
        );
    }

    protected function username(): Attribute{
        return new Attribute(
            get: fn () => Str::lower($this->firstname ). '@' . 
                          Str::lower($this->lastname) . '_' .
                          $this->id,
        );
    }

    // public function getNameAttribute()
    // {
    //     return $this->firstname . ' ' . $this->lastname;
    // }

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['firstname'] = $value['firstname'];
    //     $this->attributes['lastname'] = $value['lastname'];
    // }

}
