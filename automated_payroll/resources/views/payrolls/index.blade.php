@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payroll Management</h2>
    <a href="{{ route('payrolls.create') }}" class="btn btn-success mb-3">Add Payroll</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Basic Pay</th>
                <th>Overtime Pay</th>
                <th>Tax Deductions</th>
                <th>Net Pay</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
                <tr>
                    <td>{{ $payroll->employee->name }}</td>
                    <td>${{ number_format($payroll->basic_pay, 2) }}</td>
                    <td>${{ number_format($payroll->overtime_pay, 2) }}</td>
                    <td>${{ number_format($payroll->tax_deductions, 2) }}</td>
                    <td>${{ number_format($payroll->net_pay, 2) }}</td>
                    <td>
                        <a href="{{ route('payrolls.edit', $payroll->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST" style="display:inline-block;">
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
