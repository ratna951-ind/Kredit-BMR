@extends('layouts.app')

@section('judul')
    Ubah Konsumen
@endsection

@push('css')
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
    <section id="description" class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{route('konsumen.update', $konsumenlama->nik)}}" method="post" id="updateRecord" enctype="multipart/form-data">
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
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_konsumen" data-toggle="tab" aria-controls="konsumen" href="#konsumen" aria-expanded="true"><i class="la la-user"></i> &nbspKonsumen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_pekerjaan" data-toggle="tab" aria-controls="pekerjaan" href="#pekerjaan" aria-expanded="false"><i class="la la-suitcase"></i> &nbspPekerjaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_darurat" data-toggle="tab" aria-controls="darurat" href="#darurat" aria-expanded="false"><i class="la la-book"></i> &nbspDarurat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab_dokumen" data-toggle="tab" aria-controls="dokumen" href="#dokumen" aria-expanded="false"><i class="la la-file"></i> &nbspDokumen</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div role="tabpanel" class="tab-pane active" id="konsumen" aria-expanded="true" aria-labelledby="tab_konsumen">
                            <h4 class="card-title mt-2"><b>DATA KONSUMEN</b></h4>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNama">Nama Lengkap</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNama" class="form-control border-primary" placeholder="Masukan Nama" value="{{ $konsumenlama->nama }}" name="nama" autofocus>
                                            <input type="hidden" value="{{ $konsumenlama->nik }}" name="nik_lama">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNIK">No KTP</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputNIK" class="form-control border-primary nospinner" placeholder="Masukan No KTP" value="{{ $konsumenlama->nik }}" name="nik">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputTempatLahir">Tempat Lahir</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputTempatLahir" class="form-control border-primary" placeholder="Masukan Tempat Lahir" value="{{ $konsumenlama->tmptlahir }}" name="tmptlahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputIbuKandung">Ibu Kandung</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputIbuKandung" class="form-control border-primary" placeholder="Masukan Nama Ibu Kandung" value="{{ $konsumenlama->ibukandung }}" name="ibukandung">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputTanggalLahir">Tanggal Lahir</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="date" id="inputTanggalLahir" class="form-control border-primary" placeholder="Masukan Tanggal Lahir" value="{{ $konsumenlama->tgllahir }}" name="tgllahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputStatus">Status</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control custom-select" id="inputStatus" name="status">
                                                <option value="">Pilih Status</option>
                                                <option value="K" @if ('K' == $konsumenlama->status) {{'selected'}}@endif>Kawin</option>
                                                <option value="BK" @if ('BK' == $konsumenlama->status) {{'selected'}}@endif>Belum Kawin</option>
                                                <option value="C" @if ('C' == $konsumenlama->status) {{'selected'}}@endif>Cerai</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatKTP">Alamat KTP</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlamatKTP" class="form-control border-primary" placeholder="Masukan Alamat KTP" value="{{ $konsumenlama->alamatktp }}" name="alamatktp">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputStatusRumah">Status Rumah</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control custom-select" id="inputStatusRumah" name="statusrumah">
                                                <option value="">Pilih Status Rumah</option>
                                                <option value="Sen" @if ('Sen' == $konsumenlama->statusrumah) {{'selected'}}@endif>Sendiri</option>
                                                <option value="K" @if ('K' == $konsumenlama->statusrumah) {{'selected'}}@endif>Keluarga</option>
                                                <option value="Sew" @if ('Sew' == $konsumenlama->statusrumah) {{'selected'}}@endif>Sewa</option>
                                                <option value="KPR" @if ('KPR' == $konsumenlama->statusrumah) {{'selected'}}@endif>KPR</option>
                                                <option value="D" @if ('D' == $konsumenlama->statusrumah) {{'selected'}}@endif>Dinas</option>
                                                <option value="L" @if ('L' == $konsumenlama->statusrumah) {{'selected'}}@endif>Lain-Lain</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatSekarang">Alamat Sekarang</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlamatSekarang" class="form-control border-primary" placeholder="Masukan Alamat Sekarang" value="{{ $konsumenlama->alamatskrng }}" name="alamatskrng">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputLamaMenetap">Lama Menetap</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputLamaMenetap" class="form-control border-primary" placeholder="Masukan Lama Menetap" value="{{ $konsumenlama->lamamenetapbulan }}" name="lamamenetapbulan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoTelp">No Telp</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputNoTelp" class="form-control border-primary nospinner" placeholder="Masukan No Telp" value="{{ $konsumenlama->telp }}" name="telp">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPendidikanTerakhir">Pendidikan Terakhir</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control custom-select" id="inputPendidikanTerakhir" name="pendidikanterakhir">
                                                <option value="">Pilih Pendidikan Terakhir</option>
                                                <option value="SD" @if ('SD' == $konsumenlama->pendidikanterakhir) {{'selected'}}@endif>SD</option>
                                                <option value="SLTP" @if ('SLTP' == $konsumenlama->pendidikanterakhir) {{'selected'}}@endif>SLTP</option>
                                                <option value="SLTA" @if ('SLTA' == $konsumenlama->pendidikanterakhir) {{'selected'}}@endif>SLTA</option>
                                                <option value="Akademi" @if ('Akademi' == $konsumenlama->pendidikanterakhir) {{'selected'}}@endif>Akademi</option>
                                                <option value="Universitas" @if ('Universitas' == $konsumenlama->pendidikanterakhir) {{'selected'}}@endif>Universitas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJenisKelamin">Jenis Kelamin</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control custom-select" id="inputJenisKelamin" name="jk">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L" @if ('L' == $konsumenlama->jk) {{'selected'}}@endif>Laki-Laki</option>
                                                <option value="P" @if ('P' == $konsumenlama->jk) {{'selected'}}@endif>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pasangan" style="display: none">
                                <h4 class="card-title mt-5"><b>DATA PASANGAN</b></h4>
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputNama2">Nama Lengkap</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputNama2" class="form-control border-primary" placeholder="Masukan Nama Pasangan" value="{{ $konsumenlama->nama_2 }}" name="nama_2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputTempatLahir2">Tempat Lahir</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputTempatLahir2" class="form-control border-primary" placeholder="Masukan Tempat Lahir Pasangan" value="{{ $konsumenlama->tmptlahir_2 }}" name="tmptlahir_2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputTanggalLahir2">Tanggal Lahir</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="date" id="inputTanggalLahir2" class="form-control border-primary" placeholder="Masukan Tanggal Lahir Pasangan" value="{{ $konsumenlama->tgllahir_2 }}" name="tgllahir_2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="pekerjaan" aria-labelledby="tab_pekerjaan">
                            <h4 class="card-title mt-2"><b>DATA KONSUMEN PEKERJAAN</b></h4>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputTipePekerjaan">Tipe Pekerjaan</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control custom-select" id="inputTipePekerjaan" name="tipe">
                                                <option value="">Pilih Tipe Pekerjaan</option>
                                                <option value="Karyawan" @if ('Karyawan' == $konsumenlama->konsumen_pekerjaan->tipe) {{'selected'}}@endif>Karyawan</option>
                                                <option value="Non Karyawan" @if ('Non Karyawan' == $konsumenlama->konsumen_pekerjaan->tipe) {{'selected'}}@endif>Non Karyawan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJabatan">Jabatan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputJabatan" class="form-control border-primary" placeholder="Masukan Jabatan" value="{{ $konsumenlama->konsumen_pekerjaan->jabatan }}" name="jabatan">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPerusahaan">Perusahaan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPerusahaan" class="form-control border-primary" placeholder="Masukan Perusahaan" value="{{ $konsumenlama->konsumen_pekerjaan->perusahaan }}" name="perusahaan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatPekerjaan">Alamat</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlamatPekerjaan" class="form-control border-primary" placeholder="Masukan Alamat Pekerjaan" value="{{ $konsumenlama->konsumen_pekerjaan->alamat_pekerjaan }}" name="alamat_pekerjaan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputMasaKerja">Masa Kerja</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputMasaKerja" class="form-control border-primary" placeholder="Masukan Masa Kerja" value="{{ $konsumenlama->konsumen_pekerjaan->masakerja }}" name="masakerja">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoTelpPekerjaan">No Telp</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputNoTelpPekerjaan" class="form-control border-primary nospinner" placeholder="Masukan No Telp Pekerjaan" value="{{ $konsumenlama->konsumen_pekerjaan->telp_pekerjaan }}" name="telp_pekerjaan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPenghasilan">Penghasilan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputPenghasilan" class="form-control border-primary nospinner" placeholder="Masukan Penghasilan" value="{{ $konsumenlama->konsumen_pekerjaan->penghasilan }}" name="penghasilan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pasangan_pekerjaan" style="display: none">
                                <h4 class="card-title mt-5"><b>DATA PEKERJAAN PASANGAN</b></h4>
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputPerusahaanPasangan">Perusahaan</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputPerusahaanPasangan" class="form-control border-primary" placeholder="Masukan Perusahaan Pasangan" value="{{ $konsumenlama->konsumen_pekerjaan->perusahaan_2 }}" name="perusahaan_2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputAlamatPekerjaanPasangan">Alamat</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputAlamatPekerjaanPasangan" class="form-control border-primary" placeholder="Masukan Alamat Pekerjaan Pasangan" value="{{ $konsumenlama->konsumen_pekerjaan->alamat_pekerjaan_2 }}" name="alamat_pekerjaan_2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputJabatanPasangan">Jabatan</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputJabatanPasangan" class="form-control border-primary" placeholder="Masukan Jabatan Pasangan" value="{{ $konsumenlama->konsumen_pekerjaan->jabatan_2 }}" name="jabatan_2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputNoTelpPekerjaanPasangan">No Telp</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="number" id="inputNoTelpPekerjaanPasangan" class="form-control border-primary nospinner" placeholder="Masukan No Telp Pekerjaan Pasangan" value="{{ $konsumenlama->konsumen_pekerjaan->telp_pekerjaan_2 }}" name="telp_pekerjaan_2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputPenghasilanPasangan">Penghasilan</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="number" id="inputPenghasilanPasangan" class="form-control border-primary nospinner" placeholder="Masukan Penghasilan Pasangan" value="{{ $konsumenlama->konsumen_pekerjaan->penghasilan_2 }}" name="penghasilan_2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="darurat" aria-labelledby="tab_darurat">
                            <h4 class="card-title mt-2"><b>DATA DARURAT KONSUMEN</b></h4>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNamaDarurat">Nama</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNamaDarurat" class="form-control border-primary" placeholder="Masukan Nama Darurat" value="{{ $konsumenlama->konsumen_darurat->nama_darurat }}" name="nama_darurat">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatDarurat">Alamat</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlamatDarurat" class="form-control border-primary" placeholder="Masukan Alamat Darurat" value="{{ $konsumenlama->konsumen_darurat->alamat_darurat }}" name="alamat_darurat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputHubunganDarurat">Hubungan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputHubunganDarurat" class="form-control border-primary" placeholder="Masukan Hubungan Darurat" value="{{ $konsumenlama->konsumen_darurat->hubungan }}" name="hubungan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoTelpDarurat">No Telp</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputNoTelpDarurat" class="form-control border-primary nospinner" placeholder="Masukan No Telp Darurat" value="{{ $konsumenlama->konsumen_darurat->telp_darurat }}" name="telp_darurat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="dokumen" aria-labelledby="tab_dokumen">
                            <h4 class="card-title mt-2"><b>DATA DOKUMEN KONSUMEN</b></h4>
                            <div class="row mb-2">
                                <div class="col-md-6" align="center">
                                    <img src="{{route('image', ['konsumen', $konsumenlama->gambarktp])}}" id="uploadKTP" height="200px" alt="Preview KTP">
                                </div>
                                <div class="col-md-6" align="center">
                                    <img src="{{route('image', ['konsumen', $konsumenlama->gambarkk])}}" id="uploadKK" height="200px" alt="Preview KK">
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
                            <div id="pasangan_dokumen" style="display: none">
                                <h4 class="card-title mt-5"><b>DATA DOKUMEN PASANGAN</b></h4>
                                <div class="row mb-2">
                                    <div class="col-md-6" align="center">
                                        <img src="{{route('image', ['konsumen', $konsumenlama->gambarktp_2])}}" id="uploadKTP2" height="200px" alt="Preview KTP2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputKTPPasangan">KTP</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="file" class="custom-file-input" id="inputKTPPasangan" name="gambarktp_2">
                                                <label class="custom-file-label" for="inputKTPPasangan" aria-describedby="inputKTPPasangan">Pilih Dokumen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('konsumen.index')}}'">Batal</button>
                                    <button type="button" class="modal-update btn btn-icon btn-success">Simpan</button>
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('js')    
    @include('komponen.modalUpdate', ['modul' => 'konsumen'])
    <script src="{{asset('app-assets/custom/konsumen.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/custom-file-input.min.js')}}"></script>
@endpush