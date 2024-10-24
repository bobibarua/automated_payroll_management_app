@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Attendance Management</h2>
    <a href="{{ route('attendances.create') }}" class="btn btn-success mb-3">Add Attendance</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Date</th>
                <th>Present</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->employee->name }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->present ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
