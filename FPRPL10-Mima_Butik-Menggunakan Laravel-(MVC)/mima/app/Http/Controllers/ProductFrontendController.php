<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use View;
use Image;

class ProductFrontendController extends Controller
{
    
    public function produkatasan(){
        $data = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'atasan')->get();
        return View::make('frontend.atasan')->with('swan',$data)->with(session()->forget('status'));
    }

    public function produkbawahan(){
        $data = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'bawahan')->get();
        return View::make('frontend.bawahan')->with('swan',$data)->with(session()->forget('status'));
    }

    public function produkgamis(){
        $data = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'gamis')->get();
        return View::make('frontend.gamis')->with('swan',$data)->with(session()->forget('status'));
    }

    public function produkkerudung(){
        $data = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'kerudung')->get();
        return View::make('frontend.kerudung')->with('swan',$data)->with(session()->forget('status'));
    }
}
