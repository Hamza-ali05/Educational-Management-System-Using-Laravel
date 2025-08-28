@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Teachers</h2>
    <a href="{{ route('teachers.create') }}" class="btn btn-primary">+ New Teacher</a>
</div>

<div class="card shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Emp No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Department</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($teachers as $teacher)
        <tr>
          <td>{{ $teacher->id }}</td>
          <td>{{ $teacher->emp_no }}</td>
          <td><a href="{{ route('teachers.show',$teacher) }}">{{ $teacher->name }}</a></td>
          <td>{{ $teacher->email }}</td>
          <td>{{ $teacher->department->name ?? '-' }}</td>
          <td>
            <a href="{{ route('teachers.edit',$teacher) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            <form action="{{ route('teachers.destroy',$teacher) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Delete this teacher?');">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center text-muted p-4">No teachers yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  {{ $teachers->links() }}
</div>
@endsection
