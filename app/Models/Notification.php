<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table='notifications';

    protected $fillable=[
        'heading',
        'description',
        'docs',
        'start_date',
        'end_date',
        'status',
        'trash'
    ];
}
