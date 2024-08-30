<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $tableName = 'blogs';
    // protected $with = ['category', 'author'];

    // every column could be filled except id column
    // protected $guarded = ['id'];

    // every column could be filled
    protected $guarded = [];

    protected $fillable = ['category_id', 'user_id', 'title', 'slug', 'intro', 'body'];

    // public $timestamps = false;
    // this will make timestamps for model : created_at and updated_at as NULL

    public function scopeFilter($query, $filter)
    {
        // here $query is the query that's Blog::latest();
        $query->when($filter['slug'] ?? null, function ($query, $search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('body', 'LIKE', '%' . $search . '%');
        });

        $query->when($filter['category'] ?? null, function ($query, $slug) {
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
            // $query->join('categories', 'blogs.category_id', '=', 'categories.id');
        });
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = strtolower(implode('-', explode(' ', $value)));
    }

    public function subscribe()
    {
        $this->subscribers()->attach(auth()->id());
    }

    public function unSubscribe()
    {
        $this->subscribers()->detach(auth()->id());
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'blog_user', 'blog_id', 'user_id');
    }

    public function category()
    {
        // type of relationship models
        // hasOne, hasMany, belongsTo, belongsToMany

        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
