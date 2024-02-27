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

    // protected $guarded = []; every column could be filled

    protected $fillable = ['title', 'slug', 'intro', 'body'];

    // public $timestamps = false;
    // this will make timestamps for model : created_at and updated_at as NULL

}
