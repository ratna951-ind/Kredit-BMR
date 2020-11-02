@extends('layouts.app')

@section('judul')
    Tambah Konsumen
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('isi')
    <section id="description" class="card">
        <div class="card-content">
            <div class="card-body">
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
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputNama">Nama Lengkap</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputNama" class="form-control border-primary" placeholder="Masukan Nama" value="{{ old('nama') }}" name="nama" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputNIK">No KTP</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="number" id="inputNIK" class="form-control border-primary" placeholder="Masukan No KTP" value="{{ old('nik') }}" name="nik">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputTempatLahir">Tempat Lahir</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputTempatLahir" class="form-control border-primary" placeholder="Masukan Tempat Lahir" value="{{ old('tmptlahir') }}" name="tmptlahir">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputIbuKandung">Ibu Kandung</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputIbuKandung" class="form-control border-primary" placeholder="Masukan Nama Ibu Kandung" value="{{ old('ibukandung') }}" name="ibukandung">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputTanggalLahir">Tanggal Lahir</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="date" id="inputTanggalLahir" class="form-control border-primary" placeholder="Masukan Tanggal Lahir" value="{{ old('tgllahir') }}" name="tgllahir">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputStatus">Status</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="form-control custom-select" id="inputStatus" name="status">
                                            <option>Pilih Status</option>
                                            <option value="K">Kawin</option>
                                            <option value="BK">Belum Kawin</option>
                                            <option value="C">Cerai</option>
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
                                        <input type="text" id="inputAlamatKTP" class="form-control border-primary" placeholder="Masukan Alamat KTP" value="{{ old('alamatktp') }}" name="alamatktp">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputStatusRumah">Status Rumah</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="form-control custom-select" id="inputStatusRumah" name="statusrumah">
                                            <option>Pilih Status Rumah</option>
                                            <option value="Sen">Sendiri</option>
                                            <option value="K">Keluarga</option>
                                            <option value="Sew">Sewa</option>
                                            <option value="KPR">KPR</option>
                                            <option value="D">Dinas</option>
                                            <option value="L">Lain-Lain</option>
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
                                        <input type="text" id="inputAlamatSekarang" class="form-control border-primary" placeholder="Masukan Alamat Sekarang" value="{{ old('alamatskrng') }}" name="alamatskrng">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputLamaMenetap">Lama Menetap</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputLamaMenetap" class="form-control border-primary" placeholder="Masukan Lama Menetap" value="{{ old('lamamenetapbulan') }}" name="lamamenetapbulan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputNoTelp">No Telp</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputNoTelp" class="form-control border-primary" placeholder="Masukan No Telp" value="{{ old('telp') }}" name="telp">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputPendidikanTerakhir">Pendidikan Terakhir</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="form-control custom-select" id="inputPendidikanTerakhir" name="pendidikanterakhir">
                                            <option>Pilih Pendidikan Terakhir</option>
                                            <option value="SD">SD</option>
                                            <option value="SLTP">SLTP</option>
                                            <option value="SLTA">SLTA</option>
                                            <option value="Akademi">Akademi</option>
                                            <option value="Universitas">Universitas</option>
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
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pekerjaan" aria-labelledby="tab_pekerjaan">
                        <p>Ini Pekerjaan</p>
                    </div>
                    <div class="tab-pane" id="darurat" aria-labelledby="tab_darurat">
                        <p>Ini Darurat</p>
                    </div>
                    <div class="tab-pane" id="dokumen" aria-labelledby="tab_dokumen">
                        <p>Ini Dokumen</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')    
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
@endpush