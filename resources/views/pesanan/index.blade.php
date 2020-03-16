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

            <div class="row">
        <div class="col-md-6">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#semuapesanan" data-toggle="tab">Semua Pesanan</a></li>
              <li><a href="#dicuci" data-toggle="tab">Dicuci</a></li>
              <li><a href="#dikeringkan" data-toggle="tab">Dikeringkan</a></li>
              <li><a href="#disetrika" data-toggle="tab">Disetrika</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="semuapesanan">
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="dicuci">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


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