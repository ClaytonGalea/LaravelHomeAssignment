@csrf

<div class="mb-3">
    <label for="name" class="form-label">Student Name:</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $student->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" name="email" value="{{ old('email', $student->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="phone" class="form-label">Phone:</label>
    <input type="text" class="form-control" name="phone" value="{{ old('phone', $student->phone ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="dob" class="form-label">Date of Birth:</label>
    <input type="date" class="form-control" name="dob" value="{{ old('dob', $student->dob ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="college_id" class="form-label">Select College:</label>
    <select class="form-select" name="college_id" required>
        @foreach ($colleges as $id => $name)
            <option value="{{ $id }}" {{ old('college_id', $student->college_id ?? '') == $id ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-success">{{ $buttonText }}</button>
<a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
