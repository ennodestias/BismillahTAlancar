@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-6">
                <h4>{{ $title }}</h4>
            </div>
            
            <!-- Tombol untuk menampilkan modal-->
            <div class="col-sm-6">
                <p align="right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Data</button>
                </p>
            </div>

            <!-- Modal untuk tambah data pelanggan -->
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

        <!-- Modal untuk edit data pelanggan -->
            <!-- Modal -->
            <div id="editModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content">
                    
                        <!-- heading modal -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Data Karyawan</h4>
                        </div>

                        <!-- body modal -->
                        <div class="modal-body">
                            <form id="editkaryawan">
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
                                    <button type="submit" class="btn btn-primary" id="submitEdit">Perbarui</button>
                                </div>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal untuk menghapus data -->
            <div id="confirmModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4 align="center">Apakah Anda yakin ingin menghapus data ini?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table" id="data_karyawan">
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

$(document).ready(function(){   
    $('#editkaryawan').on('submitEdit', function(e){
        e.preventDefault();

        var id = $(this).data('data-id');
        $.get("{{url('/api/karyawan/edit/"+id"')}}",function (data){
            $('#nama').value(data.nama);
        });
        var nama = $('#nama').val();
        var nohp = $('#nohp').val();
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
            type: "PUT",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/karyawan/edit/"+id,
            cache:false,
            dataType: "json",
            data: $('#editkaryawan').serialize(),
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

$(document).ready(function(){   
    fill_datatable();
        function fill_datatable(){
            var dataTable = $('#data_karyawan').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "/karyawan",
                },
                columns: [
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'nohp',
                        name: 'nohp'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'password',
                        name: 'password'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
    });

$(document).on('click', '.deleteKaryawan', function(){
    var id = $(this).attr('id');
    $('#confirmModal').modal('show');
  });
  $('#ok_button').click(function(){
    $.ajax({
        type: "DELETE",
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        dataType: "json",
        url: '/api/karyawan/'+id,
        beforeSend:function(){
          $('#ok_button').text('Deleting...');
        },
        success: function (data) {
          $('#confirmModal').modal('hide');
            $('#data_karyawan').DataTable().ajax.reload();
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.success(data.message);
        }
    });
});
</script>

@endsection