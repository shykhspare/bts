@extends('front/layout/layout')
@section('content')
@section('title','checkout')
<div class="page-header border-bottom">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center py-4">
            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Shop Single</h1>
            <nav class="woocommerce-breadcrumb font-size-2">
                <a href="#" class="h-primary">Home</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                <a href="#" class="h-primary">Shop</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Shop Single
            </nav>
        </div>
    </div>
</div>
<div id="content" class="site-content bg-punch-light space-bottom-3">
    <div class="col-full container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article id="post-6" class="post-6 page type-page status-publish hentry">
                    <header class="entry-header space-top-2 space-bottom-1 mb-2">
                        <h4 class="entry-title font-size-7 text-center">Checkout</h4>
                    </header>

                    <div class="entry-content">
                        <div class="woocommerce">

                            <form name="checkout" method="post" class="checkout woocommerce-checkout row mt-8" action="{{url('process')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col2-set col-md-6 col-lg-7 col-xl-8 mb-6 mb-md-0" id="customer_details">
                                    @if(count($items)>0)
                                    @if($items[0]->type=='order')
                                    <div class="px-4 pt-5 bg-white border">
                                        <div class="woocommerce-billing-fields">
                                            <h3 class="mb-4 font-size-3">Billing details</h3>
                                            <div class="woocommerce-billing-fields__field-wrapper row">
                                                <p class="col-lg-12 mb-4d75 form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                                                    <label for="billing_first_name" class="form-label">Name <abbr class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text form-control" name="name" id="billing_first_name" placeholder="" value="{{Auth::User()->name}}" autocomplete="given-name" autofocus="autofocus" required>
                                                </p>

                                                <p class="col-12 mb-4d75 form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                    <label for="billing_company" class="form-label">Company name (Optional)</label>
                                                    <input type="text" class="input-text form-control" name="billing_company" id="billing_company" placeholder="" value="" autocomplete="organization">
                                                </p>

                                                <p class="col-12 mb-3 form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                                                    <label for="street-address" class="form-label">Address <abbr class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text form-control" name="address" id="street-address" placeholder="House number and street name" value="{{Auth::User()->address}}" autocomplete="address-line1" required>
                                                </p>
                                                <p class="col-12 mb-4d75 form-row form-row-wide" id="billing_company_field" data-priority="30">
                                                    <label for="city" class="form-label">City</label>
                                                    <input type="text" class="input-text form-control" name="city" id="City" placeholder="City" value="">
                                                </p>

                                                <p class="col-12 mb-4d75 form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                                    <label for="billing_phone" class="form-label">Phone <abbr class="required" title="required">*</abbr></label>
                                                    <input type="tel" class="input-text form-control" name="billing_phone" id="billing_phone" placeholder="" value="{{Auth::User()->phone}}" autocomplete="tel">
                                                </p>
                                                <p class="col-12 mb-4d75 form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
                                                    <label for="billing_email" class="form-label">Email address <abbr class="required" title="required">*</abbr></label>
                                                    <input type="email" class="input-text form-control" name="billing_email" id="billing_email" placeholder="" value="{{Auth::User()->email}}" autocomplete="email">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    <div class="px-4 pt-5 bg-white border border-top-0 mt-n-one">
                                        <div class="woocommerce-additional-fields">
                                            <h3 class="mb-4 font-size-3">Additional information</h3>
                                            <div class="woocommerce-additional-fields__field-wrapper">
                                                <p class="col-12 mb-4d75 px-0 form-row notes" id="order_comments_field" data-priority="">
                                                    <label for="order_comments" class="form-label">Order notes (optional)</label>
                                                    <textarea name="order_comments" class="input-text form-control" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="8" cols="5"></textarea>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 id="order_review_heading" class="d-none">Your order</h3>
                                <div id="order_review" class="col-md-6 col-lg-5 col-xl-4 woocommerce-checkout-review-order">
                                    <div id="checkoutAccordion" class="border border-gray-900 bg-white mb-5">
                                        <div class="p-4d875 border">
                                            <div id="checkoutHeadingOnee" class="checkout-head">
                                                <a href="#" class="text-dark d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#checkoutCollapseOnee" aria-expanded="true" aria-controls="checkoutCollapseOnee">
                                                    <h3 class="checkout-title mb-0 font-weight-medium font-size-3">Your order</h3>
                                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                    </svg>
                                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div id="checkoutCollapseOnee" class="mt-4 checkout-content collapse show" aria-labelledby="checkoutHeadingOnee" data-parent="#checkoutAccordion">
                                                <table class="shop_table woocommerce-checkout-review-order-table">
                                                    <thead class="d-none">
                                                        <tr>
                                                            <th class="product-name">Product</th>
                                                            <th class="product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $total=0; $shipment=0; @endphp
                                                        @foreach($items as $item)
                                                        @php
                                                        $shipment=$shipment+$item->shipment;
                                                        $total=$total+$item->total+$item->shipment;

                                                        @endphp
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                {{$item->book['title']}}&nbsp; <strong class="product-quantity">× {{$item->quantity}}</strong>
                                                            </td>
                                                            <td class="product-total">
                                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span>{{$item->total}}</span>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot class="d-none">
                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span>{{ $total}}</span></td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span>{{ $total}}</span></strong> </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="p-4d875 border">
                                            <div id="checkoutHeadingOne" class="checkout-head">
                                                <a href="#" class="text-dark d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#checkoutCollapseOne" aria-expanded="true" aria-controls="checkoutCollapseOne">
                                                    <h3 class="checkout-title mb-0 font-weight-medium font-size-3">Cart Totals</h3>
                                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                    </svg>
                                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div id="checkoutCollapseOne" class="mt-4 checkout-content collapse show" aria-labelledby="checkoutHeadingOne" data-parent="#checkoutAccordion">
                                                <table class="shop_table shop_table_responsive">
                                                    <tbody>
                                                        <tr class="checkout-subtotal">
                                                            <th>Subtotal</th>
                                                            <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span>{{ $total}}</span></td>
                                                        </tr>
                                                        <tr class="order-shipping">
                                                            <th>Shipping</th>
                                                            <td data-title="Shipping">{{ $shipment}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <div class="p-4d875 border">
                                            <table class="shop_table shop_table_responsive">
                                                <tbody>
                                                    <tr class="order-total">
                                                        <th>Total</th>
                                                        <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span>{{ $total}}</span></strong> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="p-4d875 border">
                                            <div id="checkoutHeadingThreee" class="checkout-head">
                                                <a href="#" class="text-dark d-flex align-items-center justify-content-between" data-toggle="collapse" data-target="#checkoutCollapseThreee" aria-expanded="true" aria-controls="checkoutCollapseThreee">
                                                    <h3 class="checkout-title mb-0 font-weight-medium font-size-3">Payment</h3>
                                                    <svg class="mins" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                    </svg>
                                                    <svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                                        <path fill-rule="evenodd" fill="rgb(22, 22, 25)" d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div id="checkoutCollapseThreee" class="mt-4 checkout-content collapse show" aria-labelledby="checkoutHeadingThreee" data-parent="#checkoutAccordion">
                                                <div id="payment" class="woocommerce-checkout-payment">
                                                    <ul class="wc_payment_methods payment_methods methods">
                                                        <li class="wc_payment_method payment_method_bacs">
                                                            <input id="payment_method_bacs" type="radio" checked="checked" class="input-radio" name="payment_method" value="bacs" data-order_button_text="">
                                                            <label for="payment_method_bacs">Direct bank transfer </label>
                                                            <div class="payment_box payment_method_bacs" style="display: block;">
                                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                                <b>Easy Paisa Details </b>
                                                                <p>
                                                                    <b> Number : 0346-9509924 </b><br>
                                                                    <b> Name : Wali Ahmad Khan</b><br>

                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li id="paymentDetails" style="display: none;">
                                                            <input class="form-control" type="text" name="transaction_no" id="transaction_no" placeholder="Enter Transaction/Token/Recepit Code">
                                                            <br> <label>Attachment Proof</label>
                                                            <input class="form-control" type="file" name="transaction_attachment" id="transaction_attachment">
                                                        </li>
                                                        <!-- <li class="wc_payment_method payment_method_cod">
                                                            <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="">
                                                            <label for="payment_method_cod">Cash on delivery </label>
                                                            <div class="payment_box payment_method_cod" style="display: block;">
                                                                <p>Pay with cash upon delivery.</p>
                                                            </div>
                                                        </li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row place-order">
                                        <button type="submit" class="button alt btn btn-dark btn-block rounded-0 py-4">Place order</button>
                                        <input type="hidden" name="total" value="{{$total}}">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </article>

            </main>

        </div>

    </div>

</div>
@endsection

@section('script')

<script type="text/javascript" async="">
    $(document).ready(function() {

        // according to client show all field default
        $("#paymentDetails").show();
        $("#transaction_no").attr('required', true);
        // $("#transaction_attachment").attr('required', true);


        $('input[type=radio][name=payment_method]').change(function() {
            if (this.value == 'bacs') {
                $("#paymentDetails").show();
                $("#transaction_no").attr('required', true);
                // $("#transaction_attachment").attr('required', true);
            } else {
                $("#paymentDetails").hide();
                $("#transaction_no").attr('required', false);
                $("#transaction_attachment").attr('required', false);
            }
        });
    });

    var placeSearch, autocomplete;
    var componentForm = {
        postal_code: 'long_name'
    };

    function loadplaces() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.

        var element = document.getElementById('street-address');
        if (typeof(element) != 'undefined' && element != null) {

            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */
                (document.getElementById('street-address')), {
                    types: ['address'],
                    componentRestrictions: {
                        // country: ["us", "ca"]
                    }
                });

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }



        var element = document.getElementById('googleMap');
        if (typeof(element) != 'undefined' && element != null) {
            myMap();
        }
    }


    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = "";
            document.getElementById(component).disabled = false;
        }
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
</script>


<script async type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUVNN3YIHM1Yug2TOuoha4aKgWkh0TwvA&libraries=places&callback=loadplaces"></script>
@stop