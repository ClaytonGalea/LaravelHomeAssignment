@extends('layouts.main')

@section('title', 'Students')

@section('content')
    <div class="container">
        <h2>Students</h2>

        <div class="mb-3">
            <label for="college_filter" class="form-label">Filter by College:</label>
            <select id="college_filter" class="form-select" onchange="filterByCollege()">
                @foreach ($colleges as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>

         {{-- Sorting Component --}}
         @include('students._sort')

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>College</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->college->name }}</td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                <!--prevents malicious attacks by ensuring that the request is coming from your application.-->
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function filterByCollege() {
            var collegeId = document.getElementById('college_filter').value;
            window.location.href = "{{ route('students.index') }}?college_id=" + collegeId;
        }
    </script>
@endsection