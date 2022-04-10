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
                                <h3 class="counter" id="jml_in">{{$out['jml_in']}}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6 p-t-50">
                    <div class="card ">
                        <div class="cal-date-widget card-body">
                            <div class="cal-info text-center">
                                <div>
                                    <h2 id="jml_ruang">{{$ruang->jml}}</h2>
                                    <p class="f-16">Jumlah pengunjung dalam ruangan per {{$ruang->limit}} kapasitas ruangan</p>
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
                                <h3 class="counter" id="jml_out">{{$out['jml_out']}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @push('scripts')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        let a = {
            jml_in:document.getElementById('jml_in').innerText,
            jml_ruang:document.getElementById('jml_ruang').innerText,
            jml_out:document.getElementById('jml_out').innerText,
            parseUrl:function(){
                const queryString = window.location.pathname;
                let query = queryString.split("/")[2].split("&")
                let o = {}
                query.map(function(a){
                    x = a.split("=");
                    return o[x[0]] = x[1]
                })
                return o
            },
            pintuMasuk:function(a){
                const u = this.parseUrl()
                if(u.masuk == a.message.id_alat && a.message.pintu_masuk == 1)
                {
                    this.jml_in = parseInt(this.jml_in)+1
                    this.jml_ruang = parseInt(this.jml_ruang)+1
                    document.getElementById('jml_in').innerText = this.jml_in
                    document.getElementById('jml_ruang').innerText = this.jml_ruang
                }
            },
            pintuKeluar:function(a){
                const u = this.parseUrl()
                if(u.keluar == a.message.id_alat && a.message.pintu_keluar == 1)
                {
                    this.jml_out = parseInt(this.jml_out)+1
                    this.jml_ruang = parseInt(this.jml_ruang)-1
                    document.getElementById('jml_out').innerText = this.jml_out
                    document.getElementById('jml_ruang').innerText = this.jml_ruang
                }
            }
        }
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;
        var pusher = new Pusher('70bd4866deff0bd7280d', {
                cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                // alert(JSON.stringify(data));
                // console.log(data)
                a.pintuMasuk(data)
                a.pintuKeluar(data)
            });
        
    </script>
    @endpush

@endsection