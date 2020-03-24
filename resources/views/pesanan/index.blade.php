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
                    <a href="{{ url('pesanan/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                </p>
            </div>
        </div>
    
    <div class="row">
        <div class="col-md-6">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#semuapesanan" data-toggle="tab">Semua Pesanan</a></li>
              <li><a href="#dicuci" data-toggle="tab">Dicuci</a></li>
              <li><a href="#dikeringkan" data-toggle="tab">Dikeringkan</a></li>
              <li><a href="#disetrika" data-toggle="tab">Disetrika</a></li>
              <li><a href="#selesai" data-toggle="tab">Selesai</a></li>
            </ul>
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Jenis Layanan</th>
                                <th>Tanggal Terima</th>
                                <th>Tanggal Selesai</th>
                                <th>Tanggal Selesai</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <div style="width:60px">
                                        <a href="" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href="" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
 
            </div>
        </div>
    </div>
</div>
 
@endsection