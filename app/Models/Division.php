<?php

namespace App\Models;
use App\Models\Branch;
use App\Models\Standard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table='divisions';

    protected $fillable=[
    	'branch_id',
    	'standard_id',
    	'division',
    	'max_limit',
    	'status'
    ];

    public function Branch()
    {
    	return $this->belongsTo(Branch::class,'branch_id','id');
    }
    public function Standard()
    {
    	return $this->belongsTo(Standard::class,'standard_id','id');
    }
}
