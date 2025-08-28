<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\Department; 

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::latest()->paginate(10);
        return view('faculties.index', compact('faculties'));
    }

    public function create()
    {
        $departments = Department::all(); // fetch all departments
    return view('faculties.create', compact('departments')); // pass variable
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
    'department_id' => ['required', 'exists:departments,id'],
    'emp_no'        => ['required','max:20','unique:faculties,emp_no'],
    'name'          => ['required','max:100'],
    'email'         => ['nullable','email','unique:faculties,email'],
    'phone'         => ['nullable','max:20'],
    'role'          => ['nullable','max:50'],
    'hire_date'     => ['nullable','date'],
]);


        Faculty::create($validated);
        return redirect()->route('faculties.index')->with('success', 'Faculty created.');
    }

    public function show(Faculty $faculty)
    {
        return view('faculties.show', compact('faculty'));
    }

    public function edit(Faculty $faculty)
    {
        $departments = Department::all(); // fetch all departments
    return view('faculties.edit', compact('faculty', 'departments')); // pass variable
    }

    public function update(Request $request, Faculty $faculty)
    {
        $validated = $request->validate([
    'department_id' => ['required', 'exists:departments,id'],
    'emp_no'        => ['required','max:20','unique:faculties,emp_no,' . $faculty->id],
    'name'          => ['required','max:100'],
    'email'         => ['nullable','email','unique:faculties,email,' . $faculty->id],
    'phone'         => ['nullable','max:20'],
    'role'          => ['nullable','max:50'],
    'hire_date'     => ['nullable','date'],
]);


        $faculty->update($validated);
        return redirect()->route('faculties.index')->with('success', 'Faculty updated.');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('faculties.index')->with('success', 'Faculty deleted.');
    }
}
