<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;

class Paket_controller extends Controller
{
    public function index(Request $request){
        $title = 'Data Paket';
        $data = Paket::get();
        if(request()->ajax()){
            return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($paket){

                    $btn = '<a class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<button type="button" name="delete" id="'.$paket->id.'" class="btn btn-danger btn-sm deletePaket" ><i class="fa fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('paket.index',compact('title','data'));
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

    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Data Paket berhasil dihapus']);
    }

}
