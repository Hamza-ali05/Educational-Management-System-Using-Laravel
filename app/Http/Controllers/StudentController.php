<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Department; 

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all(); // fetch all departments
        return view('students.create', compact('departments')); // ✅ pass to view
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
    'department_id' => ['required', 'exists:departments,id'],
    'roll_no'       => ['required','max:20','unique:students,roll_no'],
    'name'          => ['required','max:100'],
    'email'         => ['required','email','unique:students,email'],
    'phone'         => ['nullable','max:20'],
    'dob'           => ['nullable','date'],
    'gender'        => ['nullable','max:20'],
    'address'       => ['nullable','max:255'],
]);


        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Student created.');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $departments = Department::all(); // fetch all departments
        return view('students.edit', compact('student', 'departments')); // ✅ pass to view
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
    'department_id' => ['required', 'exists:departments,id'],
    'roll_no'       => ['required','max:20','unique:students,roll_no,' . $student->id],
    'name'          => ['required','max:100'],
    'email'         => ['required','email','unique:students,email,' . $student->id],
    'phone'         => ['nullable','max:20'],
    'dob'           => ['nullable','date'],
    'gender'        => ['nullable','max:20'],
    'address'       => ['nullable','max:255'],
]);


        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }
}
