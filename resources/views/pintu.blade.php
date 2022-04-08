@extends('layouts.master',[
    'id_alat'=>'Pintu masuk: '.$out['masuk'].' Pintu keluar: '.$out['keluar'].' Update: '.date('Y-m-d H:i:s',strtotime('now'))
    ])
@section('title')
  Dashboard
@endsection

@push('css')
@endpush

@section('content')
        <div class="container-fluid user-card">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card">
                        <div class="card-header" style="padding-bottom: 70px">
                            <img class="img-fluid" src="{{asset('assets/images/in.png')}}" alt="" />
                        </div>
                        
                        <div class="text-center profile-details">
                            <a href="#"> <h4>Pintu Masuk</h4></a>
                        </div>
                        <div class="card-footer row">
                            <div class="col-12 col-sm-12">
                                <h6>Total Masuk</h6>
                                <h3 class="counter">{{$out['jml_in']}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6 p-t-50">
                    <div class="card ">
                        <div class="cal-date-widget card-body">
                            <div class="cal-info text-center">
                                <div>
                                    <h2>{{$ruang->jml}}</h2>
                                    <div class="d-inline-block"><span class="b-r-dark pe-3">{{$ruang->jml}}</span><span class="ps-3">{{$ruang->limit}}</span></div>
                                    <p class="f-16">Jumlah pengunjung dalam ruangan per kapasitas ruangan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card">
                        <div class="card-header" style="padding-bottom: 70px">
                            <img class="img-fluid" src="{{asset('assets/images/out.png')}}" alt="" />
                        </div>
                        <div class="text-center profile-details">
                            <a href="#"> <h4>Pintu Keluar</h4></a>
                        </div>
                        <div class="card-footer row">
                            <div class="col-12 col-sm-12">
                                <h6>Total Keluar</h6>
                                <h3 class="counter">{{$out['jml_out']}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @push('scripts')

    @endpush

@endsection