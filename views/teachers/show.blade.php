@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h2>Teacher Details</h2>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary btn-sm">Back to Teachers</a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <table class="table table-borderless">
      <tr>
        <th>Employee No:</th>
        <td>{{ $teacher->emp_no }}</td>
      </tr>
      <tr>
        <th>Name:</th>
        <td>{{ $teacher->name }}</td>
      </tr>
      <tr>
        <th>Email:</th>
        <td>{{ $teacher->email }}</td>
      </tr>
      <tr>
        <th>Department:</th>
        <td>{{ $teacher->department->name ?? '-' }}</td>
      </tr>
      <tr>
        <th>Designation:</th>
        <td>{{ $teacher->designation }}</td>
      </tr>
      <tr>
        <th>Hire Date:</th>
        <td>{{ $teacher->hire_date }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
