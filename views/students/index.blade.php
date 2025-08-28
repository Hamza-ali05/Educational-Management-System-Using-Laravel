@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Students</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">+ New Student</a>
</div>

<div class="card shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Roll No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Department</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($students as $student)
        <tr>
          <td>{{ $student->id }}</td>
          <td>{{ $student->roll_no }}</td>
          <td><a href="{{ route('students.show',$student) }}">{{ $student->name }}</a></td>
          <td>{{ $student->email }}</td>
          <td>{{ $student->department->name ?? '-' }}</td>
          <td>
            <a href="{{ route('students.edit',$student) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            <form action="{{ route('students.destroy',$student) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Delete this student?');">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center text-muted p-4">No students yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  {{ $students->links() }}
</div>
@endsection
