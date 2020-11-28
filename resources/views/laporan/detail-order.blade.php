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
                    <form action="{{route('laporan.order.detail', $kios)}}" method="get">
                        <div class="row" style="padding: 0px 15px">
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
                    <div class="row" style="padding: 15px 15px">
                        <div class="col-md-2">
                            <b>Kios : {{$kios->nama}}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Total Order : {{count($orders)}}</b>
                        </div>
                        <div class="col-md-8"></div>
                    </div>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="1%">No Kontrak</th>
                                <th>MCE</th>
                                <th>Konsumen</th>
                                <th>Telp</th>
                                <th>Pinjaman</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$order->no_kontrak ? $order->no_kontrak : "-"}}</td>
                                <td>{{$order->user->nama}}</td>
                                <td>{{$order->konsumen->nama}}</td>
                                <td>{{$order->konsumen->telp}}</td>
                                <td>Rp {{number_format($order->pinjaman_disetujui,0,",",".")}}</td>
                                @php
                                    $total += $order->pinjaman_disetujui;
                                @endphp
                            </tr>
                        @endforeach
                        @if (count($orders)>0)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total</b></td>
                                <td><b>Rp {{number_format($total,0,",",".")}}</b></td>
                            </tr>
                        @endif
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
                "ordering": false,
                "searching": false,
                "info": false
            } );
        } );
    </script>
@endpush