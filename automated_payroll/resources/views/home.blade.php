@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>Home</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Employees</h5>
                    <p class="card-text">Manage employee records here.</p>
                    <a href="{{ route('employees.index') }}" class="btn btn-primary">View Employees</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Attendance</h5>
                    <p class="card-text">Track and manage employee attendance.</p>
                    <a href="{{ route('attendances.index') }}" class="btn btn-primary">View Attendance</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Payroll</h5>
                    <p class="card-text">Generate and manage payroll.</p>
                    <a href="{{ route('payrolls.index') }}" class="btn btn-primary">View Payroll</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
