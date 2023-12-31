<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankdetail extends Model
{
    use HasFactory;
    protected $table = 'bankdetails';
    protected $fillable = ['id', 'eID','employee_id', 'bankName', 'branch', 'ifscCode', 'accountNumber'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'employee_id');
    }
}
