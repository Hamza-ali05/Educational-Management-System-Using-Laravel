@extends('layouts.app')

@section('content')
<h2 class="mb-3">{{ $department->name }} ({{ $department->code }})</h2>

<div class="card shadow-sm mb-3">
  <div class="card-body">
    <p class="mb-0">{{ $department->description ?? '—' }}</p>
  </div>
</div>

<div class="row g-3">
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Students</h5>
        <p class="display-6">{{ $department->students()->count() }}</p>
        <a href="{{ route('students.index') }}" class="btn btn-sm btn-outline-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Teachers</h5>
        <p class="display-6">{{ $department->teachers()->count() }}</p>
        <a href="{{ route('teachers.index') }}" class="btn btn-sm btn-outline-primary">View</a>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Faculties</h5>
        <p class="display-6">{{ $department->faculties()->count() }}</p>
        <a href="{{ route('faculties.index') }}" class="btn btn-sm btn-outline-primary">View</a>
      </div>
    </div>
  </div>
</div>
@endsection
