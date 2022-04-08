@extends('layouts.master')
@section('title')
  Dashboard
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
@endpush

@section('content')
<div class="card-body row">
    @foreach ($data as $item)
    <div class="col-sm-6 col-xl-3 col-lg-6">
        <div class="card o-hidden border-0">
            <div class="{{$item['bg']}} b-r-4 card-body">
                <div class="media static-top-widget">
                    <div class="align-self-center text-center"><i data-feather="user-plus"></i></div>
                    <div class="media-body">
                        <span class="m-0">{{$item['masuk']}} / {{$item['keluar']}}</span>
                        <h4 class="mb-0">In: <span class="counter">{{$item['jml_in']}}</span>  Out: <span class="counter">{{$item['jml_out']}}</span></h4>
                        <a href="{{route('detail_pintu',$item['uri'])}}" class="mb-0 btn-sm btn-block btn {{$item['btn']}}">Detail</a>
                        <i class="icon-bg" data-feather="user-plus"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
    @push('scripts')
        <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
        <script>
        </script>
    @endpush
@endsection