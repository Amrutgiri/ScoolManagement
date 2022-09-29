<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $table='schools';

    protected $fillable=[
        'name',
        'trust_name',
        'address',
        'contact1',
        'contact2',
        'email',
        'facebook',
        'instagram',
        'whatsapp',
        'twitter',
        'school_logo',
        'status'
    ];
}
