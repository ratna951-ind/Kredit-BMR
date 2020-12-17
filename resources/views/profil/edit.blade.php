@extends('layouts.app')

@section('judul')
    Ubah Data Profil
@endsection

@push('css')

@endpush

@section('isi')
    <section id="form-action-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form class="form form-horizontal" action="{{route('profile.update', Auth::user()->id)}}" method="post" id="updateRecord">
                            {{csrf_field()}}
                            @method('PUT')
                            @if(count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    @foreach($errors->all() as $message)
                                        <font color="white">{{$message}}</font><br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNama">Nama</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNama" class="form-control border-primary" placeholder="Masukan Nama" value="{{Auth::user()->nama}}" name="nama" autofocus>
                                            <input type="hidden" name="profil" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputUsername">Username</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputUsername" class="form-control border-primary" placeholder="Masukan Username" value="{{Auth::user()->username}}" name="username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPassword">Password</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="password" id="inputPassword" class="form-control border-primary" placeholder="Masukan Password" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKonfirmasiPassword">Konfirmasi Password</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="password" id="inputKonfirmasiPassword" class="form-control border-primary" placeholder="Masukan Konfirmasi Password" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('home')}}'">Batal</button>
                                <button type="button" class="modal-update btn btn-icon btn-success">Simpan</button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    @include('komponen.modalUpdate', ['modul' => 'profil'])
@endpush