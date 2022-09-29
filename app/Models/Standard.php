<?php

namespace App\Models;
use App\Models\Branch;
use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    protected $table='standards';

    protected $fillable=[
    	'branch_id',
    	'std_name',
    	'sem',
    	'pass_percentage',
    	'grade',
    	'age_limit',
    	'notes',
    	'max_limit',
    	'status',
    	'trash'
    ];

    public function Branch()
    {
    	return $this->belongsTo(Branch::class,'branch_id','id');
    }
     public function Division()
    {
        return $this->hasMany(Division::class,'id','branch_id');
    }
}
