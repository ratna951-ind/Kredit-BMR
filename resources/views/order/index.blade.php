@extends('layouts.app')

@section('judul')
    Data Order
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('isi')
    <section id="description" class="card">
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <form action="{{route('order.index')}}" method="get">
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <select class="form-control" id="inputBulan" name="bulan">
                                    @foreach ($months as $month)
                                    <option value="{{$month['id']}}" @if($bulan == $month['id']) selected @endif>{{$month['nama']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="inputTahun" name="tahun">
                                    @for($i=0;$i<5;$i++)
                                        <option value="{{now()->year-$i}}" @if($tahun == now()->year-$i) selected @endif>{{now()->year-$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="inputStatus" name="status">
                                    <option value="">Semua Status</option>
                                    @foreach ($statuss as $status)
                                    <option value="{{$status['id']}}" @if($stts == $status['id']) selected @endif>{{$status['nama']}}</option>
                                    @endforeach
                                </select>
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
                                <th width="1%">No Kontrak</th>
                                <th>Konsumen</th>
                                <th>Pinjaman</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$order->no_kontrak ? $order->no_kontrak : "-"}}</td>
                                <td>{{$order->konsumen->nama}}</td>
                                <td>Rp {{number_format($order->pinjaman_awal,0,",",".")}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        @if(Auth::user()->peran_id == 3)
                                            <button type="button" class="btn btn-icon btn-warning" onclick="window.location.href='{{route('order.edit',$order->id)}}'"><i class="la la-edit"></i></button>
                                        @endif
                                        <button type="button" class="btn btn-icon btn-dark" onclick="window.location.href='{{route('order.show',$order->id)}}'"><i class="la la-file-text"></i></button>
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