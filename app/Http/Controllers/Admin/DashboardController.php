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
        $idP_out =PintuMasuk::all()->transform(function ($item, $key) {
            $pk = PintuKeluar::find($key);
            if(!$pk){
                return [
                    'i'=>$item->id_alat,
                    'o'=>'PK'.substr($item->id_alat,2)
                    ];
            }else{
                return [
                    'i'=>$item->id_alat, 
                    'o'=>$pk->id_alat];
            }
        })->toArray();

       $data = [];
        foreach ($idP_out as $z) {
            $keluar = $z['o'];
            $jml_out = Ruangan::where('id_alat',$z['o'])->count();
            $masuk = $z['i'];
            $jml_in = Ruangan::where('id_alat',$z['i'])->count();
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
