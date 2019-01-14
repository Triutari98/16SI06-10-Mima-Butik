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

class MixAndMatchController extends Controller
{
    public function datamixandmatch(){
        $data = DB::table('tbl_mix_match')->select('id_mix_match','nama_mm','harga')->get();

        $dataAtasan = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'atasan')->get();

        $dataBawahan = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'bawahan')->get();

        $dataKerudung = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'kerudung')->get();

        return View::make('backend.mixandmatch')->with('swan',$data)->with('dataKerudung',$dataKerudung)->with('dataAtasan',$dataAtasan)->with('dataBawahan',$dataBawahan)->with(session()->forget('status'));

    }

    public function viewMM($id){
        $data = DB::table('tbl_detailmix_match')->join('tbl_mix_match', function($join){
            $join->on('tbl_detailmix_match.id_mix_match','=','tbl_mix_match.id_mix_match');
        })->join('tbl_barang', function($join){
            $join->on('tbl_detailmix_match.idBarang','=','tbl_barang.idBarang');
        })->select('tbl_mix_match.nama_mm','tbl_mix_match.harga','tbl_barang.nama','tbl_barang.warna','tbl_barang.gambar')->where('tbl_mix_match.id_mix_match','=',$id)->get();    

        // dd('$data');
        
        return View::make('backend.mixandmatchdetail')->with('swan',$data)->with(session()->forget('status'));
    }

    public function tambah(Request $request){
        $data = array(
            'nama_mm' => Input::get('nama_mm'),
            'harga' => Input::get('harga'),
        );
        $getIdMixMatch = DB::table('tbl_mix_match')->insertGetId($data);      
        $Barang_array = Input::get('idBarang');
        $array_len = count($Barang_array);
        for($i=0;$i<$array_len;$i++){
            $barang = $Barang_array[$i];

            $data2  = array(
            'id_mix_match' => $getIdMixMatch,
            'idBarang' => $barang
            );
            DB::table('tbl_detailmix_match')->insert($data2);  

        }

        return Redirect::to('/managemixandmatch/data')->with('message','Data Mix and Match berhasil ditambahkan !');
    }

    public function tampilupdate($id){
        $data = DB::table('tbl_detailmix_match')->join('tbl_mix_match', function($join){
            $join->on('tbl_detailmix_match.id_mix_match','=','tbl_mix_match.id_mix_match');
        })->join('tbl_barang', function($join){
            $join->on('tbl_detailmix_match.idBarang','=','tbl_barang.idBarang');
        })->select('tbl_mix_match.id_mix_match','tbl_mix_match.nama_mm','tbl_mix_match.harga','tbl_barang.idBarang','tbl_barang.nama','tbl_barang.warna','tbl_barang.gambar')->where('tbl_mix_match.id_mix_match','=',$id)->first();

        // dd($data);

        $dataAtasan = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'atasan')->get();

        $dataBawahan = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'bawahan')->get();

        $dataKerudung = DB::table('tbl_barang')->join('tbl_kategori', function($join){
            $join->on('tbl_barang.id_kategori','=','tbl_kategori.id_kategori');
        })->select('tbl_barang.idBarang','tbl_kategori.id_kategori','tbl_barang.nama','tbl_barang.harga','tbl_barang.stok','tbl_barang.warna','tbl_barang.gambar')->where('tbl_kategori.nama_kategori', 'like', 'kerudung')->get();



        return View::make('backend.mixandmatch')->with('dataEdit',$data)->with('dataKerudung',$dataKerudung)->with('dataAtasan',$dataAtasan)->with('dataBawahan',$dataBawahan)->with(session()->flash('editMessage', "Silahkan ubah data dengan benar ! "));
    }

    public function update($id,Request $request){
        DB::table('tbl_detailmix_match')->where('id_mix_match','=',$id)->delete();
        $data = array(
            'nama_mm' => Input::get('nama_mm'),
            'harga' => Input::get('harga'),
        );
        DB::table('tbl_mix_match')->where('id_mix_match','=',$id)->update($data);      
        $Barang_array = Input::get('idBarang');
        $array_len = count($Barang_array);
        for($i=0;$i<$array_len;$i++){
            $barang = $Barang_array[$i];

            $data2  = array(
            'id_mix_match' => $id,
            'idBarang' => $barang
            );
            DB::table('tbl_detailmix_match')->insert($data2);  

        }

        return Redirect::to('/managemixandmatch/data')->with('message','Data Mix and Match berhasil ditambahkan !');
    }

    public function delete($id){ 
        DB::table('tbl_mix_match')->where('id_mix_match','=',$id)->delete();
        return Redirect::to('/managemixandmatch/data')->with('message','Data Mix and Match berhasil dihapus !');
    }
}
