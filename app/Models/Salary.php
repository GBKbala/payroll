<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table = 'salary_details';
    protected $fillable = ['eID', 'name', 'current_salary','paid_days','lop','paid_salary'];
}
