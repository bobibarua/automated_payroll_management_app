@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Payroll for {{ $payroll->employee->name }}</h2>

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

    <form action="{{ route('payrolls.update', $payroll->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $payroll->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="basic_pay">Basic Pay</label>
            <input type="number" name="basic_pay" class="form-control" value="{{ $payroll->basic_pay }}" required>
        </div>

        <div class="form-group">
            <label for="overtime_hours">Overtime Hours</label>
            <input type="number" name="overtime_hours" class="form-control" value="{{ $payroll->overtime_hours }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Payroll</button>
    </form>
</div>
@endsection
