@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Edit Student</h2>
    

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @method('PUT')
        @include('students._form', ['buttonText' => 'Update Student'])
    </form>
</div>
@endsection
