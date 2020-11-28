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
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Kios</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kioss as $kios)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td>Kios {{$kios->nama}}</td>
                                    <td><button type="button" class="btn btn-icon btn-dark" onclick="window.location.href='{{route('laporan.order.detail',$kios->kode)}}'"><i class="la la-file-text"></i></button></td>
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
