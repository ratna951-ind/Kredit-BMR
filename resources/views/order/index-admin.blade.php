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
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Konsumen</th>
                                <th>MCE</th>
                                <th>Pinjaman</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$order->konsumen->nama}}</td>
                                <td>{{$order->user->nama}}</td>
                                <td>Rp {{number_format($order->pinjaman_awal,0,",",".")}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-icon btn-info" onclick="window.location.href='{{route('order.show',$order->id)}}'"><i class="la la-print"></i></button>
                                        <button type="button" class="btn btn-icon btn-success" onclick="window.location.href='{{route('order.accept',$order->id)}}'"><i class="la la-money"></i></button>
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