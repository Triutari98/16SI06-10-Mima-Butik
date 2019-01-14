@extends('layouts.backend')
@section('content')
<main class="main">    
  <div class="container-fluid">
    <div class="animated fadeIn">
      <h4>  Manajemen Konsumen
       <small>Data Konsumen</small>
      </h4>         
        <div class="row">                
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Consumer List</div>                
                <div class="card-body">
                       	<br>
                    <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Telp</th>
                          <th>Email</th>
                          <th>Username</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($swan as $data)
                        <tr>
                          <td>{{$data->id_custom}}</td>
                          <td>{{$data->nama_custom}}</td>
                          <td>{{$data->telp_custom}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->username_c}}</td>  
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
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection
