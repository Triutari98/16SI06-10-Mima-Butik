@extends('layouts.backend')
@section('content')
<main class="main">    
  <div class="container-fluid">
    <div class="animated fadeIn">
      <h4>  Manajemen Ongkos Kirim
       <small>Data Ongkos Kirim</small>
      </h4>         
        <div class="row">                
          <div class="col-md-12">
            @if(!Session::has('editMessage'))
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Ongkos Kirim</div>
                <div class="card-body">
                       	<br>
                    <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama Daerah</th>
                          <th>Harga /kg</th>
                          <th>Action</th>                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($swan as $data)
                        <tr>
                          <td>{{$data->id_ongkir}}</td>
                          <td>{{$data->nama_kota}}</td>
                          <td>{{$data->harga_kota}}</td> 
                          <td width="19%"><a href="{{URL('/manageongkir/data/delete')}}/{{$data->id_ongkir}}"><button class="btn btn-sm" style="background-color: red; color: white;">Delete</button></a> <a href="{{URL('/manageongkir/data/update')}}/{{$data->id_ongkir}}"><button class="btn btn-sm" style="background-color: black; color: white;">Edit</button></a>  </td>                       
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
                    <strong>Input </strong>Data Ongkos Kirim
                  </div>
                  <div class="card-body">
                    <form role="form" class="form-horizontal" action="{{url('/manageongkir/data/prosescreate')}}" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}             
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Daerah</label>
                        <div class="col-md-9">
                          <input class="form-control" id="nama_kota" type="text" name="nama_kota" placeholder="Text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Harga /kg</label>
                        <div class="col-md-9">
                          <input class="form-control" id="harga_kota" type="text" name="harga_kota" placeholder="Text">
                        </div>
                      </div>
                  	  <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button> 
                      </div>
                    </form> 
                  </div>
                </div>
                @endif

                @if(Session::has('editMessage'))
                <div class="card">
                  <div class="card-header">
                    <strong>Edit </strong>Data Ongkos Kirim
                  </div>
                  <div class="card-body">
                    <form role="form" class="form-horizontal" action="{{url('/manageongkir/data/prosesupdate')}}/{{$dataEdit->id_ongkir}}" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }} 
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Daerah</label>
                        <div class="col-md-9">
                          <input class="form-control" id="nama_kota" type="text" name="nama_kota" placeholder="Text" value="{{$dataEdit->nama_kota}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Harga /kg</label>
                        <div class="col-md-9">
                          <input class="form-control" id="harga_kota" type="text" name="harga_kota" placeholder="Text" value="{{$dataEdit->harga_kota}}">
                        </div>
                      </div>       
                      <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button> 
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
