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
                        <div class="row" style="padding: 15px 15px">
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
                                        <button type="button" class="btn btn-icon btn-dark" onclick="window.location.href='{{route('order.show',$order->id)}}'"><i class="la la-file-text"></i></button>
                                        @if($order->status == "O")
                                            <button type="button" data-name="{{$order->konsumen->nama}}" data-id="{{$order->id}}" class="modal-approve btn btn-icon btn-success"><i class="la la-check"></i></button>
                                            <form action="{{route('order.approve', $order->id)}}" method="post" id="approveRecord{{$order->id}}">
                                                {{csrf_field()}}
                                                @method("PUT")
                                            </form>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="window.location.href='{{route('order.edit',$order->id)}}'"><i class="la la-close"></i></button>
                                        @elseif($order->status == "D" && !isset($order->no_kontrak))
                                            <button type="button" data-name="{{$order->konsumen->nama}}" data-id="{{$order->id}}" class="modal-kontrak btn btn-icon btn-success"><i class="la la-edit"></i></button>
                                            <form action="{{route('order.kontrak', $order->id)}}" method="post" id="kontrakRecord{{$order->id}}">
                                                {{csrf_field()}}
                                                @method("PUT")
                                                <input type="hidden" name="no_kontrak" id="inputNoKontrak{{$order->id}}">
                                            </form>
                                        @endif
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
    <div class="modal fade" id="kontrakModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-col-danger">
                <div class="modal-header bg-danger white">
                    <h4 class="modal-title white">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <p align="center">Input No Kontrak</p>
                    <input type="hidden" id="id_kontrak" disabled>
                    <input type="text" class="form-control" id="no_kontrak" placeholder="Masukkan No Kontrak">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger kontrak">Ya</button>
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on("click", ".modal-kontrak", function () {
            $('#id_kontrak').val($(this).data('id'));
            $('#kontrakModal').modal('show');
        });
        $('.modal-footer').on('click', '.kontrak', function() {
            id = $('#id_kontrak').val();
            $('#inputNoKontrak'+id).val($('#no_kontrak').val()); 
            event.preventDefault();
            document.getElementById('kontrakRecord'+id).submit();
        });
    </script>
    @include('komponen.modalApprove', ['modul' => 'order konsumen'])
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                "ordering": false
            } );
        } );
    </script>
@endpush