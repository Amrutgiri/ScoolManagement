<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achivement extends Model
{
    use HasFactory;

    protected $table='achivements';

    protected $fillable=[
        'heading',
        'description',
        'status'
    ];
}