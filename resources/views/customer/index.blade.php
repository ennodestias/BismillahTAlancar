@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-6">
                <h4>{{ $title }}</h4>
            </div>


        <!-- Modal untuk tambah data pelanggan -->
            <div class="col-sm-6">
                <div class="container">
                    <!-- Tombol untuk menampilkan modal-->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Tambah Data</button>
            
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- konten modal-->
                        <div class="modal-content">
                        
                            <!-- heading modal -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambahkan Data Pelanggan</h4>
                            </div>

                            <!-- body modal -->
                            <div class="modal-body">
                                <form id="addcustomer">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pelanggan">
                                    </div>
                
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Pelanggan">
                                    </div>

                                    <div class="form-group">
                                        <label>No HP</label>
                                        <input type="number" name="nohp" class="form-control" id="nohp" placeholder="No HP Pelanggan">
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

        <!-- Modal untuk edit data pelanggan -->
            <!-- Modal -->
            <div id="editModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- konten modal-->
                    <div class="modal-content">
                    
                        <!-- heading modal -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Data Pelanggan</h4>
                        </div>

                        <!-- body modal -->
                        <div class="modal-body">
                            <form id="editcustomer">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pelanggan" >
                                </div>
            
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat Pelanggan">
                                </div>

                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="number" name="nohp" class="form-control" id="nohp" placeholder="No HP Pelanggan">
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
                            <h5 class="modal-title">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6 align="center" style="margin:0;">Anda yakin ingin menghapus data ini?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        <div class="box box-warning">
            <div class="box-header">

            </div>        
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table" id="data_customer">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
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
    $('#addcustomer').on('submit', function(e){
        e.preventDefault();
        
        var nama = $('#nama').val();
        var alamat = $('#alamat').val();
        var nohp = $('#nohp').val();

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/customer/add",
            cache:false,
            dataType: "json",
            data: $('#addcustomer').serialize(),
            success: function(data){
                window.location = "/customer";
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
    $('#editcustomer').on('submitEdit', function(e){
        e.preventDefault();

        var id = $(this).data('data-id');
        $.get("{{url('/api/customer/edit/"+id"')}}",function (data){
            $('#nama').value(data.nama);
        });
        var nama = $('#nama').val();
        var alamat = $('#alamat').val();
        var nohp = $('#nohp').val();
        
        $.ajax({
            type: "PUT",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/customer/edit/"+id,
            cache:false,
            dataType: "json",
            data: $('#editcustomer').serialize(),
            success: function(data){
                window.location = "/customer";
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
            var dataTable = $('#data_customer').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "/customer",
                },
                columns: [
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

$(document).on('click', '.deleteCustomer', function(){
    var id = $(this).attr('id');
    $('#confirmModal').modal('show');
  });
  $('#ok_button').click(function(){
    $.ajax({
        type: "DELETE",
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        dataType: "json",
        url: '/api/customer/'+id,
        beforeSend:function(){
          $('#ok_button').text('Deleting...');
        },
        success: function (data) {
          $('#confirmModal').modal('hide');
            $('#data_customer').DataTable().ajax.reload();
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.success(data.message);
        }
    });
});

</script>

@endsection