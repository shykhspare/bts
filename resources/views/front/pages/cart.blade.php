@extends('front/layout/layout')
@section('content')
@section('title','Cart')
<div class="page-header border-bottom">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center py-4">
            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Cart</h1>
            <nav class="woocommerce-breadcrumb font-size-2">
                <a href="{{url('/')}}" class="h-primary">Home</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                <span class="breadcrumb-separator mx-1"></span>Cart
            </nav>
        </div>
    </div>
</div>
<div class="site-content bg-punch-light overflow-hidden" id="content">
    <div class="container">
        @if(count($items)>0)
        <header class="entry-header space-top-2 space-bottom-1 mb-2">
            <h1 class="entry-title font-size-7">Your cart: {{count($items)}} items</h1>
        </header>
        @endif
        @if(count($items)>0)
        <div class="row pb-8">
            <div id="primary" class="content-area col-sm-9">
                <main id="main" class="site-main ">
                    <div class="page type-page status-publish hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <form class="woocommerce-cart-form table-responsive" action="#" method="post">
                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Book</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Detail</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                                <th class="product-remove">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $total=0; $shipment=0; @endphp
                                            @foreach($items as $item)
                                            @php $book=$item->book;
                                            $amount=$book->price;
                                            if($item->type=='read'){
                                            $amount=$book->online_amount;
                                            }else{
                                            $shipment=$shipment+$book->ship_amount*$item->quantity;
                                            }
                                            $itemTotal=$item->quantity*$amount;
                                            $total=$total+($item->quantity*$amount);
                                            @endphp
                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                <td class="product-name" data-title="Product">
                                                    <div class="d-flex align-items-center">
                                                        <a href="#">
                                                            <!-- <img src="../../assets/img/90x138/img1.jpg" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""> -->
                                                        </a>
                                                        <div class="ml-3 m-w-200-lg-down">
                                                            <a href="{{url('book',$book->slug)}}">{{$book->title}}</a>
                                                            <a href="{{url('author', $book->author->slug)}}" class="text-gray-700 font-size-2 d-block" tabindex="0">{{$book->author['name']}}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span>{{ $amount}}</span>
                                                </td>

                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount">{{$item->type}}</span>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity d-flex align-items-center">

                                                        <div class="border px-3 width-120">
                                                            <div class="js-quantity">
                                                                @if($item->type!='read')
                                                                <div class="d-flex align-items-center">
                                                                    <label class="screen-reader-text sr-only">Quantity</label>
                                                                    <a class="js-minus text-dark" data-id="{{$item->id}}" data-amount="{{$amount}}" data-ship-amount="{{$book->ship_amount}}" href="javascript:;">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="1px">
                                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M-0.000,-0.000 L10.000,-0.000 L10.000,1.000 L-0.000,1.000 L-0.000,-0.000 Z" />
                                                                        </svg>
                                                                    </a>
                                                                    <input type="number" id="quantity_{{$item->id}}" class="input-text qty text js-result form-control text-center border-0" step="1" min="1" max="100" name="quantity" value="{{$item->quantity}}" title="Qty">
                                                                    <a class="js-plus text-dark" data-id="{{$item->id}}" data-amount="{{$amount}}" data-ship-amount="{{$book->ship_amount}}" href="javascript:;">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="10px">
                                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M10.000,5.000 L6.000,5.000 L6.000,10.000 L5.000,10.000 L5.000,5.000 L-0.000,5.000 L-0.000,4.000 L5.000,4.000 L5.000,-0.000 L6.000,-0.000 L6.000,4.000 L10.000,4.000 L10.000,5.000 Z" />
                                                                        </svg>
                                                                    </a>
                                                                </div>
                                                                @else
                                                                <input type="number" id="quantity_{{$item->id}}" class="input-text qty text js-result form-control text-center border-0" step="1" min="1" max="100" name="quantity" value="{{$item->quantity}}" title="Qty" readonly>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span><span class="item_total" id="item_total_{{$item->id}}">{{ $itemTotal}}<span></span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="{{url('items/remove',$item->id)}}" class="remove" aria-label="Remove this item">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.011,13.899 L13.899,15.012 L7.500,8.613 L1.101,15.012 L-0.012,13.899 L6.387,7.500 L-0.012,1.101 L1.101,-0.012 L7.500,6.387 L13.899,-0.012 L15.011,1.101 L8.613,7.500 L15.011,13.899 Z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
            <div id="secondary" class="sidebar cart-collaterals order-1 col-sm-3 p-2" role="complementary">
                <div id="cartAccordion" class="border border-gray-900 bg-white mb-5">
                    <div class="p-4d875 border">
                        <div id="cartHeadingOne" class="cart-head">
                            <a class="d-flex align-items-center justify-content-between text-dark" href="#" data-toggle="collapse" data-target="#cartCollapseOne" aria-expanded="true" aria-controls="cartCollapseOne">
                                <h3 class="cart-title mb-0 font-weight-medium font-size-3">Cart Totals</h3>
                                <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                </svg>
                                <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                </svg>
                            </a>
                        </div>
                        <div id="cartCollapseOne" class="mt-4 cart-content collapse show" aria-labelledby="cartHeadingOne" data-parent="#cartAccordion">
                            <table class="shop_table shop_table_responsive">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span><span class="subtotal">{{ $total}}</span></span></td>
                                    </tr>
                                    <tr class="order-shipping">
                                        <th>Shipping</th>
                                        <!-- <td data-title="Shipping">Free Shipping</td> -->
                                        <td data-title="Shipping"><span class="woocommerce-Price-amount shipment_amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span><span id="shipment">{{ $shipment}}</span></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="p-4d875 border">
                        <div id="cartHeadingThree" class="cart-head">
                            <a class="d-flex align-items-center justify-content-between text-dark" href="#" data-toggle="collapse" data-target="#cartCollapseThree" aria-expanded="true" aria-controls="cartCollapseThree">
                                <h3 class="cart-title mb-0 font-weight-medium font-size-3">Coupon</h3>
                                <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                </svg>
                                <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                </svg>
                            </a>
                        </div>
                        <div id="cartCollapseThree" class="mt-4 cart-content collapse show" aria-labelledby="cartHeadingThree" data-parent="#cartAccordion">
                            <div class="coupon">
                                <label for="coupon_code">Coupon:</label>
                                <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" autocomplete="off">
                                <input type="submit" class="button" name="apply_coupon" value="Apply coupon">
                            </div>
                        </div>
                    </div>
                    <div class="p-4d875 border">
                        <table class="shop_table shop_table_responsive">
                            <tbody>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span><span id="grandtotal">{{ $total+$shipment}}</span></span></strong> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @auth
                <div class="wc-proceed-to-checkout">
                    <a href="{{url('checkout')}}" class="checkout-button button alt wc-forward btn btn-dark btn-block rounded-0 py-4">Proceed to checkout</a>
                </div>
                @endauth

                @guest
                <div class="wc-proceed-to-checkout">

                    <a id="sidebarNavToggler9" href="javascript:;" role="button" class="button alt wc-forward btn btn-dark btn-block rounded-0 py-4" aria-controls="sidebarContent9" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent9" data-unfold-type="css-animation" data-unfold-overlay='{
            "className": "u-sidebar-bg-overlay",
            "background": "rgba(0, 0, 0, .7)",
            "animationSpeed": 500
        }' data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                        Proceed to checkout
                    </a>
                </div>
                @endguest
            </div>
        </div>
        @else
        <div class="row p-8 card">
            <div class="col-sm-12 text-center ">
                <h3 class="entry-title font-size-4">Cart is Empty</h3>
                <a class="btn btn-primary btn-sm" href="{{url('/')}}">Back</a>
            </div>
        </div>
        @endif
    </div>
</div>




@endsection
@section('script')
<script>
    $(document).ready(function() {



        $('.js-minus').click(function() {
            var item_id = $(this).attr("data-id");
            var amount = $(this).attr("data-amount");
            var shipment = $(this).attr("data-ship-amount");

            var quantity = $('#quantity_' + item_id).val();
            if (quantity > 1) {
                var shipmentTotal = $('#shipment').text();

                var shipmentTotal_ = parseInt(shipmentTotal) - shipment;
                $('#shipment').text(shipmentTotal_);
                var updateQuantity = parseInt(quantity) - 1;
                $('#quantity_' + item_id).val(updateQuantity);
                updateRecord(item_id, updateQuantity);
                $('#item_total_' + item_id).text(updateQuantity * amount);
            }
        });

        $('.js-plus').click(function() {
            var item_id = $(this).attr("data-id");
            var amount = $(this).attr("data-amount");
            var shipment = $(this).attr("data-ship-amount");
            var quantity = $('#quantity_' + item_id).val();
            var shipmentTotal = $('#shipment').text();

            var shipmentTotal_ = parseInt(shipmentTotal) + parseInt(shipment);
            console.log(shipmentTotal_);
            $('#shipment').text(shipmentTotal_);
            var updateQuantity = parseInt(quantity) + 1;
            $('#quantity_' + item_id).val(updateQuantity);
            $('#item_total_' + item_id).text(updateQuantity * amount);
            updateRecord(item_id, updateQuantity);
        });


        function updateRecord(id, quantity) {
            $.ajax({
                url: 'items/quantityupdate',
                type: 'POST',
                data: {
                    id: id,
                    quantity: quantity,
                },
                success: function(data) {
                    console.log(data);
                    updateSum();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function updateSum() {


            var sum = 0;
            $('.item_total').each(function() {
                sum += +$(this).text() || 0;
            });
            $(".subtotal").text(sum);
            var shipment = $('#shipment').text();

            var grandtotal = parseInt(shipment) + sum;
            $('#grandtotal').text(grandtotal);
        }
    });
</script>
@stop