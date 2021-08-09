@extends('client.layout')
@section('title')
    Giỏ hàng
@endsection
@section('content')
    <!-- page -->
    <div class="services-breadcrumb">
        <div class="agile_inner_breadcrumb">
            <div class="container">
                <ul class="w3_short">
                    <li>
                        <a href="{{ route('/') }}">TRANG CHỦ</a>
                        <i>|</i>
                    </li>
                    <li> THỦ TỤC THANH TOÁN</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->
    <!-- checkout page -->
    <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>G</span>iỏ hàng
            </h3>
            <!-- //tittle heading -->

            <div class="checkout-right ">
                <h4 class="mb-sm-4 mb-3">Giỏ hàng của bạn có:
                    <span>{{ $users->product()->count() }} Sản phẩm</span>
                </h4>
                <div class="row">

                    <div class="table-responsive agileinfo-ads-display col-lg-9">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>

                                </tr>
                            </thead>
                            <tbody>
                               
                                @for($i=0;$i< $users->product()->count();$i++)
                                    <tr>
                                        <th scope="row"><i class="fas fa-trash-alt"></i></th>
                                        <td style="width: 110px;">
                                            <img src="{{ asset('storage/' . $users->product[$i]->image) }}" alt=" "
                                                style="width:100%">
                                        </td>
                                        <td class="intended__name"> <a
                                                href="{{ route('product_detail') . '?pr=' . $users->product[$i]->slug }}">{{ $users->product[$i]->name }}</a>
                                        </td>
                                        <td>
                                            <span
                                                class="intended__real-prices">{{ $users->product[$i]->competitive_price_last_sale }}</span>

                                            @if ($users->product[$i]->discounts !== 0)
                                                <br>
                                                <del
                                                    class="intended__discount-prices">{{ $users->product[$i]->competitive_price }}</del>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="quantity">
                                                <div class="quantity-select">
                                                    <div class="entry value-minus qty-increase">&nbsp;</div>
                                                    <input type="tel" class="qty-input" id="quantity" value="{{ $users->carts[$i]->quantity }}">
                                                    <div class="entry value-plus active qty-increase">&nbsp;</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="intended__final-prices">1.168.000đ</p>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>


                    </div>
                    <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                        <table class="table" style="background-color:#EEEEEE">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="checkout-left">
                <div class="address_form_agile mt-sm-5 mt-4">
                    <h4 class="mb-sm-4 mb-3">Thông tin nhận hàng</h4>
                    <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
                        <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row">
                                    <div class="controls form-group">
                                        <input class="billing-address-name form-control" type="text" name="name"
                                            placeholder="Tên người nhận" required="">
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left form-group">
                                            <div class="controls">
                                                <input type="text" class="form-control"
                                                    placeholder="Số điện thoại người nhận" name="number" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls form-group">
                                        <input type="text" class="form-control" placeholder="Địa chỉ nhận hàng" name="city"
                                            required="">
                                    </div>

                                </div>
                                <button class="submit check_out btn">Mua hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //checkout page -->
    <style>
        .qty-input {
            border: none;
            background: transparent;
            width: 32px;
            text-align: center;
            font-size: 13px;
            appearance: none;
            margin: 0px;
            outline: none;
        }

        .intended__final-prices {
            color: rgb(255, 66, 78);
            font-size: 13px;
            font-weight: 500;
            line-height: 20px;
            display: block;
        }

        .qty-increase {
            display: inline-block;
            border-right: 1px solid rgb(200, 200, 200);
            color: rgb(153, 153, 153);
            cursor: pointer;
            width: 24px;
            height: 24px;
        }



        .intended__name {
           
            display: -webkit-box;
            text-overflow: ellipsis;
            overflow: hidden;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            font-size: 13px;
            color: rgb(36, 36, 36);

        }

        .intended__real-prices {
            font-weight: 500;
            color: rgb(36, 36, 36);
            font-size: 13px;
            display: inline-block;
            margin-right: 5px;
        }

        .intended__discount-prices {
            color: rgb(153, 153, 153);
            display: inline-block;
            font-size: 11px;
        }

    </style>
    <footer>
        <div class="footer-top-first">
            <div class="container py-md-5 py-sm-4 py-3">

            @endsection

            @section('javascript')
                <!-- quantity -->
                <script>
                    $('.value-plus').on('click', function() {
                        let quantity=$(this).parent().find('#quantity').val();
                        $(this).parent().find('#quantity').val(Number(quantity)+1);
                        // var divUpd = $(this).parent().find('.value'),
                        //     newVal = parseInt(divUpd.text(), 10) + 1;
                        // console.log(divUpd.text());
                        // divUpd.text(newVal);
                    });

                    $('.value-minus').on('click', function() {
                        let quantity=$(this).parent().find('#quantity').val();
                        if (Number(quantity) >= 2)  $(this).parent().find('#quantity').val(Number(quantity)-1);
                        // var divUpd = $(this).parent().find('.value'),
                        //     newVal = parseInt(divUpd.text(), 10) - 1;
                        
                    });
                </script>
                <!--quantity-->
            @endsection
