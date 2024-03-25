<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $tableName = 'blogs';

    // every column could be filled except id column
    // protected $guarded = ['id'];

    // every column could be filled
    protected $guarded = [];

    // protected $fillable = ['title', 'slug', 'intro', 'body'];

    // public $timestamps = false;
    // this will make timestamps for model : created_at and updated_at as NULL

    // public function category()
    // {
    //     // type of relationship models
    //     // hasOne, hasMany, belongsTo, belongsToMany

    //     return $this->belongsTo(Category::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
