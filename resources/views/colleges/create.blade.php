@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Add New College</h2>

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

    <form action="{{ route('colleges.store') }}" method="POST">
        @include('colleges._form', ['buttonText' => 'Add College'])
    </form>
</div>
@endsection
