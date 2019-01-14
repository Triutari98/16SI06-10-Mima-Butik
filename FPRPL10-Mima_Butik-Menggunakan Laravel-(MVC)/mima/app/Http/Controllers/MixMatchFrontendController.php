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

class MixMatchFrontendController extends Controller
{
    public function datamixmatch(){
        $dataAtasan = DB::table('tbl_mix_match')->join('tbl_detailmix_match', function($join){
            $join->on('tbl_mix_match.id_mix_match','=','tbl_detailmix_match.id_mix_match');
        })->join('tbl_barang', function($join){
            $join->on('tbl_barang.idBarang','=','tbl_detailmix_match.idBarang');
        })->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_mix_match.nama_mm','tbl_mix_match.harga','tbl_barang.nama','tbl_barang.gambar','tbl_kategori.nama_kategori')->where('tbl_kategori.nama_kategori', 'like', 'atasan')->get();
        // dd($dataAtasan);

        $dataBawahan = DB::table('tbl_mix_match')->join('tbl_detailmix_match', function($join){
            $join->on('tbl_mix_match.id_mix_match','=','tbl_detailmix_match.id_mix_match');
        })->join('tbl_barang', function($join){
            $join->on('tbl_barang.idBarang','=','tbl_detailmix_match.idBarang');
        })->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_mix_match.id_mix_match','tbl_mix_match.nama_mm','tbl_mix_match.harga','tbl_barang.nama','tbl_barang.gambar','tbl_kategori.nama_kategori')->where('tbl_kategori.nama_kategori', 'like', 'bawahan')->get();
        // dd($dataBawahan);

        $dataKerudung = DB::table('tbl_mix_match')->join('tbl_detailmix_match', function($join){
            $join->on('tbl_mix_match.id_mix_match','=','tbl_detailmix_match.id_mix_match');
        })->join('tbl_barang', function($join){
            $join->on('tbl_barang.idBarang','=','tbl_detailmix_match.idBarang');
        })->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_mix_match.nama_mm','tbl_mix_match.harga','tbl_barang.nama','tbl_barang.gambar','tbl_kategori.nama_kategori')->where('tbl_kategori.nama_kategori', 'like', 'kerudung')->get();
        // dd($dataKerudung);

        $dataMixMatch = DB::table('tbl_mix_match')->get();
        // dd($dataMixMatch);

        return View::make('frontend.mix_match')->with('dataAtasan',$dataAtasan)->with('dataBawahan',$dataBawahan)->with('dataKerudung',$dataKerudung)->with('dataMixMatch',$dataMixMatch)->with(session()->forget('status'));
    }

}
