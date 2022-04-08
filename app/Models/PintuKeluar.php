<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PintuKeluar extends Model
{
    use HasFactory;
    protected $table ='pintu_keluars';
   protected $guarded = [];

   protected $appends = ['waktu'];
   protected $fillable = ['id_alat','pintu_keluar'];


   public function getWaktuAttribute()
   {
       return $this->updated_at->format('d-m-Y H:i');
   }
}
