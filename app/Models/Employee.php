<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name', 'dob', 'email', 'phone', 'bloodgroup', 'address', 'employeeLogin','employeeType','company'];

    public function department(){
        return $this->hasOne(Department::class,'eID','eID');
    }

    public function bankdetail(){
        return $this->hasOne(Bankdetail::class,'eID','eID');
    }

    public function salaryslip(){
        return $this->hasOne(Salaryslip::class,'eID','eID');
    }
}
