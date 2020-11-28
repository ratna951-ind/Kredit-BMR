@extends('layouts.app')

@section('judul')
    Kas & Bank
@endsection

@push('css')
    
@endpush

@section('isi')
    <section id="form-action-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form class="form form-horizontal" action="{{route('kas_bank.store')}}" method="post" id="createRecord">
                            {{csrf_field()}}
                            @if(count($errors) > 0)
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    @foreach($errors->all() as $message)
                                        <font color="white">{{$message}}</font><br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJenis">Jenis</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control" id="inputJenis" name="jenis">
                                                <option value="">Pilih Jenis</option>
                                                <option value="CO" @if('CO' == old('jenis')) selected @endif>Cash Opname</option>
                                                <option value="PK" @if('PK' == old('jenis')) selected @endif>Pengisian Kas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputMetode">Metode Pembayaran</label>
                                        <div class="col-md-9 mx-auto">
                                            <select class="form-control custom-select" id="inputMetode" name="cara_bayar">
                                                <option value="">Pilih Metode Pembayaran</option>
                                                <option value="B" @if ('B' == old('cara_bayar')) {{'selected'}}@endif>Bank</option>
                                                <option value="C" @if ('C' == old('cara_bayar')) {{'selected'}}@endif>Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="inputJumlah">Jumlah</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="number" id="inputJumlah" class="form-control border-primary" placeholder="Masukan Jumlah" value="{{ old('jumlah') }}" name="jumlah">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <center>
                            <button type="button" class="modal-create btn btn-icon btn-success">Simpan</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    @include('komponen.modalCreate', ['modul' => 'kas & bank'])
@endpush