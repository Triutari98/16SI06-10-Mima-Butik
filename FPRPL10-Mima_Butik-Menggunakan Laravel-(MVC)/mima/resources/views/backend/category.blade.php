@extends('layouts.backend')
@section('content')
<main class="main">    
  <div class="container-fluid">
    <div class="animated fadeIn">
      <h4>  Manajemen Kategori
       <small>Data Kategori</small>
      </h4>         
        <div class="row">                
          <div class="col-md-12">
            @if(!Session::has('editMessage'))
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Kategori</div>
                <div class="card-body">
                       	<br>
                    <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Kategori</th>
                          <th>Action</th>                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($swan as $data)
                        <tr>
                          <td>{{$data->id_kategori}}</td>
                          <td>{{$data->nama_kategori}}</td>
                          <td width="19%"><a href="{{URL('/managecategory/data/delete')}}/{{$data->id_kategori}}"><button class="btn btn-sm" style="background-color: red; color: white;">Delete</button></a> <a href="{{URL('/managecategory/data/update')}}/{{$data->id_kategori}}"><button class="btn btn-sm" style="background-color: black; color: white;">Edit</button></a>  </td>
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
                    <strong>Input </strong>Data Kategori
                  </div>
                  <div class="card-body">
                    <form role="form" class="form-horizontal" action="{{url('/managecategory/data/prosescreate')}}" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}             
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Kategori</label>
                        <div class="col-md-9">
                          <input class="form-control" id="nama_kategori" type="text" name="nama_kategori" placeholder="Text">
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
                    <strong>Edit </strong>Data Kategori
                  </div>
                  <div class="card-body">
                    <form role="form" class="form-horizontal" action="{{url('/managecategory/data/prosesupdate')}}/{{$dataEdit->id_kategori}}" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}             
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Kategori</label>
                        <div class="col-md-9">
                          <input class="form-control" id="nama_kategori" type="text" name="nama_kategori" placeholder="Text" value="{{$dataEdit->nama_kategori}}">
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
