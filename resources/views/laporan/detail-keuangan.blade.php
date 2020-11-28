@extends('layouts.app')

@section('judul')
    Laporan Order
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('isi')
    <section id="description" class="card">
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <form action="{{route('laporan.keuangan.detail', $kios)}}" method="get">
                        <div class="row" style="padding: 15px 15px">
                            <div class="col-md-2" style="margin: auto">
                                <input type="date" class="form-control" name="awal" id="inputAwal" value="{{$awal}}">
                            </div>
                            <div class="col-md-2" style="margin: auto">
                                <input type="date" class="form-control" name="akhir" id="inputAkhir" value="{{$akhir}}">
                            </div>
                            <div class="col-md-2" style="margin: auto">
                                Bank : {{Auth::user()->kios->bank}}
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-2" style="text-align:right">
                                <h3><button type="submit" class="btn btn-info">Cari</button></h3>
                            </div>
                        </div>
                    </form>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width>Transaksi</th>
                                <th width="15%">Debit</th>
                                <th width="15%">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td align="center">1</td>
                            <td>Saldo Awal</td>
                            <td>
                                @if (count($kas_banks)>0)
                                    @if ($kas_banks[0]->jenis == "PK")
                                        Rp {{number_format($kas_banks[0]->sisa-$kas_banks[0]->jumlah,0,",",".")}}
                                    @else
                                        Rp {{number_format($kas_banks[0]->sisa+$kas_banks[0]->jumlah,0,",",".")}}
                                    @endif
                                @else
                                    Rp 0
                                @endif
                            </td>
                            <td></td>
                        </tr>
                        @foreach ($kas_banks as $kas_bank)
                            <tr>
                                <td align="center">{{$loop->iteration+1}}</td>
                                @switch($kas_bank->jenis)
                                    @case("CO")
                                        <td>Cash Opname</td>
                                        <td></td>
                                        <td>Rp {{number_format($kas_bank->jumlah,0,",",".")}}</td>
                                        @break
                                    @case("PK")
                                        <td>Pengisian Kas</td>
                                        <td>Rp {{number_format($kas_bank->jumlah,0,",",".")}}</td>
                                        <td></td>
                                        @break
                                    @case("P")
                                        <td>Pencairan a.n {{$kas_bank->order->konsumen->nama}}</td>
                                        <td></td>
                                        <td>Rp {{number_format($kas_bank->jumlah,0,",",".")}}</td>
                                        @break
                                @endswitch
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Saldo Akhir</b></td>
                            <td>
                                <b>
                                    @if (count($kas_banks)>0)
                                        Rp {{number_format($kas_banks[count($kas_banks)-1]->sisa,0,",",".")}}
                                    @else
                                        Rp 0
                                    @endif
                                </b>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <h3 align="right" style="padding: 15px 15px"><button type="button" class="btn btn-success" onclick="window.location.href='{{route('jadwal.create')}}'">Cetak</button></h3>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                "ordering": false
            } );
        } );
    </script>
@endpush