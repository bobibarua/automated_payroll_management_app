@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Payroll</h2>
    <form action="{{ route('payrolls.store') }}" method="POST">
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
            <label for="overtime_hours">Overtime Hours:</label>
            <input type="number" class="form-control" id="overtime_hours" name="overtime_hours" value="0">
        </div>
        <button type="submit" class="btn btn-success">Add Payroll</button>
    </form>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
</div>
@endsection
