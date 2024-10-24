@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Employee</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="designation">Designation:</label>
            <input type="text" class="form-control" id="designation" name="designation">
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" class="form-control" id="salary" name="salary">
        </div>
        <div class="form-group">
            <label for="salary_type">Salary Type:</label>
            <select class="form-control" id="salary_type" name="salary_type">
                <option value="salaried">Salaried</option>
                <option value="hourly">Hourly</option>
            </select>
        </div>
        <div class="form-group">
            <label for="hourly_rate">Hourly Rate:</label>
            <input type="number" class="form-control" id="hourly_rate" name="hourly_rate">
        </div>
        <div class="form-group">
            <label for="overtime_rate">Overtime Rate:</label>
            <input type="number" class="form-control" id="overtime_rate" name="overtime_rate">
        </div>
        <button type="submit" class="btn btn-success">Add Employee</button>
    </form>
</div>
@endsection
