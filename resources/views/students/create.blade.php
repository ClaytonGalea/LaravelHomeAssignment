@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Add New Student</h2>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @include('students._form', ['buttonText' => 'Add Student'])
    </form>
</div>
@endsection
