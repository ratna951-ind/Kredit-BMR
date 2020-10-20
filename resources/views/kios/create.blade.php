@extends('layouts.app')

@section('judul')
    Tambah Data Kios
@endsection

@push('css')
    
@endpush

@section('isi')
    <section id="form-action-layouts">
        <div class="row match-height">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <form class="form form-horizontal" action="{{route('kios.store')}}" method="post" id="createRecord">
                            {{csrf_field()}}
                            @if(count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    @foreach($errors->all() as $message)
                                        <font color="white">{{$message}}</font><br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="inputKode">Kode</label>
                                <div class="col-md-10 mx-auto">
                                    <input type="number" id="inputKode" class="form-control decimal-inputmask" placeholder="Masukan Kode" name="kode" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="inputNama">Nama</label>
                                <div class="col-md-10 mx-auto">
                                    <input type="text" id="inputNama" class="form-control" placeholder="Masukan Nama" name="nama" required>
                                </div>
                            </div>
                        </form>
                        <center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('kios.index')}}'">Batal</button>
                                <button type="button" class="modal-create btn btn-icon btn-success right">Simpan</button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </section>
@endsection

@push('js')
    @include('komponen.modalCreate', ['modul' => 'kios'])
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){$("#datatable").DataTable()});
    </script>
@endpush