<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Student;
use App\Models\StudentCard;
use App\Models\StudentType;
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
        // StudentCard::truncate();
        // Student::truncate();

        $categories = ['frontend', 'backend', 'android'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => $category
            ]);
        }

        Blog::factory()->count(15)->create();

        $types = ['undergraduate', 'graduate', 'high school', 'middle school', 'primary school', 'master', 'Phd', 'honor'];

        foreach ($types as $type) {
            StudentType::create([
                'desc' => ucwords($type)
            ]);
        }

        Student::factory()->count(10)->create();

        // StudentCard::factory()->count(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
