@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Edit College</h2>

    <form action="{{ route('colleges.update', $college->id) }}" method="POST">
        @method('PUT')
        @include('colleges._form', ['buttonText' => 'Update College'])
    </form>
</div>
@endsection
