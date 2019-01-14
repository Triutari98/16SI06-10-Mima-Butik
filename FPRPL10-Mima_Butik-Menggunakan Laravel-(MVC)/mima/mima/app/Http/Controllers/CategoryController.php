<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Redirect;
use View;

class CategoryController extends Controller
{
    public function datakategori(){
        $data = DB::table('tbl_kategori')->select('id_kategori','nama_kategori')->get();
        return View::make('backend.category')->with('swan',$data)->with(session()->forget('status'));
    }

    public function tambah(){
        $data = array(
            'nama_kategori' => Input::get('nama_kategori')
            );
        DB::table('tbl_kategori')->insert($data);        
        return Redirect::to('/managecategory/data')->with('message','Data kategori berhasil ditambahkan !');
    }

    public function tampilupdate($id){
        $data = DB::table('tbl_kategori')->select('id_kategori','nama_kategori')->where('id_kategori','=',$id)->first();
        return View::make('backend.category')->with('dataEdit',$data)->with(session()->flash('editMessage', "Silahkan ubah data dengan benar ! "));
    }

    public function update($id){
        $data = array(
            'nama_kategori' => Input::get('nama_kategori')
            );

        DB::table('tbl_kategori')->where('id_kategori','=',$id)->update($data);

        return Redirect::to('/managecategory/data')->with('message','Data kategori berhasil diubah !');
    }

    public function delete($id){ 
        DB::table('tbl_kategori')->where('id_kategori','=',$id)->delete();
        return Redirect::to('/managecategory/data')->with('message','Data kategori berhasil dihapus !');
    }
}
