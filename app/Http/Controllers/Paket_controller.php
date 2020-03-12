<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;

class Paket_controller extends Controller
{
    public function index(){
        $title = 'Paket Laundry';
        $paket = Paket::get();
        return view('paket.index',compact('title','paket'));
    }

    public function add(){
        $title = 'Tambah Paket Laundry';

        return view('paket.add',compact('title'));
    }

    public function edit($id){
        $title = 'Edit Paket Laundry';
        $paket = Paket::findOrFail($id);

        return view('paket.edit',compact('title','paket'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
            'durasi' => 'required',
        ]);

        $paket = Paket::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'durasi' => $request->durasi,
        ]);

        $paket->save();
        return response()->json(['message' => 'Data Paket berhasil ditambahkan']);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
            'durasi' => 'required',
        ]);

        $paket = Paket::findOrFail($id);
        $paket->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'durasi' => $request->durasi,
        ]);

        $paket->save();
        return response()->json(['message' => 'Data Paket berhasil diubah']);
    }
}
