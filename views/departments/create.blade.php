@extends('layouts.app')

@section('content')
<h2 class="mb-3">New Department</h2>

<div class="card shadow-sm">
  <div class="card-body">
    <form method="POST" action="{{ route('departments.store') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Code (e.g., CSE)</label>
        <input name="code" value="{{ old('code') }}" class="form-control @error('code') is-invalid @enderror">
        @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
      </div>

      <button class="btn btn-primary">Save</button>
      <a href="{{ route('departments.index') }}" class="btn btn-link">Cancel</a>
    </form>
  </div>
</div>
@endsection
