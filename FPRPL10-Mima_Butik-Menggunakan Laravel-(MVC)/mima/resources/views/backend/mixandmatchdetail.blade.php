@extends('layouts.backend')
@section('content')

<main class="main">    
  <div class="container-fluid">
    <div class="animated fadeIn">
      <h4>  Manajemen Mix And Match   <br>
       <small>Data Mix And Match   </small>
      </h4>         
      <div class="row">
        <div class="col-md-12">
          <div class="card">          
          <div class="card-body">
      		@foreach($swan as $datas)                       	
         	@endforeach
         		<div class="card-body">
              <p style="font-family: cursive;font-size: 25px"><b>{{$datas->nama_mm}}</b></p>
              <p style="font-family: cursive;font-size: 21px"><sup>Rp</sup> {{$datas->harga}}</p>
            </div>
         			
       		@foreach($swan as $datas)
       		<div class="col-sm-6 col-md-4">
         		<div class="card">
         			<div class="card-body" style="align-items: center;"><img src="{{URL::asset('../storage/app/public')}}/{{$datas->gambar}}" style="max-width:300px;max-height:200px;float:center;border: 0px;border-radius: 5px;" /></div>
         			<div class="card-footer">Nama : {{$datas->nama}}</div>
         		</div>
      		</div>
       		@endforeach
        </div>
      </div>
        </div>
      </div>
    </div>
  </div>
</main>






              
@endsection