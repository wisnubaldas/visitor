<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PintuMasuk extends Model
{
    use HasFactory;
    protected $table ='pintu_masuks';
    protected $fillable = ['id_alat','pintu_masuk'];
    //    protected $guarded = [];
    
       protected $appends = ['waktu'];
    
    
       public function getWaktuAttribute()
       {
           return $this->updated_at->format('d-m-Y H:i');
       }
}
