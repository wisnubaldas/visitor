<?php

namespace App\Observers;

use App\Models\PintuMasuk;
use App\Models\Ruangan;
use App\Models\KapasitasRuang;
class PintuMasukObserver
{
    /**
     * Handle the PintuMasuk "created" event.
     *
     * @param  \App\Models\PintuMasuk  $pintuMasuk
     * @return void
     */
    public function created(PintuMasuk $pintuMasuk)
    {
        if($pintuMasuk->pintu_masuk == 1)
        {
            $this->insert_ruang($pintuMasuk->id_alat);
        }
    }

    /**
     * Handle the PintuMasuk "updated" event.
     *
     * @param  \App\Models\PintuMasuk  $pintuMasuk
     * @return void
     */
    public function updated(PintuMasuk $pintuMasuk)
    {
        if($pintuMasuk->pintu_masuk == 1)
        {
            $this->insert_ruang($pintuMasuk->id_alat);
        }
        
    }

    /**
     * Handle the PintuMasuk "deleted" event.
     *
     * @param  \App\Models\PintuMasuk  $pintuMasuk
     * @return void
     */
    public function deleted(PintuMasuk $pintuMasuk)
    {
        //
    }

    /**
     * Handle the PintuMasuk "restored" event.
     *
     * @param  \App\Models\PintuMasuk  $pintuMasuk
     * @return void
     */
    public function restored(PintuMasuk $pintuMasuk)
    {
        //
    }

    /**
     * Handle the PintuMasuk "force deleted" event.
     *
     * @param  \App\Models\PintuMasuk  $pintuMasuk
     * @return void
     */
    public function forceDeleted(PintuMasuk $pintuMasuk)
    {
        //
    }
    private function insert_ruang($id_alat)
    {
        $r = KapasitasRuang::find(1);
        $r->jml = ($r->jml + 1);
        $r->save();
        Ruangan::create([
            'id_alat'=>$id_alat,
            'pintu_in'=>1,
            'total_orang'=>Ruangan::whereNotNull('pintu_in')->count()+1
        ]);
    }
}
