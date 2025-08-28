<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Department; 

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $departments = Department::all(); // fetch all departments
    return view('teachers.create', compact('departments')); // pass variable
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
    'department_id' => ['required', 'exists:departments,id'],
    'emp_no'        => ['required','max:20','unique:teachers,emp_no'],
    'name'          => ['required','max:100'],
    'email'         => ['required','email','unique:teachers,email'],
    'phone'         => ['nullable','max:20'],
    'designation'   => ['nullable','max:50'],
    'hire_date'     => ['nullable','date'],
]);


        Teacher::create($validated);
        return redirect()->route('teachers.index')->with('success', 'Teacher created.');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $departments = Department::all(); // fetch all departments
    return view('teachers.edit', compact('teacher', 'departments')); // pass variable
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
    'department_id' => ['required', 'exists:departments,id'],
    'emp_no'        => ['required','max:20','unique:teachers,emp_no,' . $teacher->id],
    'name'          => ['required','max:100'],
    'email'         => ['required','email','unique:teachers,email,' . $teacher->id],
    'phone'         => ['nullable','max:20'],
    'designation'   => ['nullable','max:50'],
    'hire_date'     => ['nullable','date'],
]);


        $teacher->update($validated);
        return redirect()->route('teachers.index')->with('success', 'Teacher updated.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted.');
    }
}
