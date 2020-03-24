@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-6">
                    <h4>{{$title}}</h4>
                </div>
            </div>
        </div> 
<div class="row">
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Pilih Produk</h4>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Paket *</label>
                                <input type="text" name="paket" class="form-control" id="paket">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Produk *</label>
                                <input type="text" name="produk" class="form-control" id="produk">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Kuantitas *</label>
                                <input type="text" name="kuantitas" class="form-control" id="kuantitas" placeholder="Contoh: 1">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Contoh: Baju Luntur">
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <button type="submit" class="btn btn-primary" id="submit">Tambah Ke Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Keranjang</h4>
                        <div class="row">
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>
                                                    <div style="width:60px">
                                                        <a class="btn btn-warning btn-xs btn-edit"><i class="fa fa-pencil-square-o"></i></a>
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
                <div class="col-sm-4">
                    <div class="row-sm-2">
                        <h4><b>Total Harga</h4>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h4>Rp. 10.000</h4>
                    </div>
                </div>
                <div class="row-sm-4">
                    <button type="submit" class="btn btn-warning" id="submit" data-toggle="modal" data-target="#selanjutnya">Selanjutnya</button>
                </div> 
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk tambah data pelanggan -->
<div class="col-sm-6">
    <div class="container">

    <!-- Modal -->
    <div id="selanjutnya" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
            
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ringkasan Transaksi</h4>
                </div>

                <!-- body modal -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6>Nama Pelanggan</h6>
                            <h6>Nomor Pelanggan</h6>
                            <p>Total</p>
                        </div>
                        <div class="col">
                            <h6>: Siska Andriani</h6>
                            <h6>: 08123456789</h6>
                            <p>Rp. 10.000</p>
                        </div>
                    </div>
                    <p align="right">
                        <button type="submit" class="btn btn-warning" id="submit">Print</button>
                        <button type="submit" class="btn btn-warning" id="submit">Kirim Nota</button>
                    </p>
                </div>

                <div class="modal-body">
                <hr>
                <p class="modal-title">Rincian Biaya</p>
                    <div class="row">
                        <div class="col-sm-3">
                            <h5 style="color:#199BEE"><b>2x</h5>
                        </div>
                        <div class="col-sm-6">
                            <h5>1 Kg @ Cuci komplit 3 hari</h5>
                            <h6 href="#" style="color:#199BEE">Edit</h6>
                        </div>
                        <div class="col-sm-2">
                            <h5>Rp. 4.000</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-9">
                            <p>Total Harga</p>
                        </div>
                        <div class="col-sm-2">
                            <p>Rp. 4.000</p>
                        </div>
                    </div>
                </div>

                <div class="modal-body">
                <hr>
                <p class="modal-title">Keterangan</p>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6>Dikerjakan Oleh</h6>
                            <h6>Diterima Tanggal</h6>
                            <h6>Selesai Tanggal</h6>
                            <h6>Pakai Parfum</h6>
                            <h6>Disimpan di</h6>
                            <h6>Keterangan Tambahan</h6>
                        </div>
                        <div class="col">
                            <h6>: Alugoro Gandhi Mukti</h6>
                            <h6>: 02 Februari 2020</h6>
                            <h6>: 05 Februari 2020</h6>
                            <h6>: Ya. Downy</h6>
                            <h6>: Rak sky, Nomor 21B</h6>
                            <h6>: Warna baju luntur</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>

@endsection