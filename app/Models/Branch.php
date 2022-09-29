<?php

namespace App\Models;
use App\Models\Standard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table='branches';

    protected $fillable=[
    	'branch_name',
    	'board',
    	'medium',
    	'branch_type',
    	'indexno',
    	'principal_sign',
    	'status',
    	'trash'
    ];

    public function Standard()
    {
        return $this->hasMany(Standard::class,'id','branch_id');
    }
   
}
