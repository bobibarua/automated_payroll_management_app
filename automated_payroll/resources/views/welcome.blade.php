@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Welcome to the Payroll Management System</h1>
    <p>Your one-stop solution for managing employees, attendance, and payroll.</p>
    
    <div class="mt-4">
        <a href="{{ route('register') }}" class="btn btn-primary">Create an Account</a>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </div>
</div>
@endsection
