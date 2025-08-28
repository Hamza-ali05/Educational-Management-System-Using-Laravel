@extends('layouts.app')

@section('content')
<div class="mb-3">
    <h2>Faculty Details</h2>
    <a href="{{ route('faculties.index') }}" class="btn btn-secondary btn-sm">Back to Faculties</a>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <table class="table table-borderless">
      <tr>
        <th>Employee No:</th>
        <td>{{ $faculty->emp_no }}</td>
      </tr>
      <tr>
        <th>Name:</th>
        <td>{{ $faculty->name }}</td>
      </tr>
      <tr>
        <th>Email:</th>
        <td>{{ $faculty->email }}</td>
      </tr>
      <tr>
        <th>Department:</th>
        <td>{{ $faculty->department->name ?? '-' }}</td>
      </tr>
      <tr>
        <th>Role:</th>
        <td>{{ $faculty->role }}</td>
      </tr>
      <tr>
        <th>Hire Date:</th>
        <td>{{ $faculty->hire_date }}</td>
      </tr>
    </table>
  </div>
</div>
@endsection
