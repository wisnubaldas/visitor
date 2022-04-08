<?php

namespace App\Observers;

use App\Models\PintuKeluar;
use App\Models\Ruangan;
use App\Models\KapasitasRuang;
class PintuKeluarObserver
{
    private function insert_ruang($id_alat)
    {
        $r = KapasitasRuang::find(1);
        $r->jml = ($r->jml - 1);
        $r->save();
        Ruangan::create([
            'id_alat'=>$id_alat,
            'pintu_out'=>1,
            'total_orang'=>Ruangan::whereNotNull('pintu_in')->count()-1
        ]);
    }
    /**
     * Handle the PintuKeluar "created" event.
     *
     * @param  \App\Models\PintuKeluar  $pintuKeluar
     * @return void
     */
    public function created(PintuKeluar $pintuKeluar)
    {
        if($pintuKeluar->pintu_keluar == 1)
        {
            $this->insert_ruang($pintuKeluar->id_alat);
        }
    }

    /**
     * Handle the PintuKeluar "updated" event.
     *
     * @param  \App\Models\PintuKeluar  $pintuKeluar
     * @return void
     */
    public function updated(PintuKeluar $pintuKeluar)
    {
        if($pintuKeluar->pintu_keluar == 1)
        {
            $this->insert_ruang($pintuKeluar->id_alat);
        }
    }

    /**
     * Handle the PintuKeluar "deleted" event.
     *
     * @param  \App\Models\PintuKeluar  $pintuKeluar
     * @return void
     */
    public function deleted(PintuKeluar $pintuKeluar)
    {
        //
    }

    /**
     * Handle the PintuKeluar "restored" event.
     *
     * @param  \App\Models\PintuKeluar  $pintuKeluar
     * @return void
     */
    public function restored(PintuKeluar $pintuKeluar)
    {
        //
    }

    /**
     * Handle the PintuKeluar "force deleted" event.
     *
     * @param  \App\Models\PintuKeluar  $pintuKeluar
     * @return void
     */
    public function forceDeleted(PintuKeluar $pintuKeluar)
    {
        //
    }
}
