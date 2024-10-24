<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'basic_pay', 'overtime_pay', 'tax_deductions', 'net_pay'];

    
    public function calculateBasicPay($employee)
    {
        if ($employee->salary_type == 'hourly') {
           
            return $employee->hourly_rate * 160; 
        } else {
            
            return $employee->salary;
        }
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

   
    public function calculateOvertimePay($employee, $overtimeHours)
    {
        if ($employee->salary_type == 'hourly') {
            return $overtimeHours * $employee->overtime_rate;
        } else {
            
            return 0;
        }
    }

   
    public function calculateDeductions($basicPay)
    {
        $taxRate = 0.1; 
        return $basicPay * $taxRate;
    }

 
    public function calculateNetPay($basicPay, $overtimePay, $deductions)
    {
        return $basicPay + $overtimePay - $deductions;
    }
}
