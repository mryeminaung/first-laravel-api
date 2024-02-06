<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $tableName = "students";
    protected $fillable = ['name', 'email', 'age'];
    protected $primaryKey = "student_id";
}
