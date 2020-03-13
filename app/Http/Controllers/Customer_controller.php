<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class Customer_controller extends Controller
{
    public function index(){
        $title = 'Data Pelanggan';
        $customer = Customer::get();
        return view('customer.index',compact('title','customer'));
    }

    public function add(){
        $title = 'Tambah Pelanggan';

        return view('customer.add',compact('title'));
    }

    public function edit($id){
        $title = 'Edit Data Pelanggan';
        $customer = Customer::findOrFail($id);

        return view('customer.edit',compact('title','customer'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);

        $customer = Customer::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ]);

        $customer->save();
        return response()->json(['message' => 'Data Pelanggan berhasil ditambahkan']);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ]);

        $customer->save();
        return response()->json(['message' => 'Data Pelanggan berhasil diubah']);
    }
}
