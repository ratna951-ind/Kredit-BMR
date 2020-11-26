@extends('layouts.app')

@section('judul')
    Data Pembebanan
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('isi')
    <section id="description" class="card">
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <h3 style="padding: 15px 15px"><button type="button" class="btn btn-secondary btn-sm" onclick="window.location.href='{{route('pembebanan.history')}}'"><i class="la la-clock-o"></i> Histori</button></h3>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="1%">No Kontrak</th>
                                <th width="1%">Jatuh Tempo</th>
                                <th>Konsumen</th>
                                <th width="15%">Pinjaman</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($pembebanans as $pembebanan)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$pembebanan->no_kontrak ? $pembebanan->no_kontrak : "-"}}</td>
                                <td>{{(\Carbon\Carbon::createFromTimestamp(strtotime($pembebanan->tgl_order))->addMonth()->format('j/m/Y'))}}</td>
                                <td>{{$pembebanan->konsumen->nama}}</td>
                                <td>Rp {{number_format($pembebanan->pinjaman_awal,0,",",".")}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-icon btn-dark" onclick="window.location.href='{{route('pembebanan.show',$pembebanan->id)}}'"><i class="la la-file-text"></i></button>
                                        <button type="button" class="btn btn-icon btn-success" onclick="window.location.href='{{route('pembebanan.edit',$pembebanan->id)}}'"><i class="la la-money"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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