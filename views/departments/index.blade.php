@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Departments</h2>
    <a href="{{ route('departments.create') }}" class="btn btn-primary">+ New Department</a>
</div>

<div class="card shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Code</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($departments as $dept)
        <tr>
          <td>{{ $dept->id }}</td>
          <td><a href="{{ route('departments.show',$dept) }}">{{ $dept->name }}</a></td>
          <td>{{ $dept->code }}</td>
          <td>
            <a href="{{ route('departments.edit',$dept) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            <form action="{{ route('departments.destroy',$dept) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Delete this department?');">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center text-muted p-4">No departments yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  {{ $departments->links() }}
</div>
@endsection
