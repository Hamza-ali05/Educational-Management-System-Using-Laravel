@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h2>Edit Faculty</h2>
    <a href="{{ route('faculties.index') }}" class="btn btn-secondary btn-sm">Back to Faculties</a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <form action="{{ route('faculties.update', $faculty) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="emp_no" class="form-label">Employee No</label>
        <input type="text" name="emp_no" id="emp_no" class="form-control" value="{{ old('emp_no', $faculty->emp_no) }}" required>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $faculty->name) }}" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $faculty->email) }}" required>
      </div>

      <div class="mb-3">
        <label for="department_id" class="form-label">Department</label>
        <select name="department_id" id="department_id" class="form-select" required>
          <option value="">Select Department</option>
          @foreach($departments as $dept)
            <option value="{{ $dept->id }}" {{ old('department_id', $faculty->department_id) == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $faculty->role) }}">
      </div>

      <div class="mb-3">
        <label for="hire_date" class="form-label">Hire Date</label>
        <input type="date" name="hire_date" id="hire_date" class="form-control" value="{{ old('hire_date', $faculty->hire_date) }}">
      </div>

      <button class="btn btn-primary">Update Faculty</button>
    </form>
  </div>
</div>
@endsection
