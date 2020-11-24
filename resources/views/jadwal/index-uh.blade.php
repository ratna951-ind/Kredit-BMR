@extends('layouts.app')

@section('judul')
    Data Jadwal
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('isi')
    <section id="description" class="card">
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <h3 style="padding: 15px 15px"><button type="button" class="btn btn-success btn-sm" onclick="window.location.href='{{route('jadwal.create')}}'"><i class="la la-plus"></i> Tambah</button></h3>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>MCE</th>
                                <th>Konsumen</th>
                                <th>Pinjaman</th>
                                <th width="1%">STNK</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($jadwals as $jadwal)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$jadwal->user->nama}}</td>
                                <td>{{$jadwal->konsumen->nama}}</td>
                                <td>Rp {{number_format($jadwal->pinjaman_awal,0,",",".")}}</td>
                                <td><img src="{{route('image', ['jadwal_order', $jadwal->stnk])}}" alt="Gambar STNK" width="200px"></td>
                                <td><button type="button" class="btn btn-icon btn-warning" onclick="window.location.href='{{route('jadwal.edit',$jadwal->id)}}'"><i class="la la-edit"></i></button></td>
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