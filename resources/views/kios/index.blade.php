@extends('layouts.app')

@section('judul')
    Data Kios
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('isi')
    <section id="description" class="card">
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <h3 style="padding: 15px 15px"><button type="button" class="btn btn-success btn-sm" onclick="window.location.href='{{route('kios.create')}}'"><i class="la la-plus"></i> Tambah</button></h3>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Bank</th>
                                <th>Alamat</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($kioss as $kios)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$kios->kode}}
                                <td>Kios {{$kios->nama}}</td>
                                <td>{{$kios->bank}}</td>
                                <td>{{$kios->alamat}}</td>
                                <td>
                                    <button type="button" data-name="{{$kios->nama}}" data-id="{{$kios->kode}}" class="modal-delete btn btn-icon btn-danger"><i class="la la-trash"></i></button>
                                </td>
                                <form action="{{route('kios.destroy', $kios->kode)}}" method="post" id="deleteRecord{{$kios->kode}}">
                                    {{csrf_field()}}
                                    @method("DELETE")
                                </form>
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
    @include('komponen.modalDelete', ['modul' => 'kios'])
    
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
@endpush