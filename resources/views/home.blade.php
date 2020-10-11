@extends('layouts.app')

@section('judul')
    Home
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.min.css')}}">
@endpush

@section('isi')
    <div class="row">
        <div class="col-xl-4 col-lg-8 col-16">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$kios}}</h3>
                                <h6>Kios</h6>
                            </div>
                            <div>
                                <i class="icon-home success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-8 col-16">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{$user}}</h3>
                                <h6>User</h6>
                            </div>
                            <div>
                                <i class="icon-users info font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-8 col-16">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{$peran}}</h3>
                                <h6>Peran</h6>
                            </div>
                            <div>
                                <i class="icon-user info font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
