@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Attendance</h2>
    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee:</label>
            <select class="form-control" id="employee_id" name="employee_id">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="present">Present:</label>
            <select class="form-control" id="present" name="present">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add Attendance</button>
    </form>
</div>
@endsection
