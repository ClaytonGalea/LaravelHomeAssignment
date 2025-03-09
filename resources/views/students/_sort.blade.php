@php
    // Determine sorting order
    $sortOrder = request('sort') === 'asc' ? 'desc' : 'asc';
@endphp

<a href="{{ route('students.index', ['sort' => $sortOrder, 'college_id' => request('college_id')]) }}" class="btn btn-primary">
    Sort by Name ({{ request('sort') === 'asc' ? 'Descending' : 'Ascending' }})
</a>
