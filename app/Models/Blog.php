<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\VarDumper\VarDumper;

// class Blog extends Model
class Blog
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

    public $title;
    public $slug;
    public $intro;
    public $body;

    public function __construct($title, $slug, $intro, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
    }

    public static function all()
    {
        $files = File::files(resource_path("blogs"));
        $blogs = [];
        foreach ($files as $file) {
            $obj = YamlFrontMatter::parse(file_get_contents($file));
            $blog = new Blog($obj->title, $obj->slug, $obj->intro, $obj->body());
            $blogs[] = $blog;
        }
        // dd($blogs);
        return $blogs;
    }

    public static function find($slug)
    {
        // get the location of the file name
        // $path = __DIR__ . "/../../resources/blogs/$slug.html";
        $path = resource_path("blogs/$slug.html");
        if (!file_exists($path)) {
            return redirect('/');
        }

        $blog = file_get_contents($path);
        return $blog;
    }

    // public function category()
    // {
    //     // type of relationship models
    //     // hasOne, hasMany, belongsTo, belongsToMany

    //     return $this->belongsTo(Category::class);
    // }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
