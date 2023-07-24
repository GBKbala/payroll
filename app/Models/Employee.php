<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name', 'eID','dob', 'email', 'phone', 'bloodgroup', 'address', 'employeeLogin','dateOfRelieving','employeeType','company'];

    public function department(){
        return $this->hasOne(Department::class,'employee_id','id');
    }

    public function bankdetail(){
        return $this->hasOne(Bankdetail::class,'employee_id','id');
    }

    public function salaryslip(){
        return $this->hasOne(Salaryslip::class,'eID','eID');
    }
}
