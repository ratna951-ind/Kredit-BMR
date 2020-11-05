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
                <form class="form form-horizontal" action="{{route('konsumen.store')}}" method="post" id="createRecord">
                    {{csrf_field()}}
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
                            <div id="pasangan" style="display: none">
                                <h4 class="card-title mt-5"><b>DATA PASANGAN</b></h4>
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputNama2">Nama Lengkap</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputNama2" class="form-control border-primary" placeholder="Masukan Nama Pasangan" value="{{ old('nama_2') }}" name="nama_2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputTempatLahir2">Tempat Lahir</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="number" id="inputTempatLahir2" class="form-control border-primary" placeholder="Masukan Tempat Lahir Pasangan" value="{{ old('tmptlahir_2') }}" name="tmptlahir_2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputTanggalLahir2">Tanggal Lahir</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="date" id="inputTanggalLahir2" class="form-control border-primary" placeholder="Masukan Tanggal Lahir Pasangan" value="{{ old('tgllahir_2') }}" name="tgllahir_2">
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
                                                <option>Pilih Tipe Pekerjaan</option>
                                                <option value="Karyawan">Karyawan</option>
                                                <option value="Non Karyawan">Non Karyawan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJabatan">Jabatan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputJabatan" class="form-control border-primary" placeholder="Masukan Jabatan" value="{{ old('jabatan') }}" name="jabatan">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPerusahaan">Perusahaan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPerusahaan" class="form-control border-primary" placeholder="Masukan Perusahaan" value="{{ old('perusahaan') }}" name="perusahaan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatPekerjaan">Alamat</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputAlamatPekerjaan" class="form-control border-primary" placeholder="Masukan Alamat Pekerjaan" value="{{ old('alamat_pekerjaan') }}" name="alamat_pekerjaan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputMasaKerja">Masa Kerja</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputMasaKerja" class="form-control border-primary" placeholder="Masukan Masa Kerja" value="{{ old('masakerja') }}" name="masakerja">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoTelpPekerjaan">No Telp</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNoTelpPekerjaan" class="form-control border-primary" placeholder="Masukan No Telp Pekerjaan" value="{{ old('telp_pekerjaan') }}" name="telp_pekerjaan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPenghasilan">Penghasilan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPenghasilan" class="form-control border-primary" placeholder="Masukan Penghasilan" value="{{ old('penghasilan') }}" name="penghasilan">
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
                                                <input type="text" id="inputPerusahaanPasangan" class="form-control border-primary" placeholder="Masukan Perusahaan Pasangan" value="{{ old('perusahaan_2') }}" name="perusahaan_2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputAlamatPekerjaanPasangan">Alamat</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="number" id="inputAlamatPekerjaanPasangan" class="form-control border-primary" placeholder="Masukan Alamat Pekerjaan Pasangan" value="{{ old('alamat_pekerjaan_2') }}" name="alamat_pekerjaan_2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputJabatanPasangan">Jabatan</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputJabatanPasangan" class="form-control border-primary" placeholder="Masukan Jabatan Pasangan" value="{{ old('jabatan_2') }}" name="jabatan_2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputNoTelpPekerjaanPasangan">No Telp</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputNoTelpPekerjaanPasangan" class="form-control border-primary" placeholder="Masukan No Telp Pekerjaan Pasangan" value="{{ old('telp_pekerjaan_2') }}" name="telp_pekerjaan_2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputPenghasilanPasangan">Penghasilan</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputPenghasilanPasangan" class="form-control border-primary" placeholder="Masukan Penghasilan Pasangan" value="{{ old('penghasilan_2') }}" name="penghasilan_2">
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
                                            <input type="text" id="inputNamaDarurat" class="form-control border-primary" placeholder="Masukan Nama Darurat" value="{{ old('nama_darurat') }}" name="nama_darurat">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatDarurat">Alamat</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputAlamatDarurat" class="form-control border-primary" placeholder="Masukan Alamat Darurat" value="{{ old('alamat_darurat') }}" name="alamat_darurat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputHubunganDarurat">Hubungan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputHubunganDarurat" class="form-control border-primary" placeholder="Masukan Hubungan Darurat" value="{{ old('hubungan') }}" name="hubungan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoTelpDarurat">No Telp</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNoTelpDarurat" class="form-control border-primary" placeholder="Masukan No Telp Darurat" value="{{ old('telp_darurat') }}" name="telp_darurat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="dokumen" aria-labelledby="tab_dokumen">
                            <h4 class="card-title mt-2"><b>DATA DOKUMEN KONSUMEN</b></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKTP">KTP</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputKTP" name="gambarktp">
                                            <label class="custom-file-label" for="inputKTP" aria-describedby="inputGroupFile02">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKK">KK</label>
                                        <div class="col-md-9 mx-auto">
                                        <input type="file" class="custom-file-input" id="inputKK" name="gambarkK">
                                            <label class="custom-file-label" for="inputKK" aria-describedby="inputGroupFile02">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pasangan_dokumen" style="display: none">
                                <h4 class="card-title mt-5"><b>DATA DOKUMEN PASANGAN</b></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputKTPPasangan">KTP</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="file" class="custom-file-input" id="inputKTPPasangan" name="gambarktp_2">
                                                <label class="custom-file-label" for="inputKTPPasangan" aria-describedby="inputGroupFile02">Pilih Dokumen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('konsumen.index')}}'">Batal</button>
                                    <button type="button" class="modal-create btn btn-icon btn-success">Simpan</button>
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
    @include('komponen.modalCreate', ['modul' => 'konsumen'])
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
    <script src="{{asset('app-assets/custom/konsumen.js')}}"></script>
@endpush