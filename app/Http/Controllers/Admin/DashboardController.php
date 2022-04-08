<?php

namespace App\Http\Controllers\Admin;
use App\Models\PintuMasuk;
use App\Models\PintuKeluar;
use App\Models\Ruangan;
use App\Models\KapasitasRuang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
class DashboardController extends Controller
{   
    public function detail_pintu($pintu)
    {
        $kp = KapasitasRuang::first();
        parse_str($pintu,$out);
        return view('pintu',['out'=>$out,'ruang'=>$kp]);
    }
    private function random_class()
    {
        $element = [
            ['bg-secondary','btn-primary'],
            ['bg-success','btn-warning'],
            ['bg-info','btn-light'],
            ['bg-danger','btn-dark'],
            ['bg-warning','btn-dark'],
            ['bg-dark','btn-light'],
            ['bg-primary','btn-secondary']
        ];
        return Arr::random($element);
    }
    private function collect_data_pintu()
    {
        $idP_in = PintuMasuk::all()->pluck('id_alat');
        $idP_out = PintuKeluar::all()->pluck('id_alat')->combine($idP_in)->toArray();
       $data = [];
        foreach ($idP_out as $o =>$i) {
           if(isset($o))
           {
               // pintu keluar
               $keluar = $o;
               $jml_out = Ruangan::where('id_alat',$o)->count();
           }
           if(isset($i))
           {
               // pintu masuk
               $masuk = $i;
               $jml_in = Ruangan::where('id_alat',$i)->count();
           }
           $class = $this->random_class();
           $bg = $class[0]; $btn = $class[1];
           $x = compact('masuk','jml_in','keluar','jml_out','bg','btn');
           $uri = http_build_query($x);
           array_push($data,array_merge($x,compact('uri')));
       }
       return $data;
    }
    public function index()
    {
        $data = $this->collect_data_pintu();
        return view('dashboard',compact('data'));
    }

}
