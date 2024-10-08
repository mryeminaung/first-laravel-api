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
        // Comment::truncate();
        // User::truncate();
        // Blog::truncate();
        // Category::truncate();

        $categories = ['frontend', 'backend'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => str_replace(' ', '-', "$category post")
            ]);
        }

        User::factory()->hasBlogs(3)->create([
            'name' => 'Ninja',
            'username' => 'ninja',
            'email' => 'ninja@mail.com',
            'password' => 'password',
            'avatar' => 'https://i.pravatar.cc/150?u=10',
            'email_verified_at' => now()
        ]);

        User::factory()->hasBlogs(5)->count(5)->create();
        Comment::factory()->count(50)->create();
    }
}
