@extends('layouts.main') 

@section('title', 'Colleges')

@section('content')
{{-- Display error messages --}}
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="container">
        <h2>Colleges</h2>
        <a href="{{ route('colleges.create') }}" class="btn btn-primary">Add New College</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                    <tr>
                        <td>{{ $college->name }}</td>
                        <td>{{ $college->address }}</td>
                        <td>
                            <a href="{{ route('colleges.edit', $college->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('colleges.destroy', $college->id) }}" method="POST" style="display:inline;">
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
@endsection