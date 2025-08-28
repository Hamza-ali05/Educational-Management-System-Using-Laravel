@extends('layouts.app')

@section('content')
<h2 class="mb-3">Edit Department</h2>

<div class="card shadow-sm">
  <div class="card-body">
    <form method="POST" action="{{ route('departments.update',$department) }}">
      @csrf @method('PUT')
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name',$department->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Code</label>
        <input name="code" value="{{ old('code',$department->code) }}" class="form-control @error('code') is-invalid @enderror">
        @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description',$department->description) }}</textarea>
      </div>

      <button class="btn btn-primary">Update</button>
      <a href="{{ route('departments.index') }}" class="btn btn-link">Back</a>
    </form>
  </div>
</div>
@endsection
