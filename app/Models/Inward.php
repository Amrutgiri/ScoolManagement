<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inward extends Model
{
    use HasFactory;

    protected $table='inwards';

    protected $fillable=[
        'Date',
        'RecieveFrom',
        'Title',
        'Document',
        'description',
        
    ];
}
