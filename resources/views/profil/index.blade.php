@extends('layouts.app')

@section('judul')
    Data Profil
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <style>
        table {
            margin-bottom: 15px;
        }
        th, td {
            padding-top: 5px;
            padding-left: 5px;
            padding-right: 5px;
            padding-bottom: 15px;
        }
    </style>
@endpush

@section('isi')
    <section id="description">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <table>
                            <tbody>
                                <tr>
                                    <th style="width: 30%">Nama</th>
                                    <td>: {{Auth::user()->nama}}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>: {{Auth::user()->username}}</td>
                                </tr>
                                <tr>
                                    <th>Kios</th>
                                    <td>: {{Auth::user()->kios->nama}}</td>
                                </tr>
                                <tr>
                                    <th>Peran</th>
                                    <td>: {{Auth::user()->peran->nama}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="text-align: center"><button type="button" class="btn btn-icon btn-warning" onclick="window.location.href='{{route('profile.edit')}}'">Ubah</button></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </section>
@endsection

@push('js')

@endpush