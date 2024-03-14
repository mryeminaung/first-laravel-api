<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'date_of_birth', 'student_card_id', 'student_type_id'];

    public function card()
    {
        return $this->hasOne(StudentCard::class, 'id');
    }
}
