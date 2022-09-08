@extends('front/layout/layout')
@section('content')
@section('title','Order- '.$orderhd->orderNo)

<main id="content">
    <div class="bg-gray-200 space-bottom-3">
        <div class="container">
            <div class="row">
                @include('front/components/sidebar')

                <div class="col-md-9">
                    <div class="py-5 py-lg-7">
                        <h6 class="font-weight-medium font-size-7 text-center mt-lg-1">Order Details</h6>
                    </div>
                    <div class="max-width-890 mx-auto">
                        <div class="bg-white pt-6 border">
                            <h6 class="font-size-3 font-weight-medium text-center mb-4 pb-xl-1"> {{$orderhd->status()}}</h6>
                            <div class="border-bottom mb-5 pb-5 overflow-auto overflow-md-visible">
                                <div class="pl-3">
                                    <table class="table table-borderless mb-0 ml-1">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="font-size-2 font-weight-normal py-0">Order number:</th>
                                                <th scope="col" class="font-size-2 font-weight-normal py-0">Date:</th>
                                                <th scope="col" class="font-size-2 font-weight-normal py-0 text-md-center">Total: </th>
                                                <th scope="col" class="font-size-2 font-weight-normal py-0 text-md-right pr-md-9">Payment method:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="pr-0 py-0 font-weight-medium">{{$orderhd->orderNo}}</th>
                                                <td class="pr-0 py-0 font-weight-medium">{{$orderhd->created_at}}</td>
                                                <td class="pr-0 py-0 font-weight-medium text-md-center">{{$website->currency_symbol}} {{$orderhd->amount}}</td>
                                                <td class="pr-md-4 py-0 font-weight-medium text-md-right">{{$orderhd->paymentMethod()}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="border-bottom mb-5 pb-6">
                                <div class="px-3 px-md-4">
                                    <div class="ml-md-2">
                                        <h6 class="font-size-3 on-weight-medium mb-4 pb-1">Order Details</h6>
                                        @php
                                        $total=0;
                                        $shipment=0;
                                        @endphp
                                        @foreach($orderhd->items as $key => $item)

                                        @php
                                        $shipment=$shipment+$item->shipment;
                                        $total=$total+$item->total+$item->shipment;
                                        @endphp
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-baseline">
                                                <div>
                                                    <h6 class="font-size-2 font-weight-normal mb-1">{{$item->book['title']}} <br> Amy Byler</h6>
                                                    <span class="font-size-2 text-gray-600">({{$item->book['language']}})</span>
                                                </div>
                                                <span class="font-size-2 ml-4 ml-md-8">x{{$item->quantity}}</span>
                                            </div>
                                            <span class="font-weight-medium font-size-2">{{$website->currency_symbol}} {{$item->amount}}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom mb-5 pb-5">
                                <ul class="list-unstyled px-3 pl-md-5 pr-md-4 mb-0">
                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium font-size-2">Subtotal:</span>
                                        <span class="font-weight-medium font-size-2">{{$website->currency_symbol}} {{$total}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between py-2">
                                        <span class="font-weight-medium font-size-2">Shipping:</span>
                                        <span class="font-weight-medium font-size-2">{{$website->currency_symbol}} {{$shipment}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between pt-2">
                                        <span class="font-weight-medium font-size-2">Payment Method:</span>
                                        <span class="font-weight-medium font-size-2">{{$orderhd->paymentMethod()}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="border-bottom mb-5 pb-4">
                                <div class="px-3 pl-md-5 pr-md-4">
                                    <div class="d-flex justify-content-between">
                                        <span class="font-size-2 font-weight-medium">Total</span>
                                        <span class="font-weight-medium fon-size-2">{{$website->currency_symbol}} {{$total+$shipment}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 pl-md-5 pr-md-4 mb-6 pb-xl-1">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <!-- <div class="col">
                                <div class="mb-6 mb-md-0">
                                    <h6 class="font-weight-medium font-size-22 mb-3">Billing Address
                                    </h6>
                                    <address class="d-flex flex-column mb-0">
                                        <span class="text-gray-600 font-size-2">Ali Tufan</span>
                                        <span class="text-gray-600 font-size-2">Bedford St,</span>
                                        <span class="text-gray-600 font-size-2">Covent Garden, </span>
                                        <span class="text-gray-600 font-size-2">London WC2E 9ED</span>
                                        <span class="text-gray-600 font-size-2">United Kingdom</span>
                                    </address>
                                </div>
                            </div> -->
                                    <div class="col">
                                        <h6 class="font-weight-medium font-size-22 mb-3">Shipping Address
                                        </h6>
                                        <address class="d-flex flex-column mb-0">
                                            <span class="text-gray-600 font-size-2">{{$orderhd->name}}</span>
                                            <span class="text-gray-600 font-size-2">{{$orderhd->phoneno}}</span>
                                            <span class="text-gray-600 font-size-2">{{$orderhd->city}} </span>
                                            <span class="text-gray-600 font-size-2">{{$orderhd->address}} </span>
                                            <span class="text-gray-600 font-size-2">{{$orderhd->state}}</span>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection