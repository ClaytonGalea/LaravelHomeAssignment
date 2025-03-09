@csrf

<div class="mb-3">
    <label for="name" class="form-label">College Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $college->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="address" class="form-label">Address:</label>
    <input type="text" class="form-control" name="address" value="{{ old('address', $college->address ?? '') }}" required>
</div>

<button type="submit" class="btn btn-success">{{ $buttonText }}</button>
<a href="{{ route('colleges.index') }}" class="btn btn-secondary">Cancel</a>
