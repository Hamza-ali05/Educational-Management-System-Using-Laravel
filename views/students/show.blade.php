@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h2>Student Details</h2>
    <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">Back to Students</a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <table class="table table-borderless">
      <tr>
        <th>Roll No:</th>
        <td>{{ $student->roll_no }}</td>
      </tr>
      <tr>
        <th>Name:</th>
        <td>{{ $student->name }}</td>
      </tr>
      <tr>
        <th>Email:</th>
        <td>{{ $student->email }}</td>
      </tr>
      <tr>
        <th>Department:</th>
        <td>{{ $student->department->name ?? '-' }}</td>
      </tr>
      <tr>
        <th>Phone:</th>
        <td>{{ $student->phone }}</td>
      </tr>
      <tr>
        <th>DOB:</th>
        <td>{{ $student->dob }}</td>
      </tr>
      <tr>
        <th>Gender:</th>
        <td>{{ $student->gender }}</td>
      </tr>
      <tr>
        <th>Address:</th>
        <td>{{ $student->address }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
