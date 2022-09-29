<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branchtype extends Model
{
    use HasFactory;

    protected $table ='branchtypes';

    protected $fillable=[
    	'branchtype',
    	'status'
    ];
}
