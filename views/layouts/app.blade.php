<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>School Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">School Manager</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-3">
        <li class="nav-item"><a class="nav-link" href="{{ route('departments.index') }}">Departments</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Students</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('teachers.index') }}">Teachers</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('faculties.index') }}">Faculties</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-4">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
</div>

</body>
</html>
