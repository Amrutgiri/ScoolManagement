<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolconfig extends Model
{
    use HasFactory;

    protected $table='schoolconfigs';

    protected $fillable=[
        'TermDate',
        'AgeCompareDate',
        'SenderName',
        'Username',
        'Password',
        'Email',
        'ShowBirthday',
        'ShowEvent',
        'ShowExam',
        'ShowAttend',
        'EventNotify',
        'ReportHeader'
    ];
}
