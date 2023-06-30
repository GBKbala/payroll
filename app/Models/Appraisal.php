<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{
    use HasFactory;

    protected $table = 'appraisal';
    protected $fillable = ['eID', 'name', 'old_salary', 'appraisal_salary', 'take_effect'];
}
