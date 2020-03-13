@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
      <h4>{{ $title }}</h4>
        <div class="box box-warning">
          <div class="box-header">
            <div class="box-body">
               
                <form id="addcustomer">

                  <div class="box-body">
 
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
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <p>
                          <a href="{{ url('customer') }}" class="btn btn-danger">Kembali</a>
                        </p>
                      </div>
                      <div class="col-md-6">
                        <p align="right">
                          <button type="submit" class="btn btn-primary" id="submit">Tambah</button>
                        </p>
                      </div>
                    </div>
                  </div>

                </form>

            </div>
        </div>
    </div>
</div>
 
@endsection

@section('scripts')

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
</script>

@endsection