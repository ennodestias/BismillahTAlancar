<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Riwayat;

class Riwayat_controller extends Controller
{
    public function index(Request $request){
        $title = 'Riwayat transaksi';
        $data = Riwayat::get();
        if(request()->ajax()){
            return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($riwayat){

                    $btn = '<a class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o"></i></a>';
                    $btn .= '&nbsp;&nbsp;';
                    $btn .= '<button type="button" name="delete" id="'.$riwayat->id.'" class="btn btn-danger btn-sm deleteKaryawan" ><i class="fa fa-trash"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('riwayat.index',compact('title','data'));
    }
}
