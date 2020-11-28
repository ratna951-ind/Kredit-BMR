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
                        <form class="form form-horizontal" action="{{route('jadwal.store')}}" method="post" id="createRecord" enctype="multipart/form-data">
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
                                        <select class="select2 form-control" id="inputKonsumen" name="nik">
                                            <option value="">Pilih Konsumen!</option>
                                            @foreach($konsumens as $konsumen)
                                                <option value="{{$konsumen->nik}}" @if ($konsumen->nik == old('nik')) {{'selected'}}@endif>{{$konsumen->nik}} - {{$konsumen->nama}}</option>
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
                                            <select class="select2 form-control" id="inputPinjaman" name="pinjaman_awal">
                                                <option value="">Pilih Jumlah Pinjaman</option>
                                                @foreach($angsurans as $angsuran)
                                                    <option value="{{$angsuran->pinjaman}}" data-bln_6="{{$angsuran->bln_6}}" data-bln_12="{{$angsuran->bln_12}}" data-bln_18="{{$angsuran->bln_18}}" data-bln_24="{{$angsuran->bln_24}}" @if ($angsuran->pinjaman == old('pinjaman_awal')) {{'selected'}}@endif>Rp {{number_format($angsuran->pinjaman,0,",",".")}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAngsuran">Angsuran</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAngsuran" class="form-control border-primary nospinner" value="Rp 0" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJangkaWaktu">Jangka Waktu</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control custom-select" id="inputJangkaWaktu" name="tenor">
                                                <option value="">Pilih Jangka Waktu</option>
                                                @for($i=1; $i<=4; $i++)
                                                    <option value="{{$i*6}}" @if ($i*6 == old('tenor')) {{'selected'}}@endif>{{$i*6}} Bulan</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-12" align="center">
                                    <h4 class="card-title"><b>DATA DOKUMEN</b></h4>
                                </div>
                            </div>
                            <div class="row mb-2 mt-1">
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadSTNK" height="200px" alt="Preview STNK">
                                </div>
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadKwitansiJualBeli" height="200px" alt="Preview Kwitansi Jual Beli">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputSTNK">STNK</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputSTNK" name="stnk">
                                            <label class="custom-file-label" for="inputSTNK" aria-describedby="inputSTNK">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKwitansiJualBeli">Kwitansi Jual Beli</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputKwitansiJualBeli" name="kwt_jb">
                                            <label class="custom-file-label" for="inputKwitansiJualBeli" aria-describedby="inputKwitansiJualBeli">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-1">
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadBPKBDepan" height="200px" alt="Preview BPKB Depan">
                                </div>
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadBPKBBelakang" height="200px" alt="Preview BPKB Belakang">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputBPKBDepan">BPKB Depan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputBPKBDepan" name="bpkb_depan">
                                            <label class="custom-file-label" for="inputBPKBDepan" aria-describedby="inputBPKBDepan">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputBPKBBelakang">BPKB Belakang</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputBPKBBelakang" name="bpkb_belakang">
                                            <label class="custom-file-label" for="inputBPKBBelakang" aria-describedby="inputBPKBBelakang">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mb-2 mt-1">
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadNoMesin" height="200px" alt="Preview No Mesin">
                                </div>
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadNoRangka" height="200px" alt="Preview No Rangka">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoMesin">No Mesin</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputNoMesin" name="nosin">
                                            <label class="custom-file-label" for="inputNoMesin" aria-describedby="inputNoMesin">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoRangka">No Rangka</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputNoRangka" name="noka">
                                            <label class="custom-file-label" for="inputNoRangka" aria-describedby="inputNoRangka">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-1">
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadMotorDepan" height="200px" alt="Preview Motor Depan">
                                </div>
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadMotorBelakang" height="200px" alt="Preview Motor Belakang">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputMotorDepan">Motor Depan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputMotorDepan" name="mtr_dpn">
                                            <label class="custom-file-label" for="inputMotorDepan" aria-describedby="inputMotorDepan">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputMotorBelakang">Motor Belakang</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputMotorBelakang" name="mtr_blkng">
                                            <label class="custom-file-label" for="inputMotorBelakang" aria-describedby="inputMotorBelakang">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-1">
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadMotorKanan" height="200px" alt="Preview Motor Kanan">
                                </div>
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadMotorKiri" height="200px" alt="Preview Motor Kiri">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputMotorKanan">Motor Kanan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputMotorKanan" name="mtr_kanan">
                                            <label class="custom-file-label" for="inputMotorKanan" aria-describedby="inputMotorKanan">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputMotorKiri">Motor Kiri</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputMotorKiri" name="mtr_kiri">
                                            <label class="custom-file-label" for="inputMotorKiri" aria-describedby="inputMotorKiri">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-1">
                                <div class="col-md-3"></div>
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadSelfie" height="200px" alt="Preview Selfie">
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputSelfie">Selfie</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputSelfie" name="selfie">
                                            <label class="custom-file-label" for="inputSelfie" aria-describedby="inputSelfie">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
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
    <script src="{{asset('app-assets/custom/jadwal.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/custom-file-input.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/select/form-select2.min.js')}}"></script>
    <script>
        (function($) {
            'use strict';

            $('select').on('change', function() {
                var pinjaman = $("#inputPinjaman").val();
                var tenor = $("#inputJangkaWaktu").val() ? $("#inputJangkaWaktu").val() : 6;

                var angsuran = $("#inputPinjaman").children('option:selected').data('bln_'+tenor)

                $('#inputAngsuran').val("Rp "+angsuran.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'));
            });
        
        })(jQuery, undefined);
    </script>
@endpush