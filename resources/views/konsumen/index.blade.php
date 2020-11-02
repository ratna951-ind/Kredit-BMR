@extends('layouts.app')

@section('judul')
    Data Konsumen
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('isi')
    <section id="description" class="card">
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <h3 style="padding: 15px 15px"><button type="button" class="btn btn-success btn-sm" onclick="window.location.href='{{route('konsumen.create')}}'"><i class="la la-plus"></i> Tambah</button></h3>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($konsumens as $konsumen)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$konsumen->nama}}</td>
                                <td>{{$konsumen->telp}}</td>
                                <td>{{$konsumen->alamatskrng}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-icon btn-warning" onclick="window.location.href='{{route('konsumen.edit',$konsumen->nik)}}'"><i class="la la-edit"></i></button>
                                        <button type="button" class="btn btn-icon btn-dark" onclick="window.location.href='{{route('konsumen.show',$konsumen->nik)}}'"><i class="la la-file-text"></i></button>
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
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
@endpush