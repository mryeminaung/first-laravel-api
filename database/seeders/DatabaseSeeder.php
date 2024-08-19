<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('blog_user')->insert(['blog_id' => 1, 'user_id' => 2]);
        DB::table('blog_user')->insert(['blog_id' => 1, 'user_id' => 3]);
        DB::table('blog_user')->insert(['blog_id' => 1, 'user_id' => 4]);
        DB::table('blog_user')->insert(['blog_id' => 4, 'user_id' => 1]);
        DB::table('blog_user')->insert(['blog_id' => 3, 'user_id' => 1]);
        DB::table('blog_user')->insert(['blog_id' => 2, 'user_id' => 1]);
        DB::table('blog_user')->insert(['blog_id' => 6, 'user_id' => 6]);
        DB::table('blog_user')->insert(['blog_id' => 7, 'user_id' => 6]);
        DB::table('blog_user')->insert(['blog_id' => 1, 'user_id' => 6]);

        $this->call([
            // BlogSeeder::class,
            // BookSeeder::class,
            // PostSeeder::class,
            // StudentSeeder::class,
        ]);
    }
}
