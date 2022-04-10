<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PintuMasuk;
use App\Models\PintuKeluar;
use App\Models\KapasitasRuang;
use App\Models\Alaram;
use App\Events\MasukKeluar;

class AlatController extends Controller
{
    public function pintu_masuk(Request $request)
    {
        // sebelom masuk cek orang dalem ruangan
        $this->cek_ruangan();
        
        $validated = $request->validate([
            'id_alat' => 'required',
            'pintu_masuk' => 'required',
        ]);
        if($validated)
        {
            event(new MasukKeluar($request->all()));

            $pm = PintuMasuk::firstOrNew(array('id_alat' => $request->id_alat));
            $pm->pintu_masuk = $request->pintu_masuk;
            $pm->save();
            return response()->json([
                'message'=>'sukses update pintumasuk '.$request->id_alat,
                'pintu_masuk'=>$pm->pintu_masuk,
                'id_alat'=>$pm->id_alat
            ]);
        }
        
    }
    public function pintu_keluar(Request $request)
    {
        $validated = $request->validate([
            'id_alat' => 'required',
            'pintu_keluar' => 'required',
        ]);
        if($validated)
        {
            $pm = PintuKeluar::firstOrNew(array('id_alat' => $request->id_alat));
            $pm->pintu_keluar = $request->pintu_keluar;
            $pm->save();
            return response()->json([
                'message'=>'sukses update pintu keluar '.$request->id_alat,
                'pintu_masuk'=>$pm->pintu_keluar,
                'id_alat'=>$pm->id_alat
            ]);
        }
    }
    // cek kapasitas ruangan
    public function cek_ruangan()
    {
        $kp = KapasitasRuang::find(1);
        if($kp->jml == $kp->limit)
        {
            Alaram::update(['status'=>1]);
            return response()->json([
                        'message'=>'Kapasitas Ruang penuh tidak dapat masuk',
                    ],500);
        }
    }
}
