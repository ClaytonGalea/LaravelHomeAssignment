@extends('layouts.main')

@section('title', 'Add College')

@section('content')
    <div class="container">
        <h2>Add New College</h2>

        <form action="{{ route('colleges.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">College Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Add College</button>
        </form>
    </div>
@endsection
