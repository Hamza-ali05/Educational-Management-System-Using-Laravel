@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Faculties</h2>
    <a href="{{ route('faculties.create') }}" class="btn btn-primary">+ New Faculty</a>
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
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($faculties as $faculty)
        <tr>
          <td>{{ $faculty->id }}</td>
          <td>{{ $faculty->emp_no }}</td>
          <td><a href="{{ route('faculties.show',$faculty) }}">{{ $faculty->name }}</a></td>
          <td>{{ $faculty->email }}</td>
          <td>{{ $faculty->department->name ?? '-' }}</td>
          <td>{{ $faculty->role }}</td>
          <td>
            <a href="{{ route('faculties.edit',$faculty) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            <form action="{{ route('faculties.destroy',$faculty) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Delete this faculty?');">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center text-muted p-4">No faculties yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">
  {{ $faculties->links() }}
</div>
@endsection
