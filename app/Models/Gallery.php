<?php

namespace App\Models;

use App\Models\Gallerybulk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    protected $table='galleries';

    protected $fillable=[
        'title',
        'description',
        'event_data',
        'feature_image',
        'status',
        
    ];
    public function gallerybulks()
    {
    return $this->hasMany(Gallerybulk::class, 'album_id','id');
    }
}
