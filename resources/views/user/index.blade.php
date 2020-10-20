@extends('layouts.app')

@section('judul')
    Data User
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endpush

@section('isi')
    <section id="description" class="card">
        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                <h3 style="padding: 15px 15px"><button type="button" class="btn btn-success btn-sm" onclick="window.location.href='{{route('user.create')}}'"><i class="la la-plus"></i> Tambah</button></h3>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Kios</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Peran</th>
                                <th width="1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td align="center">{{$loop->iteration}}</td>
                                <td>{{$user->kios->nama}}
                                <td>{{$user->nama}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->peran->nama}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-icon btn-warning" onclick="window.location.href='{{route('user.edit',$user->id)}}'"><i class="la la-edit"></i></button>
                                        <button type="button" data-name="{{$user->nama}}" data-id="{{$user->id}}" class="modal-delete btn btn-icon btn-danger"><i class="la la-trash"></i></button>
                                    </div>
                                </td>
                                <form action="{{route('user.destroy', $user->id)}}" method="post" id="deleteRecord{{$user->id}}">
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
    @include('komponen.modalDelete', ['modul' => 'user'])

    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
@endpush