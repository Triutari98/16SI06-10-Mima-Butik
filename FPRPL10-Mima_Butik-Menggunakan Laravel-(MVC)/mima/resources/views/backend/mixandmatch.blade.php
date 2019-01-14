@extends('layouts.backend')
@section('content')

 <main class="main">    
  <div class="container-fluid">
    <div class="animated fadeIn">
      <h4>  Manajemen Mix And Match<br>
        <small>Data Mix And Match</small>
      </h4>       
        <div class="row">                
          <div class="col-md-12">
            @if(!Session::has('editMessage'))
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar Mix And Match
              </div>
                <div class="card-body">
                       	<br>
                    <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama Mix And Match</th>
                          <th>Harga Mix And Match</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($swan as $data)
                        <tr>
                          <td>{{$data->id_mix_match}}</td>
                          <td>{{$data->nama_mm}}</td>
                          <td>{{$data->harga}}</td>

                          <td width="19%"><a href="{{url('/managemixandmatch/data/delete')}}/{{$data->id_mix_match}}"><button class="btn btn-sm" style="background-color: red; color: white;">Delete</button></a> <a href="{{url('/managemixandmatch/data/update')}}/{{$data->id_mix_match}}"><button class="btn btn-sm" style="background-color: black; color: white;">Edit</button></a> <a href="{{url('/managemixandmatch/data/view')}}/{{$data->id_mix_match}}"><button class="btn btn-sm" style="background-color: green; border-color: green; color: white;">View</button></a> </td>
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
                    <strong>Input </strong>Data Mix And Match</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="{{url('/managemixandmatch/data/prosescreate')}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}   
                      <div class="form-group row">
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Mix And Match</label>
                        <div class="col-md-9">
                          <input class="form-control" id="text-input" type="text" name="nama_mm" placeholder="Text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Atasan</label>
                        <div class="col-md-9">
                          <select class="form-control" name="idBarang[]" >
                            @foreach($dataAtasan as $datas)
                            <option id="{{$datas->idBarang}}" value="{{$datas->idBarang}}">( {{$datas->idBarang}} ) {{$datas->nama}} {{$datas->warna}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>    
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Bawahan</label>
                        <div class="col-md-9">
                          <select class="form-control" name="idBarang[]" >
                            @foreach($dataBawahan as $datas)
                            <option id="{{$datas->idBarang}}" value="{{$datas->idBarang}}">( {{$datas->idBarang}} ) {{$datas->nama}} {{$datas->warna}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>   
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Kerudung</label>
                        <div class="col-md-9">
                          <select class="form-control" name="idBarang[]" >
                            @foreach($dataKerudung as $datas)
                            <option id="{{$datas->idBarang}}" value="{{$datas->idBarang}}">( {{$datas->idBarang}} ) {{$datas->nama}} {{$datas->warna}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>     
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Harga Mix And Match</label>
                        <div class="col-md-9">
                          <input class="form-control" id="text-input" type="text" name="harga" placeholder="Text">
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
                    <strong>Edit </strong>Data Mix And Match</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="{{url('/managemixandmatch/data/prosesupdate')}}/{{$dataEdit->id_mix_match}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }} 
                      <div class="form-group row">
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Mix And Match</label>
                        <div class="col-md-9">
                          <input class="form-control" id="text-input" type="text" name="nama_mm" placeholder="Text" value="{{$dataEdit->nama_mm}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Atasan</label>
                        <div class="col-md-9">
                          <select class="form-control" name="idBarang[]" >
                            @foreach($dataAtasan as $datas)
                            <option id="{{$datas->idBarang}}" value="{{$datas->idBarang}}">( {{$datas->idBarang}} ) {{$datas->nama}} {{$datas->warna}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>    
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Bawahan</label>
                        <div class="col-md-9">
                          <select class="form-control" name="idBarang[]" >
                            @foreach($dataBawahan as $datas)
                            <option id="{{$datas->idBarang}}" value="{{$datas->idBarang}}">( {{$datas->idBarang}} ) {{$datas->nama}} {{$datas->warna}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>   
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Kerudung</label>
                        <div class="col-md-9">
                          <select class="form-control" name="idBarang[]" >
                            @foreach($dataKerudung as $datas)
                            <option id="{{$datas->idBarang}}" value="{{$datas->idBarang}}">( {{$datas->idBarang}} ) {{$datas->nama}} {{$datas->warna}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>        
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Harga Mix And Match</label>
                        <div class="col-md-9">
                          <input class="form-control" id="text-input" type="text" name="harga" placeholder="Text" value="{{$dataEdit->harga}}">
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