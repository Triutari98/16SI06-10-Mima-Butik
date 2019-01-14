@extends('layouts.frontend')

@section('content')
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Mix <span>And </span>Match</h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Mix & Match</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container"> 

			@for($i = 0 ; $i < count($dataAtasan) ; $i++)
			<div class="col-md-12 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item col-md-4">
					<img src="{{URL::asset('../storage/app/public')}}/{{$dataAtasan[$i]->gambar}}" alt="" class="pro-image-front">
					<img src="{{URL::asset('../storage/app/public')}}/{{$dataAtasan[$i]->gambar}}" alt="" class="pro-image-back">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">{{$dataAtasan[$i]->nama}}</a>
						</div>
					</div>											
				</div>
				

				<div class="men-thumb-item col-md-4">
					<img src="{{URL::asset('../storage/app/public')}}/{{$dataBawahan[$i]->gambar}}" alt="" class="pro-image-front">
					<img src="{{URL::asset('../storage/app/public')}}/{{$dataBawahan[$i]->gambar}}" alt="" class="pro-image-back">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">{{$dataBawahan[$i]->nama}}</a>
						</div>
					</div>											
				</div>
				
				<div class="men-thumb-item col-md-4">
					<img src="{{URL::asset('../storage/app/public')}}/{{$dataKerudung[$i]->gambar}}" alt="" class="pro-image-front">
					<img src="{{URL::asset('../storage/app/public')}}/{{$dataKerudung[$i]->gambar}}" alt="" class="pro-image-back">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">{{$dataKerudung[$i]->nama}}</a>
						</div>
					</div>												
				</div>
				

				<div class="item-info-product ">
					<h4><a href="single.html">{{$dataMixMatch[$i]->nama_mm}}</a></h4>
					<div class="info-product-price">
						<span class="item_price">{{$dataMixMatch[$i]->harga}}</span>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1">
								<input type="hidden" name="business" value=" ">
								<input type="hidden" name="item_name" val="{{$dataMixMatch[$i]->nama_mm}}">
								<input type="hidden" name="amount" value="{{$dataMixMatch[$i]->harga}}">
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
@endfor
	</div>
</div>
<!-- //mens -->
<!--/grids-->
<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE SHIPPING</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>24/7 SUPPORT</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>MONEY BACK GUARANTEE</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
						<h3>FREE GIFT COUPONS</h3>
						<p>Lorem ipsum dolor sit amet, consectetur</p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>

@endsection