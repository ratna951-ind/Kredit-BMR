@extends('layouts.app')

@section('judul')
    Tambah Data User
@endsection

@push('css')
    
@endpush

@section('isi')
    <section id="form-action-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form class="form form-horizontal" action="{{route('user.store')}}" method="post" id="createRecord">
                            {{csrf_field()}}
                            @if(count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    @foreach($errors->all() as $message)
                                        <font color="white">{{$message}}</font><br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNama">Nama</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNama" class="form-control border-primary" placeholder="Masukan Nama" value="{{ old('nama') }}" name="nama" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputUsername">Username</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputUsername" class="form-control border-primary" placeholder="Masukan Username" value="{{ old('username') }}" name="username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKios">Kios</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control" id="inputKios" name="kode_kios">
                                                <option>Pilih Kios</option>
                                                @foreach($kioss as $kios)
                                                    <option value="{{$kios->kode}}" @if($kios->kode == old('kode_kios')) selected @endif>{{$kios->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPeran">Peran</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control" id="inputPeran" name="peran_id">
                                                <option>Pilih Peran</option>
                                                @foreach($perans as $peran)
                                                    <option value="{{$peran->id}}" @if($peran->id == old('peran_id')) selected @endif>{{$peran->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('user.index')}}'">Batal</button>
                                <button type="button" class="modal-create btn btn-icon btn-success">Simpan</button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    @include('komponen.modalCreate', ['modul' => 'user'])
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
@endpush