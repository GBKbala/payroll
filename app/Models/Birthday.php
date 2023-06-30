<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{
    use HasFactory;
    protected $table = 'birthday_wishes';
    protected $fillable = ['eID', 'office_mail', 'personal_mail'];
}
