<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table='feedback';

    protected $fillable=[
        'stud_name',
        'stud_edu_year',
        'stud_image',
        'stud_feedback',
        'status'
    ];
}
