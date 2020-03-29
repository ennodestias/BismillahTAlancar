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
                <p align='right'> 
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">Tambah Data</button>
                </p>
            </div>

        <!-- Modal untuk tambah data paket -->
            <!-- Modal -->
                <div id="tambahModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- konten modal-->
                        <div class="modal-content">
                        
                            <!-- heading modal -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambahkan Data Paket</h4>
                            </div>

                            <!-- body modal -->
                            <div class="modal-body">
                                <form id="addpaket">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Paket">
                                    </div>
                
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga Paket">
                                    </div>

                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Satuan">
                                    </div>

                                    <div class="form-group">
                                        <label>Durasi</label>
                                        <input type="text" name="durasi" class="form-control" id="durasi" placeholder="Durasi Pengerjaan">
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
                            <h4 class="modal-title">Edit Paket</h4>
                        </div>

                        <!-- body modal -->
                        <div class="modal-body">
                            <form id="editpaket">
                                <div class="form-group">
                                    <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Paket">
                                    </div>
                
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga Paket">
                                    </div>

                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Satuan">
                                    </div>

                                    <div class="form-group">
                                        <label>Durasi</label>
                                        <input type="text" name="durasi" class="form-control" id="durasi" placeholder="Durasi Pengerjaan">
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
                    <table class="table" id="data_paket">
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
    $('#addpaket').on('submit', function(e){
        e.preventDefault();

        var nama = $('#nama').val();
        var harga = $('#harga').val();
        var satuan = $('#satuan').val();
        var durasi = $('#durasi').val();

        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/paket/add",
            cache:false,
            dataType: "json",
            data: $('#addpaket').serialize(),
            success: function(data){
                window.location = "/paket-laundry";
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
            var dataTable = $('#data_paket').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url: "/paket-laundry",
                },
                columns: [
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'satuan',
                        name: 'satuan'
                    },
                    {
                        data: 'durasi',
                        name: 'durasi'
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
    });

$(document).ready(function(){   
    $('#editpaket').on('submit', function(e){
        e.preventDefault();

        var id = $('#id').val();
        var nama = $('#nama').val();
        var harga = $('#harga').val();
        var satuan = $('#satuan').val();
        var durasi = $('#durasi').val();

        $.ajax({
            type: "PUT",
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            url: "/api/paket/edit/"+id,
            cache:false,
            dataType: "json",
            data: $('#editpaket').serialize(),
            success: function(data){
                window.location = "/paket-laundry";
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

$(document).on('click', '.deletePaket', function(){
    var id = $(this).attr('id');
    $('#confirmModal').modal('show');
  });
  $('#ok_button').click(function(){
    $.ajax({
        type: "DELETE",
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        dataType: "json",
        url: '/api/paket/'+id,
        beforeSend:function(){
          $('#ok_button').text('Deleting...');
        },
        success: function (data) {
          $('#confirmModal').modal('hide');
            $('#data_paket').DataTable().ajax.reload();
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 100;
            toastr.success(data.message);
        }
    });
});

</script>

@endsection