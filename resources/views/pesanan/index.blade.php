@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-6">
                <h4>{{ $title }}</h4>
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
        <div class="col-sm-6">
            <p align='right'> 
                <a href="{{ url('pesanan/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            </p>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table" id="data_pesanan">
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
                        </tbody>
                    </table>
                </div>
 
            </div>
        </div>
    </div>
</div>
 
@endsection


@section('scripts')

<!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->

<script>
$(document).ready(function(){   
    fill_datatable();
        function fill_datatable(){
            var dataTable = $('#data_pesanan').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "/pesanan",
                },
                columns: [
                    {
                        data: 'no',
                        name: 'no'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'nohp',
                        name: 'nohp'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
    });

</script>

@endsection