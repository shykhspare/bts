@extends('front/layout/layout')
@section('content')
@section('title','Dashboard')
<main id="content">
    <div class="container">
        <div class="row">
            @include('front/components/sidebar')
            <div class="col-md-9 p-2">
                <div class="py-5 py-lg-7">
                    <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">orders</h6>
                </div>

                <table class="table">
                    <thead>
                        <tr class="border">
                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-lg-5">Order</th>
                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Date</th>
                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Staus</th>
                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Total</th>
                            <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderhds as $order)
                        <tr class="border">
                            <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">#{{$order->orderNo}}</th>
                            <td class="align-middle py-5">{{$order->created_at}}</td>
                            <td class="align-middle py-5">
                                {{$order->status()}}
                            </td>
                            <td class="align-middle py-5">
                                <span class="text-primary">{{$website->currency_symbol}} {{$order->amount}}</span>
                            </td>
                            <td class="align-middle py-5">
                                <div class="d-flex justify-content-center">
                                    <a href="{{url('order-details',$order->orderNo)}}" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                <div class="d-flex justify-content-center">
                    {!! $orderhds->links() !!}
                </div>
            </div>
        </div>
    </div>
</main>

@endsection