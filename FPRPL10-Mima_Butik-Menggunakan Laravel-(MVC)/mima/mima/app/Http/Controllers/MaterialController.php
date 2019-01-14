<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller
{ public function index()
    {
         return View ('backend.material');
    }

        public function datamaterial(){
        $data = DB::table('tbl_customer')->select('id_custom','nama_custom','telp_custom','email','username_c','password_c')->get();
        return View::make('backend.customer')->with('swan',$data)->with(session()->forget('status'));
    }

    public function customerfrontend(){
        $data = DB::table('tbl_customer')->select('iid_custom','nama_custom','telp_custom','email','username_c','password_c')->get();
        return View::make('frontend.customer')->with('swan',$data)->with(session()->forget('status'));
    }

    public function tambah(){

        DB::table('tbl_customer')->insert($data);

        $data = array(
            'nama_custom' => Input::get('nama_custom'),
            'telp_custom' => Input::get('telp_custom'),            
            'email' => Input::get('email'),
            'username_c' => Input::get('username_c'),
            'password_c' => Input::get('password_c'), 
            );

        return Redirect::to('/managecategory/data')->with('dataInput',$data)->with(session()->flash('editMessage', "Silahkan input data dengan benar ! "));
    }

    public function tampilupdate($id){
        $data = DB::table('tbl_customer')->select('id_custom','nama_custom','telp_custom','email','username_c','password_c')->where('id_custom','=',$id)->first();
        return View::make('backend.customer')->with('dataEdit',$data)->with(session()->flash('editMessage', "Silahkan ubah data dengan benar ! "));
    }

    public function ubah($id){
        $data = array(
            'nama_custom' => Input::get('nama_custom'),
            'telp_custom' => Input::get('telp_custom'),
            'email' => Input::get('email'),
            'username_c' => Input::file('username_c'),
            'password_c' => Input::get('password_c')
            );

        DB::table('tbl_customer')->where('id_custom','=',$id)->update($data);

        return Redirect::to('/managecustomer/data')->with('message','Data customer berhasil diubah !');
    }
}
