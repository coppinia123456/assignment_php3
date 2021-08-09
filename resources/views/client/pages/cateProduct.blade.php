@extends('client.layout')
@section('title')
{{$product[0]->categories[0]->name}}
@endsection
@section('content')

<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <li>{{$product[0]->categories[0]->name}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- top Products -->
<div class="ads-grid  py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            {{$product[0]->categories[0]->name}}</h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
                        <div class="row"> 
                            @foreach($product as $products)
                            <div class="col-md-4 product-men mt-md-0 mt-5">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item text-center"style="height: 200px;">
                                        <img src="{{asset('storage/'.$products->image)}}" alt="" style="width: 200px;">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{route('product_detail').'?pr='.$products->slug}}" class="link-product-add-cart">Xem sản phẩm</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info-product text-center border-top mt-4">
                                        <div class="d-flex  flex-column bd-highlight mb-3" style="height: 200px;">
                                            <h4 class="mb-auto  p-2 bd-highlight"> <a href="single.html">{{$products->name}}</a></h4>
                                            <div class="p-2 pl-2 bd-highlight info-product-price" style="text-align: center">
                                                <span class="item_price" style="font-weight: bold;text-align: center;">{{$products->competitive_price_last_sale}}</span><br>
                                                @if($products->discounts!==0)
                                                <del style="text-align: center;font-size: 15px; ">{{$products->competitive_price}}</del>
                                                @else 
                                                <br>
                                                 @endif                                           
                                            </div>
                                            <div class="p-2 bd-highlight snipcart-details  top_brand_home_details item_add single-item hvr-outline-out">
                                              
                                                @if (Auth::check())
                                                <form action="#" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $products->id }}"
                                                        name="id">
                                                    <input value="Thêm sản phẩm" class="button btn add submit" />
                                                </form>
                                                @else
                                                <input value="Thêm sản phẩm"class="button btn add submit login_model" />
                                                    
                    
                                                @endif
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                        </div>
                    </div>
                    <!-- //first section -->
             
                </div>
            </div>
            <!-- //product left -->
            <!-- product right -->
            <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                <div class="side-bar p-sm-4 p-3">
                    <div class="search-hotel border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Brand</h3>
                        <form action="#" method="post">
                            <input type="search" placeholder="Search Brand..." name="search" required="">
                            <input type="submit" value=" ">
                        </form>
                        <div class="left-side py-2">
                            <ul>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Electronics</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">ELECTRON</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Electronic</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Generic</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">mono</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">ACR Electronics</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">NAXA Electronics</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Techno electronics</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">TC Electronic</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Robodo Electronics</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">JJ Electronic</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- reviews -->
                    <div class="customer-rev border-bottom left-side py-2">
                        <h3 class="agileits-sear-head mb-3">Customer Review</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <span>5.0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <span>4.0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <span>3.5</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <span>3.0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <span>2.5</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- //reviews -->
                    <!-- price -->
                    <div class="range border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Price</h3>
                        <div class="w3l-range">
                            <ul>
                                <li>
                                    <a href="#">Under $1,000</a>
                                </li>
                                <li class="my-1">
                                    <a href="#">$1,000 - $5,000</a>
                                </li>
                                <li>
                                    <a href="#">$5,000 - $10,000</a>
                                </li>
                                <li class="my-1">
                                    <a href="#">$10,000 - $20,000</a>
                                </li>
                                <li>
                                    <a href="#">$20,000 $30,000</a>
                                </li>
                                <li class="mt-1">
                                    <a href="#">Over $30,000</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //price -->
                    <!-- discounts -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Discount</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">5% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">10% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">20% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">30% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">50% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">60% or More</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //discounts -->
                    <!-- offers -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Offers</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Exchange Offer</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">No Cost EMI</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Special Price</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //offers -->
                    <!-- delivery -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Cash On Delivery</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Eligible for Cash On Delivery</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //delivery -->
                    <!-- arrivals -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">New Arrivals</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Last 30 days</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Last 90 days</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //arrivals -->
                    <!-- Availability -->
                    <div class="left-side py-2">
                        <h3 class="agileits-sear-head mb-3">Availability</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Exclude Out of Stock</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //Availability -->
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>
</div>
<!-- //top products -->
	<!-- //Single Page -->
    <footer>
        <div class="footer-top-first">
            <div class="container py-md-5 py-sm-4 py-3">
                <!-- footer first section -->
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