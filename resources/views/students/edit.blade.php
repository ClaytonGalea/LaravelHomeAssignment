@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Edit Student</h2>
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

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @method('PUT')
        @include('students._form', ['buttonText' => 'Update Student'])
    </form>
</div>
@endsection
