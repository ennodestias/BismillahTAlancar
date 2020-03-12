@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
      <h4>{{ $title }}</h4>
        <div class="box box-warning">
          <div class="box-header">
            <div class="box-body">
               
                <form role="form" method="post" action="{{ url('customer/add') }}">
                    @csrf
                  <div class="box-body">
 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Pelanggan">
                    </div>
 
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Alamat Pelanggan">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">No HP</label>
                      <input type="number" name="nohp" class="form-control" id="exampleInputPassword1" placeholder="No HP Pelanggan">
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
                          <button type="submit" class="btn btn-primary">Tambah</button>
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