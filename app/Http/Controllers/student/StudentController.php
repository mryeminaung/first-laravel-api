<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student;
use App\Models\StudentCard;
use App\Models\StudentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['card', 'type'])->get();
        Session::put('pre_url', request()->fullUrl());

        return view('students.index', ['students' => $students]);
    }

    public function create()
    {
        return view('students.create', ['types' => StudentType::all()]);
    }

    public function store(StudentStoreRequest $request)
    {
        $formData = $request->validated();
        $formData['student_card_id'] = StudentCard::factory()->create()->id;

        Student::create($formData);

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return view('students.detail', ['student' => $student->load(['card', 'type'])]);
    }

    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student, 'types' => StudentType::all()]);
    }

    public function update(StudentUpdateRequest $request, Student $student)
    {
        $student->update($request->validated());
        return back()->with('update', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->card()->delete();
        $student->delete();
        return redirect()->route('students.index');
    }
}
