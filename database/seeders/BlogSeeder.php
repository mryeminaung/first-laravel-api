<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::truncate();
        // User::truncate();
        // Blog::truncate();
        Category::truncate();

        $categories = ['frontend', 'backend'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => str_replace(' ', '-', "$category post")
            ]);
        }

        Blog::factory()->count(18)->create();
        User::factory()->count(3)->create();
        Comment::factory()->count(40)->create();
    }
}
