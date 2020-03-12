@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-6">
                <div id="datatable_filter" class="datatable_filter">
                    <label>
                        <input type="search" class="form-control input-sm" placeholder="&#xF002;  Cari paket ..." style="font-family:Arial, FontAwesome; font-weight: normal">
                    </label>
                </div>
            </div>
            <div class="col-sm-6">
                <p align='right'> 
                    <a href="{{ url('paket-laundry/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </p>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header">    
                <div class="row">
                    <div class="col-sm-6">
                        <h4>{{ $title }}</h4> 
                    </div>
                    <div class="col-sm-6">
                        <div class="dataTables_length" id="datatable_length" style="float:right">
                            Tampilkan
                            <label>
                                <select name="datatable_length" aria-controls="datatable" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Satuan</th>
                                <th>Durasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($paket as $pakets)
                            <tr>
                                <th>{{ $pakets -> nama }}</th>
                                <th>{{ $pakets -> harga }}</th>
                                <th>{{ $pakets -> satuan }}</th>
                                <th>{{ $pakets -> durasi }}</th>
                                <th>
                                    <div style="width:60px">
                                        <a href="{{ route('paket.edit', $pakets->id)}}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href="{{ url('paket-laundry/') }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
 
            </div>
        </div>
    </div>
</div>
 
@endsection