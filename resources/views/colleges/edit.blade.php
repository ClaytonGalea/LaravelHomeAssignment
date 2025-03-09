@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Edit College</h2>

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

    {{-- Edit College Form --}}
    <form action="{{ route('colleges.update', $college->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">College Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $college->name }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" name="address" value="{{ $college->address }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update College</button>
        <a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
