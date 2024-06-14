<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentCard;
use App\Models\StudentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::truncate();

        $types = ['undergraduate', 'graduate', 'high school', 'middle school', 'primary school', 'master', 'Phd', 'honor'];

        foreach ($types as $type) {
            StudentType::create([
                'desc' => ucwords($type)
            ]);
        }

        Student::factory()->count(10)->create();
    }
}
