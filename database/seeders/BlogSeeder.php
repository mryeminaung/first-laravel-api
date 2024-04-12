<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::truncate();
        Category::truncate();

        $categories = ['frontend', 'backend'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => $category
            ]);
        }

        Blog::factory()->count(10)->create();
    }
}
