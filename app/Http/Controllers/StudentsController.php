<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Students::orderBy('student_id', 'asc')->get();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Students::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age
        ]);

        // $student = new Students;
        // $student->name = $request->name;
        // $student->email = $request->email;
        // $student->age = $request->age;
        // $student->save();

        return response()->json([
            'success' => true,
            'message' => 'Created Successfully',
            "data" => $student
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Students::find($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Students $student)
    {
        // $student = Students::find($id);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age
        ]);

        // $student->name = $request->name;
        // $student->email = $request->email;
        // $student->age = $request->age;
        // $student->save();

        return response()->json([
            'success' => true,
            'message' => 'Updated Successfully',
            "data" => $student
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $student)
    {
        // $student = Students::find($id);
        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully',
            "data" => $student
        ]);
    }
}
