<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallerybulk extends Model
{
    use HasFactory;

    protected $table='gallerybulks';
    protected $fillable=[
        'album_id',
        'image',
        'feature_image',
        'status'
    ];
    public function album()
    {
      return $this->belongsTo('Gallery', 'product_id');
    }
}
