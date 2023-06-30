<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = ['id', 'eID', 'officeEmail', 'department', 'designation', 'dateOfJoining', 'ctc','perfomance_bonus'];

    public function employee(){
        return $this->belongsTo(Employee::class,'eID');
    }

    public function bankdetail(){
        return $this->belongsTo(Bankdetail::class,'eID');
    }

   
}
