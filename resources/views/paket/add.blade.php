@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="box-header">
          <h4>{{ $title }}</h4>
        </div>
        <div class="box box-warning">
          <div class="box-body">
                <form id="addpaket">

                  <div class="box-body">
 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Paket">
                    </div>
 
                    <div class="form-group">
                      <label for="exampleInputPassword1">Harga</label>
                      <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Paket">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Satuan</label>
                      <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Satuan">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Durasi</label>
                      <input type="text" name="durasi" class="form-control" id="durasi" placeholder="Durasi Pengerjaan">
                    </div>
                   
                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <p>
                          <a href="{{ url('paket-laundry') }}" class="btn btn-danger">Kembali</a>
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
</script>

@endsection