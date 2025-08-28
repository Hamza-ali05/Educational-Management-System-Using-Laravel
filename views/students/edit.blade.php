@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h2>Edit Student</h2>
    <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">Back to Students</a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <form action="{{ route('students.update', $student) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="roll_no" class="form-label">Roll No</label>
        <input type="text" name="roll_no" id="roll_no" class="form-control" value="{{ old('roll_no', $student->roll_no) }}" required>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $student->name) }}" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $student->email) }}" required>
      </div>

      <div class="mb-3">
        <label for="department_id" class="form-label">Department</label>
        <select name="department_id" id="department_id" class="form-select" required>
          <option value="">Select Department</option>
          @foreach($departments as $dept)
            <option value="{{ $dept->id }}" {{ old('department_id', $student->department_id) == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
          @endforeach
        </select>
      </div>

      <button class="btn btn-primary">Update Student</button>
    </form>
  </div>
</div>
@endsection
