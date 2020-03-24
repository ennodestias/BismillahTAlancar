@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-sm-6">
                <div id="datatable_filter" class="datatable_filter">
                    <label>
                        <input type="search" class="form-control input-sm" placeholder="&#xF002;  Cari karyawan ..." style="font-family:Arial, FontAwesome; font-weight: normal">
                    </label>
                </div>
            </div>

            <!-- Modal untuk tambah data pelanggan -->
            <div class="col-sm-6">
                <div class="container">
                    <!-- Tombol untuk menampilkan modal-->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addModal">Tambah Data</button>
            
                <!-- Modal -->
                <div id="addModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- konten modal-->
                        <div class="modal-content">
                        
                            <!-- heading modal -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambahkan Data Karyawan</h4>
                            </div>

                            <!-- body modal -->
                            <div class="modal-body">
                                <form id="addkaryawan">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Karyawan">
                                    </div>

                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="number" name="nohp" class="form-control" id="nohp" placeholder="No HP Karyawan">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Email Karyawan">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" id="password" placeholder="Password Karyawan">
                                    </div>
                            </div>

                            <!-- footer modal -->
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary" id="submit">Tambah</button>
                                    </div>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>

                    </div>
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
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($karyawan as $karyawans)
                            <tr>
                                <th>{{ $karyawans -> nama }}</th>
                                <th>{{ $karyawans -> nohp }}</th>
                                <th>{{ $karyawans -> email }}</th>
                                <th>{{ $karyawans -> password }}</th>
                                <th>
                                    <div style="width:60px">
                                        <a href="" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                        <button href="" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
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

@section('scripts')

<script>
$(document).ready(function(){   
    $('#addkaryawan').on('submit', function(e){
        e.preventDefault();
        
        var nama = $('#nama').val();
        var nohp = $('#nohp').val();
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/karyawan/add",
            cache:false,
            dataType: "json",
            data: $('#addkaryawan').serialize(),
            success: function(data){
                window.location = "/karyawan";
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.message);
            },
            error: function(error){
            console.log(error);
            }
        });
    });
});
</script>

@endsection