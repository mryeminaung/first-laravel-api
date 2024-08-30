<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
        // 'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return auth()->user()->is_admin;
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_user', 'user_id', 'blog_id');
    }

    public function isSubscribed($blog)
    {
        return auth()->user()->subscribedBlogs &&
            auth()->user()->subscribedBlogs->contains($blog->id);
    }

    // accessor function
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    // mutator function
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
