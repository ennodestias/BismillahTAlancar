<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class Customer_controller extends Controller
{
    public function index(Request $request){
        $title = 'Data Pelanggan';
        $data = Customer::get();
        if(request()->ajax()){
            return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($customer){

                    $btn = '<a class="btn btn-warning btn-xs btn-edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<button type="button" name="delete" id="'.$customer->id.'" class="btn btn-danger btn-sm deleteCustomer" ><i class="fas fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('customer.index',compact('title','data'));
    }

    public function add(){
        $title = 'Tambah Pelanggan';

        return view('customer.add',compact('title'));
    }

    public function edit($id){
        $title = 'Edit Data Pelanggan';
        $customer = Customer::findOrFail($id);

        return response()->json($customer);
        // return view('customer.edit',compact('title','customer'));
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

    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Data Pelanggan berhasil dihapus']);
    }
}
