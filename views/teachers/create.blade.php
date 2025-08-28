@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h2>Add New Teacher</h2>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary btn-sm">Back to Teachers</a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <form action="{{ route('teachers.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="emp_no" class="form-label">Employee No</label>
        <input type="text" name="emp_no" id="emp_no" class="form-control" value="{{ old('emp_no') }}" required>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
      </div>

      <div class="mb-3">
        <label for="department_id" class="form-label">Department</label>
        <select name="department_id" id="department_id" class="form-select" required>
          <option value="">Select Department</option>
          @foreach($departments as $dept)
            <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="designation" class="form-label">Designation</label>
        <input type="text" name="designation" id="designation" class="form-control" value="{{ old('designation') }}">
      </div>

      <div class="mb-3">
        <label for="hire_date" class="form-label">Hire Date</label>
        <input type="date" name="hire_date" id="hire_date" class="form-control" value="{{ old('hire_date') }}">
      </div>

      <button class="btn btn-primary">Save Teacher</button>
    </form>
  </div>
</div>
@endsection
