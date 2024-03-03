<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create(); 
        Blog::truncate();
        Category::truncate();

        $frontend = Category::create([
            'name' => 'frontend',
            'slug' => 'frontend'
        ]);

        $backend = Category::create([
            'name' => 'backend',
            'slug' => 'backend'
        ]);

        Blog::factory(5)->create(['category_id' => $frontend]);
        Blog::factory(5)->create(['category_id' => $backend]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
