@extends('layouts.frontend')

@section('content')

<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Gamis</h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Gamis</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->		
		<div class="col-md-12 products-right">	
			@foreach($swan as $datas)		
			<div class="col-md-4 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="{{URL::asset('../storage/app/public')}}/{{$datas->gambar}}" alt="" class="pro-image-front">
						<img src="{{URL::asset('../storage/app/public')}}/{{$datas->gambar}}" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="single.html" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>									
					</div>
					<div class="item-info-product ">
						<h4><a href="single.html">{{$datas->nama}}</a></h4>
						<div class="info-product-price">
							<span class="item_price">Rp {{$datas->harga}}</span>
						</div>
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="business" value=" ">
									<input type="hidden" name="item_name" value="{{$datas->nama}}">
									<input type="hidden" name="amount" value="{{$datas->harga}}">
									<input type="hidden" name="currency_code" value="IDR">
									<input type="hidden" name="return" value=" ">
									<input type="hidden" name="cancel_return" value=" ">
									<input type="submit" name="submit" value="Add to cart" class="button">
								</fieldset>
							</form>
						</div>																	
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- //mens -->
@endsection