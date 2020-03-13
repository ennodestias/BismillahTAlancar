@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-body">
               
                <form id="editpaket">
                  <div class="box-body">
 
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" value="{{$paket->nama}}" class="form-control" id="nama" placeholder="Nama Paket">
                      <input type="hidden" name="id" value="{{$paket->id}}" class="form-control" id="id">
                    </div>
 
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="number" name="harga" value="{{$paket->harga}}" class="form-control" id="harga" placeholder="Harga Paket">
                    </div>

                    <div class="form-group">
                      <label>Satuan</label>
                      <input type="text" name="satuan" value="{{$paket->satuan}}" class="form-control" id="satuan" placeholder="Satuan">
                    </div>

                    <div class="form-group">
                      <label>Durasi</label>
                      <input type="text" name="durasi" value="{{$paket->durasi}}" class="form-control" id="durasi" placeholder="Durasi Pengerjaan">
                    </div>
                   
                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <p>
                          <a href="{{ url('paket-laundy') }}" class="btn btn-danger">Kembali</a>
                        </p>
                      </div>
                      <div class="col-md-6">
                        <p align="right">
                          <button type="submit" id="submit" class="btn btn-primary">Perbarui</button>
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
</script>

@endsection