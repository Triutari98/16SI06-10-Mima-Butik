<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use DB;
use Redirect;
use View;
use Image;

class ProductController extends Controller
{
    
    public function index()
    {
        //
        return view ('backend.product');
    }

    public function dataproduk(){
        $dataBarang = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.nama_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->get();


        $dataKategori = DB::table('tbl_kategori')->select('id_kategori','nama_kategori')->get();

        return View::make('backend.product')->with('dataBarang',$dataBarang)->with('dataKategori',$dataKategori)->with(session()->forget('status'));
    }

    public function tambah(){
        $foto = Input::file('gambar');
        $img = Image::make(Input::file('gambar'));
        $img -> resize(350,350);
        $img -> save(storage_path('/app/public/'."product-".$foto->getClientOriginalName()));
        $gambar = "product-".$foto->getClientOriginalName();

        $data = array(
            'id_kategori' => Input::get('id_kategori'),
            'nama' => Input::get('nama'),
            'harga' => Input::get('harga'),            
            'stok' => Input::get('stok'),
            'warna' => Input::get('warna'),
            'gambar' => $gambar
            );
        DB::table('tbl_barang')->insert($data);

        return Redirect::to('/manageproduct/data')->with('message','Data homestay berhasil ditambahkan !');
    }

    public function tampilubah($id){
        $data = DB::table('tbl_barang')->select('idBarang','id_kategori','nama','harga','stok','warna','gambar')->where('idBarang','=',$id)->first();
        $dataKategori = DB::table('tbl_kategori')->select('id_kategori','nama_kategori')->get();

        return View::make('backend.product')->with('dataEdit',$data)->with('dataKategori',$dataKategori)->with(session()->flash('editMessage', "Silahkan ubah data dengan benar ! "));
    }

    public function ubah($id){
        $foto = Input::file('gambar');
        $img = Image::make(Input::file('gambar'));
        $img -> resize(350,350);
        $img -> save(storage_path('/app/public/'."product-".$foto->getClientOriginalName()));
        $gambar = "product-".$foto->getClientOriginalName();

        $data = array(
            'id_kategori' => Input::get('id_kategori'),
            'nama' => Input::get('nama'),
            'harga' => Input::get('harga'),            
            'stok' => Input::get('stok'),
            'warna' => Input::get('warna'),
            'gambar' => $gambar
            );

        DB::table('tbl_barang')->where('idBarang','=',$id)->update($data);

        return Redirect::to('/manageproduct/data')->with('message','Data Produk berhasil diubah !');
    }

    public function delete($id){ 
        DB::table('tbl_barang')->where('idBarang','=',$id)->delete();
        return Redirect::to('/manageproduct/data')->with('message','Data Produk berhasil dihapus !');
    }

}
