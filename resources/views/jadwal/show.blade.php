@extends('layouts.app')

@section('judul')
    Jadwal Detail
@endsection

@push('css')

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
                        <a class="nav-link" id="tab_pembiayaan" data-toggle="tab" aria-controls="pembiayaan" href="#pembiayaan" aria-expanded="false"><i class="la la-money"></i> &nbspPembiayaan</a>
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
                                        <input type="text" id="inputNama" class="form-control border-primary" value="{{ $jadwal->konsumen->nama }}" disabled autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputNIK">No KTP</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputNIK" class="form-control border-primary" value="{{ $jadwal->konsumen->nik }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputTempatLahir">Tempat Tanggal Lahir</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputTempatLahir" class="form-control border-primary" value="{{ $jadwal->konsumen->tmptlahir.', '.date('j F Y', strtotime($jadwal->konsumen->tgllahir)) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputIbuKandung">Ibu Kandung</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputIbuKandung" class="form-control border-primary" value="{{ $jadwal->konsumen->ibukandung }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputAlamatKTP">Alamat KTP</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputAlamatKTP" class="form-control border-primary" value="{{ $jadwal->konsumen->alamatktp }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputStatus">Status</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputStatus" class="form-control border-primary" 
                                            @switch($jadwal->konsumen->status)
                                                @case('K')
                                                    value="Kawin"
                                                    @break

                                                @case('BK')
                                                    value="Belum Kawin"
                                                    @break

                                                @case('C')
                                                    value="Cerai"
                                                    @break

                                            @endswitch
                                        disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputAlamatSekarang">Alamat Sekarang</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputAlamatSekarang" class="form-control border-primary" value="{{ $jadwal->konsumen->alamatskrng }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputStatusRumah">Status Rumah</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputStatusRumah" class="form-control border-primary" 
                                            @switch($jadwal->konsumen->statusrumah)
                                                @case('Sen')
                                                    value="Sendiri"
                                                    @break

                                                @case('K')
                                                    value="Keluarga"
                                                    @break

                                                @case('Sew')
                                                    value="Sewa"
                                                    @break

                                                @case('KPR')
                                                    value="KPR"
                                                    @break

                                                @case('D')
                                                    value="Dinas"
                                                    @break

                                                @case('L')
                                                    value="Lain-Lain"
                                                    @break

                                            @endswitch
                                        disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputNoTelp">No Telp</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputNoTelp" class="form-control border-primary" value="{{ $jadwal->konsumen->telp }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputLamaMenetap">Lama Menetap</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputLamaMenetap" class="form-control border-primary" value="{{ $jadwal->konsumen->lamamenetapbulan }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputJenisKelamin">Jenis Kelamin</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputJenisKelamin" class="form-control border-primary" value="{{ $jadwal->konsumen->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputPendidikanTerakhir">Pendidikan Terakhir</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputPendidikanTerakhir" class="form-control border-primary" value="{{ $jadwal->konsumen->pendidikanterakhir }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($jadwal->konsumen->status == "K")
                            <h4 class="card-title mt-5"><b>DATA PASANGAN</b></h4>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNama2">Nama Lengkap</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNama2" class="form-control border-primary" value="{{ $jadwal->konsumen->nama_2 }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputTempatLahir2">Tempat Tanggal Lahir</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputTempatLahir2" class="form-control border-primary" value="{{ $jadwal->konsumen->tmptlahir_2.', '.date('j F Y', strtotime($jadwal->konsumen->tgllahir_2)) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane" id="pekerjaan" aria-labelledby="tab_pekerjaan">
                        <h4 class="card-title mt-2"><b>DATA KONSUMEN PEKERJAAN</b></h4>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputTipePekerjaan">Tipe Pekerjaan</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputTipePekerjaan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->tipe == 'Karyawan' ? 'Karyawan' : 'Non Karyawan' }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputJabatan">Jabatan</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputJabatan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->jabatan }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputPerusahaan">Perusahaan</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputPerusahaan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->perusahaan }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputAlamatPekerjaan">Alamat</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputAlamatPekerjaan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->alamat_pekerjaan }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputMasaKerja">Masa Kerja</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputMasaKerja" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->masakerja }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputNoTelpPekerjaan">No Telp</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputNoTelpPekerjaan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->telp_pekerjaan }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputPenghasilan">Penghasilan</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputPenghasilan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->penghasilan }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($jadwal->konsumen->status == "K")
                            <h4 class="card-title mt-5"><b>DATA PEKERJAAN PASANGAN</b></h4>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPerusahaanPasangan">Perusahaan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPerusahaanPasangan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->perusahaan_2 }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatPekerjaanPasangan">Alamat</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlamatPekerjaanPasangan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->alamat_pekerjaan_2 }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJabatanPasangan">Jabatan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputJabatanPasangan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->jabatan_2 }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoTelpPekerjaanPasangan">No Telp</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNoTelpPekerjaanPasangan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->telp_pekerjaan_2 }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPenghasilanPasangan">Penghasilan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPenghasilanPasangan" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_pekerjaan->penghasilan_2 }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane" id="darurat" aria-labelledby="tab_darurat">
                        <h4 class="card-title mt-2"><b>DATA DARURAT KONSUMEN</b></h4>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputNamaDarurat">Nama</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputNamaDarurat" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_darurat->nama_darurat }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputAlamatDarurat">Alamat</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputAlamatDarurat" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_darurat->alamat_darurat }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputHubunganDarurat">Hubungan</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputHubunganDarurat" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_darurat->hubungan }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputNoTelpDarurat">No Telp</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputNoTelpDarurat" class="form-control border-primary" value="{{ $jadwal->konsumen->konsumen_darurat->telp_darurat }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pembiayaan" aria-labelledby="tab_pembiayaan">
                        <h4 class="card-title mt-2"><b>DATA PEMBIAYAAN KONSUMEN</b></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputPinjaman">Pinjaman</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputPinjaman" class="form-control border-primary" value="Rp {{number_format($jadwal->pinjaman_awal,0,',','.')}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputJangkaWaktu">Jangka Waktu</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputJangkaWaktu" class="form-control border-primary" value="{{ $jadwal->tenor }} Bulan" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputAngsuran">Angsuran</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="inputAngsuran" class="form-control border-primary" value="Rp {{number_format($jadwal->angsuran,0,',','.')}}" disabled>
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
                                        <img src="{{route('image', ['konsumen', $jadwal->konsumen->gambarktp])}}" alt="Gambar KTP" width="300px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="inputKK">KK</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['konsumen', $jadwal->konsumen->gambarkk])}}" alt="Gambar KK" width="300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($jadwal->konsumen->status == "K")
                            <h4 class="card-title mt-5"><b>DATA DOKUMEN PASANGAN</b></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKTPPasangan">KTP</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['konsumen', $jadwal->konsumen->gambarktp_2])}}" alt="Gambar KTP Pasangan" width="300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <h4 class="card-title mt-2"><b>DATA KENDARAAN KONSUMEN</b></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">STNK</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->stnk])}}" alt="Gambar STNK" width="300px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if(isset($order->kwt_jb))
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Kwitansi Jual Beli</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->kwt_jb])}}" alt="Gambar Kwitansi Jual Beli" width="300px">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">BPKB Depan</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->bpkb_depan])}}" alt="Gambar BPKB Depan" width="300px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">BPKB Belakang</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->bpkb_belakang])}}" alt="Gambar BPKB Belakang" width="300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">No Mesin</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->nosin])}}" alt="Gambar No Mesin" width="300px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">No Rangka</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->noka])}}" alt="Gambar No Rangka" width="300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Motor Depan</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->mtr_dpn])}}" alt="Gambar Motor Depan" width="300px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Motor Belakang</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->mtr_blkng])}}" alt="Gambar Motor Belakang" width="300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Motor Kanan</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->mtr_kanan])}}" alt="Gambar Motor Kanan" width="300px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Motor Kiri</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->mtr_kiri])}}" alt="Gambar Motor Kiri" width="300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control">Selfie</label>
                                    <div class="col-md-9 mx-auto">
                                        <img src="{{route('image', ['jadwal_order', $jadwal->selfie])}}" alt="Gambar Selfie" width="300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <button type="button" class="btn btn-secondary mt-3" onclick="window.location.href='{{route('konsumen.index')}}'">Kembali</button>
                </center>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{asset('app-assets/custom/konsumen.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/custom-file-input.min.js')}}"></script>
@endpush