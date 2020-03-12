<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Customer_controller extends Controller
{
    public function index(){
        $title = 'Data Pelanggan';

        return view('customer.index',compact('title'));
    }

    public function add(){
        $title = 'Tambah Pelanggan';

        return view('customer.add',compact('title'));
    }

    public function edit(){
        $title = 'Edit Data Pelanggan';

        return view('customer.edit',compact('title'));
    }
}
