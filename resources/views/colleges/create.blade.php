@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Add New College</h2>

    <form action="{{ route('colleges.store') }}" method="POST">
        @include('colleges._form', ['buttonText' => 'Add College'])
    </form>
</div>
@endsection
