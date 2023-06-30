<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreelancerPayment extends Model
{
    use HasFactory;
    protected $table ="freelancer_payments";
    protected $fillable =[
        'name', 'eID','email','phone','bankName','branch','accountNumber','ifscCode','projectName','amountPaid','paidDate'
    ];
}
