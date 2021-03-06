@extends('layouts.app')

@section('judul')
    Tambah Data Kios
@endsection

@push('css')
    <style>
        /* Chrome, Safari, Edge, Opera */
        #inputKode::-webkit-outer-spin-button,
        #inputKode::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        
        /* Firefox */
        #inputKode[type=number] {
        -moz-appearance: textfield;
        }
    </style>
@endpush

@section('isi')
    <section id="form-action-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form class="form form-horizontal" action="{{route('kios.store')}}" method="post" id="createRecord">
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
                                        <label class="col-md-3 label-control" for="inputKode">Kode</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputKode" class="form-control decimal-inputmask" placeholder="Masukan Kode!" value="{{old('kode')}}" name="kode" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNama">Nama</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNama" class="form-control" placeholder="Masukan Nama!" value="{{old('nama')}}" name="nama" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputBank">Bank</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control" id="inputBank" name="bank">
                                                <option value="">Pilih Bank</option>
                                                <option value="BNI" @if ('BNI' == old('bank')) {{'selected'}}@endif>BNI</option>
                                                <option value="Mandiri" @if ('Mandiri' == old('bank')) {{'selected'}}@endif>Mandiri</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamat">Alamat</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlamat" class="form-control" placeholder="Masukan Alamat!" value="{{old('alamat')}}" name="alamat" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('kios.index')}}'">Batal</button>
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
    @include('komponen.modalCreate', ['modul' => 'kios'])
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
@endpush