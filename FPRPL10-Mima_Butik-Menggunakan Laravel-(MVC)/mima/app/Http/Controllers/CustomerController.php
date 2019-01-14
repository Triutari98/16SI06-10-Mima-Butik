<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use DB;
use Redirect;
use View;
use Image;

class CustomerController extends Controller
{

    public function datacustomer(){
        $data = DB::table('tbl_customer')->select('id_custom','nama_custom','telp_custom','email','username_c')->get();
        return View::make('backend.konsumen')->with('swan',$data)->with(session()->forget('status'));
    }
}
