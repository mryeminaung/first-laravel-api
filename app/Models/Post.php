<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $tableName = 'posts';
    protected $fillable = [
        'title', 'slug', 'image_url', 'body'
    ];

    /**
     * Get the route key for the model.
     * slug will be used as the column name to find the respective eloquent model instead of finding using an id
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
