<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Redirect;
use View;

class OngkirController extends Controller
{
    public function dataongkir(){
        $data = DB::table('tbl_ongkir')->select('id_ongkir','nama_kota','harga_kota')->get();
        return View::make('backend.ongkir')->with('swan',$data)->with(session()->forget('status'));
    }

    public function tambah(){
        $data = array(
            'nama_kota' => Input::get('nama_kota'),
            'harga_kota' => Input::get('harga_kota')
        );
        DB::table('tbl_ongkir')->insert($data);        
        return Redirect::to('/manageongkir/data')->with('message','Data ongkir berhasil ditambahkan !');
    }

    public function tampilupdate($id){
        $data = DB::table('tbl_ongkir')->select('id_ongkir','nama_kota','harga_kota')->where('id_ongkir','=',$id)->first();
        return View::make('backend.ongkir')->with('dataEdit',$data)->with(session()->flash('editMessage', "Silahkan ubah data dengan benar ! "));
    }

    public function update($id){
        $data = array(
            'nama_kota' => Input::get('nama_kota'),
            'harga_kota' => Input::get('harga_kota')
        );

        DB::table('tbl_ongkir')->where('id_ongkir','=',$id)->update($data);

        return Redirect::to('/manageongkir/data')->with('message','Data ongkir berhasil diubah !');
    }

    public function delete($id){ 
        DB::table('tbl_ongkir')->where('id_ongkir','=',$id)->delete();
        return Redirect::to('/manageongkir/data')->with('message','Data ongkir berhasil dihapus !');
    }
}
