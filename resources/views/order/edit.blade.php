@extends('layouts.app')

@section('judul')
    @if(Auth::user()->peran_id==4)
        Pencairan Order
    @else
        Batal Order
    @endif
@endsection

@push('css')

@endpush

@section('isi')
    <section id="description" class="card">
        <div class="card-content">
            <div class="card-body">
                @if(Auth::user()->peran_id==4)
                    <form class="form form-horizontal" action="{{route('order.accept_update', $order->id)}}" method="post" id="updateRecord" enctype="multipart/form-data">
                @else
                    <form class="form form-horizontal" action="{{route('order.update', $order->id)}}" method="post" id="updateRecord">
                @endif
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
                            <a class="nav-link" id="tab_konsumen" data-toggle="tab" aria-controls="konsumen" href="#konsumen" aria-expanded="true"><i class="la la-user"></i> &nbspKonsumen</a>
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
                        <li class="nav-item">
                            <a class="nav-link active" id="tab_pembiayaan" data-toggle="tab" aria-controls="pembiayaan" href="#pembiayaan" aria-expanded="false"><i class="la la-money"></i> &nbspPembiayaan</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div role="tabpanel" class="tab-pane" id="konsumen" aria-expanded="true" aria-labelledby="tab_konsumen">
                            <h4 class="card-title mt-2"><b>DATA KONSUMEN</b></h4>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNama">Nama Lengkap</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNama" class="form-control border-primary" value="{{ $order->konsumen->nama }}" disabled autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNIK">No KTP</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNIK" class="form-control border-primary" value="{{ $order->konsumen->nik }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputTempatLahir">Tempat Tanggal Lahir</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputTempatLahir" class="form-control border-primary" value="{{ $order->konsumen->tmptlahir.', '.date('j F Y', strtotime($order->konsumen->tgllahir)) }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputIbuKandung">Ibu Kandung</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputIbuKandung" class="form-control border-primary" value="{{ $order->konsumen->ibukandung }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatKTP">Alamat KTP</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlamatKTP" class="form-control border-primary" value="{{ $order->konsumen->alamatktp }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputStatus">Status</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputStatus" class="form-control border-primary" 
                                                @switch($order->konsumen->status)
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
                                            <input type="text" id="inputAlamatSekarang" class="form-control border-primary" value="{{ $order->konsumen->alamatskrng }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputStatusRumah">Status Rumah</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputStatusRumah" class="form-control border-primary" 
                                                @switch($order->konsumen->statusrumah)
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
                                            <input type="text" id="inputNoTelp" class="form-control border-primary" value="{{ $order->konsumen->telp }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputLamaMenetap">Lama Menetap</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputLamaMenetap" class="form-control border-primary" value="{{ $order->konsumen->lamamenetapbulan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJenisKelamin">Jenis Kelamin</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputJenisKelamin" class="form-control border-primary" value="{{ $order->konsumen->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPendidikanTerakhir">Pendidikan Terakhir</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPendidikanTerakhir" class="form-control border-primary" value="{{ $order->konsumen->pendidikanterakhir }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($order->konsumen->status == "K")
                                <h4 class="card-title mt-5"><b>DATA PASANGAN</b></h4>
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputNama2">Nama Lengkap</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputNama2" class="form-control border-primary" value="{{ $order->konsumen->nama_2 }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputTempatLahir2">Tempat Tanggal Lahir</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputTempatLahir2" class="form-control border-primary" value="{{ $order->konsumen->tmptlahir_2.', '.date('j F Y', strtotime($order->konsumen->tgllahir_2)) }}" disabled>
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
                                            <input type="text" id="inputTipePekerjaan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->tipe == 'Karyawan' ? 'Karyawan' : 'Non Karyawan' }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJabatan">Jabatan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputJabatan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->jabatan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPerusahaan">Perusahaan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPerusahaan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->perusahaan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatPekerjaan">Alamat</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlamatPekerjaan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->alamat_pekerjaan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputMasaKerja">Masa Kerja</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputMasaKerja" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->masakerja }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoTelpPekerjaan">No Telp</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNoTelpPekerjaan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->telp_pekerjaan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPenghasilan">Penghasilan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPenghasilan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->penghasilan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($order->konsumen->status == "K")
                                <h4 class="card-title mt-5"><b>DATA PEKERJAAN PASANGAN</b></h4>
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputPerusahaanPasangan">Perusahaan</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputPerusahaanPasangan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->perusahaan_2 }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputAlamatPekerjaanPasangan">Alamat</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputAlamatPekerjaanPasangan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->alamat_pekerjaan_2 }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputJabatanPasangan">Jabatan</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputJabatanPasangan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->jabatan_2 }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputNoTelpPekerjaanPasangan">No Telp</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputNoTelpPekerjaanPasangan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->telp_pekerjaan_2 }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputPenghasilanPasangan">Penghasilan</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" id="inputPenghasilanPasangan" class="form-control border-primary" value="{{ $order->konsumen->konsumen_pekerjaan->penghasilan_2 }}" disabled>
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
                                            <input type="text" id="inputNamaDarurat" class="form-control border-primary" value="{{ $order->konsumen->konsumen_darurat->nama_darurat }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlamatDarurat">Alamat</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlamatDarurat" class="form-control border-primary" value="{{ $order->konsumen->konsumen_darurat->alamat_darurat }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputHubunganDarurat">Hubungan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputHubunganDarurat" class="form-control border-primary" value="{{ $order->konsumen->konsumen_darurat->hubungan }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputNoTelpDarurat">No Telp</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputNoTelpDarurat" class="form-control border-primary" value="{{ $order->konsumen->konsumen_darurat->telp_darurat }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" id="pembiayaan" aria-labelledby="tab_pembiayaan">
                            <h4 class="card-title mt-2"><b>DATA PEMBIAYAAN KONSUMEN</b></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputHargaBarang">Harga Barang</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputHargaBarang" class="form-control border-primary" value="Rp {{number_format($order->harga_barang,0,',','.')}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPinjaman">Pinjaman</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPinjaman" class="form-control border-primary" value="Rp {{number_format($order->pinjaman_awal,0,',','.')}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAdministrasi">Administrasi</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAdministrasi" class="form-control border-primary" value="Rp {{number_format($order->adm,0,',','.')}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPinjamanDisetujui">Pinjaman</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPinjamanDisetujui" class="form-control border-primary" value="Rp {{number_format($order->pinjaman_disetujui,0,',','.')}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputPokokHutang">Pokok Hutang</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputPokokHutang" class="form-control border-primary" value="Rp {{number_format($order->pinjaman_disetujui+$order->adm,0,',','.')}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAngsuran">Angsuran</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAngsuran" class="form-control border-primary" value="Rp {{number_format($order->angsuran,0,',','.')}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if(Auth::user()->peran_id!=4)
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputAlasanBatal">Alasan Batal</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputAlasanBatal" class="form-control border-primary" placeholder="Masukan Alasan Batal" value="{{ old('pembatalan') }}" name="pembatalan" autofocus>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJangkaWaktu">Jangka Waktu</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" id="inputJangkaWaktu" class="form-control border-primary" value="{{ $order->tenor }} Bulan" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->peran_id==4)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputMetode">Metode Pembayaran</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control custom-select" id="inputMetode" name="cara_bayar">
                                                <option value="">Pilih Metode Pembayaran</option>
                                                <option value="B" @if ('B' == old('cara_bayar')) {{'selected'}}@endif>Bank</option>
                                                <option value="C" @if ('C' == old('cara_bayar')) {{'selected'}}@endif>Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputTanggal">Tanggal</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="date" id="inputTanggal" class="form-control border-primary" name="tgl" value="{{old('tgl')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6" align="center">
                                    <img src="{{asset('app-assets/images/ico/document-default.png')}}" id="uploadBuktiPencairan" height="200px" alt="Preview Bukti Pencairan">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputBuktiPencairan">Bukti Pencairan</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="file" class="custom-file-input" id="inputBuktiPencairan" name="bukti_std">
                                            <label class="custom-file-label" for="inputBuktiPencairan" aria-describedby="inputBuktiPencairan">Pilih Dokumen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane" id="dokumen" aria-labelledby="tab_dokumen">
                            <h4 class="card-title mt-2"><b>DATA DOKUMEN KONSUMEN</b></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKTP">KTP</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['konsumen', $order->konsumen->gambarktp])}}" alt="Gambar KTP" width="300px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputKK">KK</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['konsumen', $order->konsumen->gambarkk])}}" alt="Gambar KK" width="300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($order->konsumen->status == "K")
                                <h4 class="card-title mt-5"><b>DATA DOKUMEN PASANGAN</b></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="inputKTPPasangan">KTP</label>
                                            <div class="col-md-9 mx-auto">
                                                <img src="{{route('image', ['konsumen', $order->konsumen->gambarktp_2])}}" alt="Gambar KTP Pasangan" width="300px">
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
                                            <img src="{{route('image', ['jadwal_order', $order->stnk])}}" alt="Gambar STNK" width="300px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Kwitansi Jual Beli</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->kwt_jb])}}" alt="Gambar Kwitansi Jual Beli" width="300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">BPKB Depan</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->bpkb_depan])}}" alt="Gambar BPKB Depan" width="300px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">BPKB Belakang</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->bpkb_belakang])}}" alt="Gambar BPKB Belakang" width="300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">No Mesin</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->nosin])}}" alt="Gambar No Mesin" width="300px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">No Rangka</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->noka])}}" alt="Gambar No Rangka" width="300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Motor Depan</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->mtr_dpn])}}" alt="Gambar Motor Depan" width="300px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Motor Belakang</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->mtr_blkng])}}" alt="Gambar Motor Belakang" width="300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Motor Kanan</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->mtr_kanan])}}" alt="Gambar Motor Kanan" width="300px">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Motor Kiri</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->mtr_kiri])}}" alt="Gambar Motor Kiri" width="300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control">Selfie</label>
                                        <div class="col-md-9 mx-auto">
                                            <img src="{{route('image', ['jadwal_order', $order->selfie])}}" alt="Gambar Selfie" width="300px">
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
                </form>
            </div>
        </div>
    </section>
@endsection

@push('js')
    @if(Auth::user()->peran_id==4)
        @include('komponen.modalCair', ['modul' => 'pencairan'])
    @else
        @include('komponen.modalUpdate', ['modul' => 'order konsumen'])
    @endif
    <script src="{{asset('app-assets/custom/konsumen.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/forms/custom-file-input.min.js')}}"></script>
    <script>
        function readImageBuktiPencairan(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function (e) {
                $('#uploadBuktiPencairan').attr('src', e.target.result);
            }
        
            reader.readAsDataURL(input.files[0]);
            }
        }
        $("#inputBuktiPencairan").change(function(){
            readImageBuktiPencairan(this);
        });
    </script>
@endpush