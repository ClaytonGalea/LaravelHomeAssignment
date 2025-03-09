@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Add New Student</h2>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf  {{-- CSRF protection --}}
        
        <div class="mb-3">
            <label for="name" class="form-label">Student Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="number" class="form-control" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth:</label>
            <input type="date" class="form-control" name="dob" required>
        </div>

        <div class="mb-3">
            <label for="college_id" class="form-label">Select College:</label>
            <select class="form-select" name="college_id" required>
                @foreach ($colleges as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
</div>
@endsection
