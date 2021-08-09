@extends('client.layout')
@section('title')
{{ $product->name}}
@endsection
@section('content')

	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Single Product 1</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="{{asset('storage/'.$product->image)}}">
									<div class="thumb-image">
										<img src="{{asset('storage/'.$product->image)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								
								@foreach($product->image_products as $products)
                                <li data-thumb="{{asset('storage/'.$products->image)}}">
									<div class="thumb-image">
										<img src="{{asset('storage/'.$products->image)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
                                @endforeach
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3">{{$product->name}}</h3>
					<p class="mb-3">
						<span class="item_price">{{$product->competitive_price_last_sale}}</span>
                        @if($product->discounts!==0)
                        <del style="mx-2 font-weight-light">{{$product->competitive_price}}</del>
                        @endif
						<label>Giao hàng miễn phí</label>
					</p>
					<div class="single-infoagile">
                       
						<ul>
							<li class="mb-3">
								Tiền mặt khi giao hàng đủ điều kiện.
							</li>
							<li class="mb-3">
								Tốc độ vận chuyển đến giao hàng
							</li>
							<li class="mb-3">
								Ưu đãi ngân hàng Giảm giá đặc biệt 5% * với Thẻ tín dụng Axis Bank BuzzT & C
							</li>
						</ul>
					</div>
					<div class="product-single-w3l">
                        <p class="my-3">
							<i class=" mr-2">
                                <img src="{{asset('storage/images/branches/'.$product->branch->image)}}"style="width: 100px;" alt="">
                            </i>
							<label>Được bảo trợ sản phẩm bởi {{$product->branch->name}}</label> </p>
						<ul >
							
							<li class="mb-1"style="list-style-type:none" >
								<?php
                                    echo $product->short_desc
                                    ?>
							</li>
						</ul>
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i>Ngân hàng trực tuyến & Thẻ tín dụng / Ghi nợ / ATM
						</p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							@if (Auth::check())
							<form action="#" method="post">
								@csrf
								<input type="hidden" value="{{ $product->id }}"
									name="id">
								<input value="Thêm sản phẩm" class="button btn add submit" />
							</form>
							@else
							<input value="Mua sản phẩm"class="button btn add submit login_model" />
								

						    @endif
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Single Page -->
    <footer>
        <div class="footer-top-first">
            <div class="container py-md-5 py-sm-4 py-3">
                <!-- footer first section -->
                <h2 class="footer-top-head-w3l font-weight-bold mb-2">MÔ TẢ SẢN PHẨM :</h2> <br> <br>
                <p class="mr-2" style="">
                    <?php
                echo $product->desc
                ?>  
                </p>
              

@endsection

@section('javascript')
<script src="{{asset('asset_fe/js/move-top.js')}}"></script>
	<!-- imagezoom -->
	<script src="{{asset('asset_fe/js/imagezoom.js')}}"></script>
	<!-- //imagezoom -->
	<!-- flexslider -->
	<link rel="stylesheet" href="{{asset('asset_fe/css/flexslider.css')}}" type="text/css" media="screen" />

	<script src="{{asset('asset_fe/js/jquery.flexslider.js')}}"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	  <script src="{{ asset('asset_fe/js/product/addproduct.js') }}"></script>
	  <!-- //auth -->
	  <!-- login -->
	  <script>
		  $('.add').on('click', function() {
			  let token = $(this).parent().find('input[name=_token]').val();
			  let id = $(this).parent().find('input[name=id]').val();
			  addproduct("{{ route('addproduct') }}", id, token);

		  });
		  $('.login_model').on('click', function() {
			  $("#login")[0].reset();

			  $("#exampleModal").modal("show");

		  });
	  </script>
@endsection