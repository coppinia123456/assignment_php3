@extends('client.layout')
@section('title', 'Cửa hàng điện tử')

@section('content')


<!-- banner -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators-->

    <ol class="carousel-indicators">
        @for ($i = 0; $i < $slider->count(); $i++)
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"
                class="{{ $i == 0 ? 'active' : '' }}"></li>
        @endfor
    </ol>
    <div class="carousel-inner">
        @for ($i = 0; $i < $slider->count(); $i++)

            <div class="carousel-item  {{ $i == 0 ? 'active' : '' }}" style='background: url({{ asset('storage/' . $slider[$i]->image) }}) no-repeat center;
        background-size: cover;'>

                <div class="container">
                    <div class="w3l-space-banner">
                        <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                            <?php echo $slider[$i]->caption; ?>
                            <h1 class="font-weight-bold pt-2 pb-lg-5 pb-4"><?php echo $slider[$i]->desc; ?></h1>
                            <a class="button2" href="{{ $slider[$i]->link }}">Shop Now </a>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>


    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- //banner -->

<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
            <span>S</span>ản
            <span>P</span>hẩm
            <span>M</span>ới
            <span>N</span>hất
        </h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-12">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1 col-md-12 mb-4 px-sm-4 px-3 py-sm-5  py-3">
                        <h3 class="heading-tittle text-center font-italic">Sản phẩm hot</h3>
                        <div class="row">
                            @for ($i = 0; $i < count($products_DT); $i++)
                                <div class="col-md-3 product-men mt-5">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center" style="height: 200px;">
                                            <img src="{{ asset('storage/' . $products_DT[$i]->image) }}" alt=""
                                                style="width: 200px;">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{ route('product_detail') . '?pr=' . $products_DT[$i]->slug }}"
                                                        class="link-product-add-cart">Xem sản phẩm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <div class="d-flex  flex-column bd-highlight mb-3" style="height: 200px;">
                                                <h4 class="mb-auto  p-2 bd-highlight"> <a
                                                        href="single.html">{{ $products_DT[$i]->name }}</a></h4>
                                                <div class="p-2 pl-2 bd-highlight info-product-price"
                                                    style="text-align: center">
                                                    <span class="item_price"
                                                        style="font-weight: bold;text-align: center;">{{ $products_DT[$i]->competitive_price_last_sale }}</span><br>
                                                    @if ($products_DT[$i]->discounts !== 0)
                                                        <del
                                                            style="text-align: center;font-size: 15px; ">{{ $products_DT[$i]->competitive_price }}</del>
                                                    @else
                                                        <br>
                                                    @endif
                                                </div>
                                                <div
                                                    class="p-2 bd-highlight snipcart-details  top_brand_home_details item_add single-item hvr-outline-out">
                                                    @if (Auth::check())
                                                        <form action="#" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $products_DT[$i]->id }}"
                                                                name="id">
                                                            <input value="Thêm sản phẩm"
                                                                class="button btn add submit" />
                                                        </form>
                                                    @else
                                                        <input value="Thêm sản phẩm"
                                                            class="button btn add submit login_model" />

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endfor
                        </div>
                    </div>
                    <!-- third section -->
                    <div class="product-sec1 product-sec2 px-sm-5 px-3">
                        <div class="row">
                            <h3 class="col-md-4 effect-bg">Summer Carnival</h3>
                            <p class="w3l-nut-middle">Get Extra 10% Off</p>
                            <div class="col-md-8 bg-right-nut">
                                <img src="{{ asset('asset_fe/images/image1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- //third section -->
                    <!-- //first section -->
                    <!-- second section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                        <h3 class="heading-tittle text-center font-italic">Sale cực mạnh</h3>
                        <div class="row">
                            @foreach ($products_sales as $products_sale)
                                <div class="col-md-3 product-men mt-5">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center" style="height: 200px;">
                                            <img src="{{ asset('storage/' . $products_sale->image) }}" alt=""
                                                style="width: 200px;">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{ route('product_detail') . '?pr=' . $products_sale->slug }}"
                                                        class="link-product-add-cart">Xem sản phẩm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="product-new-top">{{ $products_sale->discount }}</span>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <div class="d-flex  flex-column bd-highlight mb-3" style="height: 200px;">
                                                <h4 class="mb-auto  p-2 bd-highlight"> <a
                                                        href="{{ route('product_detail') . '?pr=' . $products_sale->slug }}">{{ $products_sale->name }}</a>
                                                </h4>
                                                <div class="p-2 pl-2 bd-highlight info-product-price"
                                                    style="text-align: center">
                                                    <span class="item_price"
                                                        style="font-weight: bold;text-align: center;">{{ $products_sale->competitive_price_last_sale }}</span><br>
                                                    @if ($products_sale->discounts !== 0)
                                                        <del
                                                            style="text-align: center;font-size: 15px; ">{{ $products_sale->competitive_price }}</del>
                                                    @else
                                                        <br>
                                                    @endif
                                                </div>
                                                <div
                                                    class="p-2 bd-highlight snipcart-details  top_brand_home_details item_add single-item hvr-outline-out">
                                                    @if (Auth::check())
                                                    <form action="#" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{ $products_sale->id }}"
                                                            name="id">
                                                        <input value="Thêm sản phẩm" class="button btn add submit" />
                                                    </form>
                                                    @else
                                                    <input value="Thêm sản phẩm"
                                                        class="button btn add submit login_model" />

                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                    <!-- //second section -->
                    <!-- third section -->
                    <div class="product-sec1 product-sec2 px-sm-5 px-3">
                        <div class="row">
                            <h3 class="col-md-4 effect-bg">Summer Carnival</h3>
                            <p class="w3l-nut-middle">Get Extra 10% Off</p>
                            <div class="col-md-8 bg-right-nut">
                                <img src="{{ asset('asset_fe/images/image1.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- //third section -->
                    <!-- fourth section -->
                    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mt-4">
                        <h3 class="heading-tittle text-center font-italic">Điện gia dụng</h3>
                        <div class="row">
                            @foreach ($products_DDG as $products_DDGS)
                                <div class="col-md-3 product-men mt-5">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center" style="height: 200px;">
                                            <img src="{{ asset('storage/' . $products_DDGS->image) }}" alt=""
                                                style="width: 200px;">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="{{ route('product_detail') . '?pr=' . $products_DDGS->slug }}"
                                                        class="link-product-add-cart">Xem sản phẩm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="product-new-top">{{ $products_DDGS->discount }}</span>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <div class="d-flex  flex-column bd-highlight mb-3" style="height: 200px;">
                                                <h4 class="mb-auto  p-2 bd-highlight"> <a
                                                        href="{{ route('product_detail') . '?pr=' . $products_DDGS->slug }}">{{ $products_DDGS->name }}</a>
                                                </h4>
                                                <div class="p-2 pl-2 bd-highlight info-product-price"
                                                    style="text-align: center">
                                                    <span class="item_price"
                                                        style="font-weight: bold;text-align: center;">{{ $products_DDGS->competitive_price_last_sale }}</span><br>
                                                    @if ($products_DDGS->discounts !== 0)
                                                        <del
                                                            style="text-align: center;font-size: 15px; ">{{ $products_DDGS->competitive_price }}</del>
                                                    @else
                                                        <br>
                                                    @endif
                                                </div>
                                                <div
                                                    class="p-2 bd-highlight snipcart-details  top_brand_home_details item_add single-item hvr-outline-out">
                                                    @if (Auth::check())
                                                    <form action="#" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{ $products_DDGS->id }}"
                                                            name="id">
                                                        <input value="Thêm sản phẩm" class="button btn add submit" />
                                                    </form>
                                                    @else
                                                    <input value="Thêm sản phẩm"
                                                        class="button btn add submit login_model" />

                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                    <!-- //fourth section -->
                </div>
            </div>
            <!-- //product left -->


        </div>
    </div>
</div>
<!-- //top products -->


<footer>
    <div class="footer-top-first">
        <div class="container py-md-5 py-sm-4 py-3">
            <!-- footer first section -->
            <h2 class="footer-top-head-w3l font-weight-bold mb-2">Electronics :</h2>
            <p class="footer-main mb-4">
                If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we
                make it easy to
                find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs, laptops,
                cell phones, tablets
                and iPads, video games, desktop computers, cameras and camcorders, audio, video and more.</p>
        @endsection

        @section('javascript')
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
