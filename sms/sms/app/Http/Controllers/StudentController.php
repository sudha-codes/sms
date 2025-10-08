<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students with optional search/filter
   public function index(Request $request)
{
    $query = Student::query();

    // Search by name/email
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
        });
    }

    // Filter by course
    if ($request->filled('course')) {
        $query->where('course', $request->course); 
    }

    $students = $query->orderBy('name')->paginate(10);

    // Pass unique courses for filter dropdown
    $courses = Student::select('course')->distinct()->pluck('course');

    return view('students.index', compact('students', 'courses'));
}


    // Show create form
    public function create()
    {
        return view('students.create');
    }

    // Store new student
    public function store(Request $request)
{
    $request->validate([
        'name'   => 'required|string|max:255',
        'email'  => 'required|email|unique:students,email',
        'course' => 'required|string|max:255',
        'marks'  => 'required|integer|min:0|max:100',
    ]);

    Student::create($request->only(['name', 'email', 'course', 'marks']));

    return redirect()->route('students.index')
                     ->with('success', 'Student added successfully!');
}

    // Show edit form
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, Student $student)
    {

        $student->update($request->only(['name', 'email', 'course', 'marks']));

        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully!');
    }

    // Delete student
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully!');
    }
}
