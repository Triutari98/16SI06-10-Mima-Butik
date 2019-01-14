@extends('layouts.backend')
@section('content')
<main class="main">    
  <div class="container-fluid">
    <div class="animated fadeIn">
      <h4>  Manajemen Produk<br>
       <small>Data Produk</small>
      </h4>         
        <div class="row">                
          <div class="col-md-12">
            @if(!Session::has('editMessage'))
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Produk</div>
                <div class="card-body">
                       	<br>
                    <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Kategori</th>
                          <th>Nama Produk</th>
                          <th>Harga</th>
                          <th>Warna</th>
                          <th>Stok</th>
                          <th>Gambar</th>  
                          <th>Action</th>                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dataBarang as $datas)
                        <tr>
                          <td>{{$datas->idBarang}}</td>
                          <td>{{$datas->nama_kategori}}</td>
                          <td>{{$datas->nama}}</td>
                          <td>{{$datas->harga}}</td>
                          <td>{{$datas->warna}}</td>
                          <td>{{$datas->stok}}</td>
                          <td width="10%"><img src="{{URL::asset('../storage/app/public')}}/{{$datas->gambar}}" style="max-width:300px;max-height:200px;float:center;border: 0px;border-radius: 5px;" /></td>

                          <td width="19%"><a href="{{URL('/manageproduct/data/delete')}}/{{$datas->idBarang}}"><button class="btn btn-sm" style="background-color: red; color: white;">Delete</button></a> <a href="{{URL('/manageproduct/data/update')}}/{{$datas->idBarang}}"><button class="btn btn-sm" style="background-color: black; color: white;">Edit</button></a>  </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <nav>
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#">Prev</a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">4</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                    </nav>
                </div>
              </div>
              @endif

              
              @if(!Session::has('editMessage'))
              <div class="card">
                  <div class="card-header">
                    <strong>Input </strong>Data Produk</div>
                  <div class="card-body">
                    <form role="form" class="form-horizontal" action="{{url('/manageproduct/data/prosescreate')}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Kategori</label>
                        <div class="col-md-9">
                          <select class="form-control" name="id_kategori" >
                            @foreach($dataKategori as $datas)
                            <option id="{{$datas->id_kategori}}" value="{{$datas->id_kategori}}">( {{$datas->id_kategori}} ) {{$datas->nama_kategori}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama</label>
                        <div class="col-md-9">
                          <input class="form-control" type="text" name="nama" placeholder="Text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Harga</label>
                        <div class="col-md-9">
                          <input class="form-control" id="text-input" type="text" name="harga" placeholder="Text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Warna</label>
                        <div class="col-md-9">
                          <select class="form-control" id="select1" name="warna">
                            <option value="Biru">Biru</option>
                            <option value="Kuning">Kuning</option>
                            <option value="Hitam">Hitam</option>
                            <option value="Putih">Putih</option>
                            <option value="Merah">Merah</option>
                            <option value="Hijau">Hijau</option>
                            <option value="Coklat">Coklat</option>
                            <option value="Abu-abu">Abu-abu</option>  
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Stok</label>
                        <div class="col-md-9">
                          <input class="form-control" id="text-input" type="text" name="stok" placeholder="Text">
                        </div>
                      </div>     
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="file-multiple-input">Upload Photo</label>
                        <div class="col-md-9">
                          <input id="gambar" type="file" name="gambar" multiple="">
                        </div>
                      </div> 
                      <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                          <i class="fa fa-dot-circle-o"></i> Submit</button>
                      </div>                
                    </form>
                  </div>
                </div>
                @endif

                @if(Session::has('editMessage'))
                <div class="card">
                  <div class="card-header">
                    <strong>Edit </strong>Data Produk</div>
                  <div class="card-body">
                    <form role="form" class="form-horizontal" action="{{url('/manageproduct/data/prosesupdate')}}/{{$dataEdit->idBarang}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1" >Kategori</label>
                        <div class="col-md-9">
                          <select class="form-control" name="id_kategori" >
                            @foreach($dataKategori as $datas)
                            <option id="{{$datas->id_kategori}}" value="{{$datas->id_kategori}}">( {{$datas->id_kategori}} ) {{$datas->nama_kategori}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama</label>
                        <div class="col-md-9">
                          <input class="form-control" type="text" name="nama" placeholder="Text" value="{{$dataEdit->nama}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Harga</label>
                        <div class="col-md-9">
                          <input class="form-control" id="text-input" type="text" name="harga" placeholder="Text" value="{{$dataEdit->harga}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Warna</label>
                        <div class="col-md-9">
                          <select class="form-control" id="select1" name="warna"  value="{{$dataEdit->warna}}">
                            <option value="Biru">Biru</option>
                            <option value="Kuning">Kuning</option>
                            <option value="Hitam">Hitam</option>
                            <option value="Putih">Putih</option>                            
                            <option value="Merah">Merah</option>
                            <option value="Hijau">Hijau</option>
                            <option value="Coklat">Coklat</option>
                            <option value="Abu-abu">Abu-abu</option>  
                          </select>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Stok</label>
                        <div class="col-md-9">
                          <input class="form-control" id="text-input" type="text" name="stok" placeholder="Text"  value="{{$dataEdit->stok}}">
                        </div>
                      </div>     
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="file-multiple-input">Upload Photo</label>
                        <div class="col-md-9">
                          <input id="gambar" type="file" name="gambar" multiple="">
                        </div>
                      </div> 
                      <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                          <i class="fa fa-dot-circle-o"></i> Submit</button>
                      </div>                
                    </form>
                  </div>
                </div>
                @endif

            </div>
          </div>
        </div>
      </div>
    </main>

@endsection()
