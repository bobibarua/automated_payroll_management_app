@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Attendance</h2>
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Employee:</label>
            <select class="form-control" id="employee_id" name="employee_id">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $attendance->date }}" required>
        </div>
        <div class="form-group">
            <label for="present">Present:</label>
            <select class="form-control" id="present" name="present">
                <option value="1" {{ $attendance->present ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$attendance->present ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Attendance</button>
    </form>
</div>
@endsection
