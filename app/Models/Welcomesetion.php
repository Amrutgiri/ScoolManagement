<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Welcomesetion extends Model
{
    use HasFactory;

    protected $table= 'welcomesetions';

    protected $fillable =[
        'image',
        'heading',
        'description',
        'status'
    ];
}
