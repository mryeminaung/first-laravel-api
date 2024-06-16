<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
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
        User::truncate();
        Blog::truncate();
        Category::truncate();

        $categories = ['frontend post', 'backend post'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => str_replace(' ', '-', $category)
            ]);
        }

        Blog::factory()->count(6)->create();
        User::factory()->count(3)->create();
    }
}
