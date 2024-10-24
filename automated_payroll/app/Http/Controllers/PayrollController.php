<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PayrollController extends Controller
{
    
    public function index()
    {
       
        $payrolls = Payroll::with('employee')->get();
        return view('payrolls.index', compact('payrolls'));
    }

    
    public function create()
    {
       
        $employees = Employee::all();
        return view('payrolls.create', compact('employees'));
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'overtime_hours' => 'nullable|numeric|min:0',
        ]);

        
        $employee = Employee::findOrFail($request->employee_id);

    
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

       
        $existingPayroll = Payroll::where('employee_id', $employee->id)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->first();

        if ($existingPayroll) {
           
            return redirect()->back()->with('error', 'Payroll has already been generated for this employee for this month.');
        }

      
        $payroll = new Payroll();

     
        $basicPay = $payroll->calculateBasicPay($employee);
        $overtimePay = $payroll->calculateOvertimePay($employee, $request->overtime_hours);
        $deductions = $payroll->calculateDeductions($basicPay);
        $netPay = $payroll->calculateNetPay($basicPay, $overtimePay, $deductions);

      
        Payroll::create([
            'employee_id' => $employee->id,
            'basic_pay' => $basicPay,
            'overtime_pay' => $overtimePay,
            'tax_deductions' => $deductions,
            'net_pay' => $netPay,
        ]);

      
        return redirect()->route('payrolls.index')->with('success', 'Payroll created successfully!');
    }

  
    public function edit($id)
    {
      
        $payroll = Payroll::findOrFail($id);

   
        $employees = Employee::all();

        
        return view('payrolls.edit', compact('payroll', 'employees'));
    }

    
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'basic_pay' => 'required|numeric',
            'overtime_hours' => 'nullable|numeric|min:0',
        ]);

      
        $payroll = Payroll::findOrFail($id);

     
        $employee = Employee::findOrFail($request->employee_id);

       
        $basicPay = $request->basic_pay;  
        $overtimePay = $payroll->calculateOvertimePay($employee, $request->overtime_hours);  
        $deductions = $payroll->calculateDeductions($basicPay);
        $netPay = $payroll->calculateNetPay($basicPay, $overtimePay, $deductions);

        
        $payroll->update([
            'employee_id' => $employee->id,
            'basic_pay' => $basicPay,  
            'overtime_pay' => $overtimePay,
            'tax_deductions' => $deductions,
            'net_pay' => $netPay,
        ]);

       
        return redirect()->route('payrolls.index')->with('success', 'Payroll updated successfully!');
    }

    
    public function destroy($id)
    {
        
        $payroll = Payroll::findOrFail($id);

      
        $payroll->delete();

        
        return redirect()->route('payrolls.index')->with('success', 'Payroll deleted successfully.');
    }
}
