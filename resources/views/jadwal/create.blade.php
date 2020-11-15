@extends('layouts.app')

@section('judul')
    Tambah Data Jadwal
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
    <style>
        /* Chrome, Safari, Edge, Opera */
        .nospinner::-webkit-outer-spin-button,
        .nospinner::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        
        /* Firefox */
        .nospinner[type=number] {
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
                        <form class="form form-horizontal" action="{{route('jadwal.store')}}" method="post" id="createRecord">
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
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKonsumen">Konsumen</label>
                                        <div class="col-md-9 mx-auto">
                                        <select class="select2 form-control" id="inputKonsumen">
                                            <option value="">Pilih Konsumen!</option>
                                            @foreach($konsumens as $konsumen)
                                                <option value="{{$konsumen->nik}}">{{$konsumen->nik}} - {{$konsumen->nama}}</option>
                                            @endforeach
                                            </optgroup>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-12" align="center">
                                    <h4 class="card-title"><b>DATA PEMBIAYAAN</b></h4>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPinjaman">Pinjaman</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputPinjaman" class="form-control border-primary nospinner" placeholder="Masukan Pinjaman" value="{{ old('pinjaman_awal') }}" name="pinjaman_awal" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAngsuran">Angsuran</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputAngsuran" class="form-control border-primary nospinner" placeholder="Masukan Angsuran" value="{{ old('angsuran') }}" name="angsuran">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadKTP" height="200px" alt="Preview KTP">
                                </div>
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadKK" height="200px" alt="Preview KK">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKTP">KTP</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputKTP" name="gambarktp">
                                            <label class="custom-file-label" for="inputKTP" aria-describedby="inputKTP">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKK">KK</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputKK" name="gambarkk">
                                            <label class="custom-file-label" for="inputKK" aria-describedby="inputKK">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('jadwal.index')}}'">Batal</button>
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
    @include('komponen.modalCreate', ['modul' => 'jadwal'])
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.min.js')}}"></script>
@endpush