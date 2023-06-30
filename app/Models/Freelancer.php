<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    use HasFactory;
    protected $table = 'freelancers';
    
    protected $fillable = ['eID', 'name', 'dob', 'email', 'phone', 'bloodgroup', 'address', 'employeeLogin','bankName','branch','ifscCode','accountNumber'];

}
