@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Add New Student</h2>

    <form action="{{ route('students.store') }}" method="POST">
        @include('students._form', ['buttonText' => 'Add Student'])
    </form>
</div>
@endsection
