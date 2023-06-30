<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Salaryslip extends Model
{
    use HasFactory;

    protected $table = 'paid_salary';

    protected $fillable = [
        'name',
        'eID',
        'employeeType',
        'department',
        'designation',
        'doj',
        'bankName',
        'accountNumber',
        'working_days',
        'paid_days',
        'lop',
        'leave_days',
        'basic_wage',
        'hra',
        'conveyance_allowances',
        'medical_allowances',
        'other_allowances',
        'professional_tax',
        'tds',
        'total_earnings',
        'total_deductions',
        'performance_bonus',
        'net_salary',
        'freelancerAmount',
        'forTheMonth',
        'projectName'
    ];
    
    public function department(){
        return $this->hasOne(Department::class,'salaryslip_id');
    }
}
