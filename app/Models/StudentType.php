<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentType extends Model
{
    use HasFactory;
    protected $fillable = ['desc'];

    public function students()
    {
        return $this->hasMany(Student::class, 'student_type_id');
    }
}
