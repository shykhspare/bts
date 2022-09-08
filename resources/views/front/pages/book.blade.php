@extends('front/layout/layout')
@section('content')
@section('title', $book->title)
<div class="page-header border-bottom">
    <div class="container">
        <div class="d-md-flex justify-content-between align-items-center py-4">
            <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Book Detail</h1>
            <nav class="woocommerce-breadcrumb font-size-2">
                <a href="{{url('/')}}" class="h-primary">Home</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                <a href="{{url('category',$book->category['slug'])}}" class="h-primary">{{$book->category['title']}}</a>
                <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>{{$book->title}}
            </nav>
        </div>
    </div>
</div>
<div id="primary" class="content-area">
    <main id="main" class="site-main ">
        <div class="product">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 woocommerce-product-gallery woocommerce-product-gallery--with-images images">
                        <figure class="woocommerce-product-gallery__wrapper pt-8 mb-0">
                            <div class="js-slick-carousel u-slick" data-pagi-classes="text-center u-slick__pagination my-4">

                                <?php
                                $bookImages = $book->getMedia('books');
                                ?>

                                @foreach($bookImages as $key=> $image)
                                <?php
                                $bookImageUrl = "#";
                                if ($book->getMedia('books')[0]->hasGeneratedConversion('300x452')) {
                                    $bookImageUrl = $book->getMedia('books')[0]->getUrl('300x452');
                                }

                                ?>
                                <div class="js-slide">
                                    <img src="{{ $bookImageUrl}}" alt="{{$book->title}}" class="mx-auto img-fluid">
                                </div>
                                @endforeach
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-7 pl-0 summary entry-summary border-left">
                        <div class="space-top-2 px-4 px-xl-7 border-bottom pb-5">
                            <h1 class="product_title entry-title font-size-7 mb-3">{{$book->title}}</h1>
                            <div class="font-size-2 mb-4">
                                <span class="text-yellow-darker">
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                </span>
                                <!-- <span class="ml-3">(3,714)</span> -->
                                <span class="ml-3 font-weight-medium">By (author)</span>
                                <span class="ml-2 text-gray-600"><a href="{{url('author')}}">{{$book->author->name}}</a></span>
                            </div>
                            <p class="price font-size-22 font-weight-medium mb-3">
                                <span class="woocommerce-Price-amount amount">
                                    <!-- <span class="ml-3">(Order)</span> -->
                                    <span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span>{{$book->online_amount}}
                                </span>


                                <!-- – -->
                                <!-- <span class="woocommerce-Price-amount amount">
                                    <span class="ml-3">(Online)</span>
                                    <span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}} </span> {{$book->online_amount}}
                                </span> -->
                            </p>


                            <div class="row mx-gutters-2 mb-4">
                                <div class="col-6 col-md-3 mb-3 mb-md-0">
                                    <div class="">
                                        <input type="radio" id="typeOfListingRadio1" name="typeOfListingRadio1" class="custom-control-input checkbox-outline__input">
                                        <label class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0" for="typeOfListingRadio1">
                                            <span class="d-block">Publisher</span>
                                            <span class="">{{$book->publisher}}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3 mb-md-0">
                                    <div class="">
                                        <input type="radio" id="typeOfListingRadio1" name="typeOfListingRadio1" class="custom-control-input checkbox-outline__input">
                                        <label class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0" for="typeOfListingRadio1">
                                            <span class="d-block">Language</span>
                                            <span class="">{{$book->language}}</span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                            <!-- <div class="woocommerce-product-details__short-description font-size-2 mb-5">
                                <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat.</p>
                            </div> -->
                            <form class="cart d-md-flex align-items-center" method="GET" action="{{url('items/add')}}">
                                <input type="hidden" name="slug" value="{{$book->slug}}" />
                                <input type="hidden" name="type" value="order" />

                                <!-- <div class="quantity mb-4 mb-md-0 d-flex align-items-center">
                                    <a href="{{url('items/add?slug=')}}{{$book->slug}}&type=order" class="btn btn-dark border-0 rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt">
                                        Order Online
                                    </a>
                                </div> -->


                                @if($book->payment()==0 && $book->status!=4)
                                <div class="quantity mb-4 mb-md-0 d-flex align-items-center">
                                    <a href="{{url('items/add?slug=')}}{{$book->slug}}&type=read" class="btn btn-dark border-0 rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt">
                                        Buy for Online Read
                                    </a>
                                </div>
                                @endif

                                @if($book->payment()==2)

                                <label class="border-bottom d-block checkbox-outline__label py-3 px-1 mb-0" for="typeOfListingRadio1">
                                    <span class="d-block"> Payment under Verification</span>

                                </label>
                                @endif

                                @if($book->payment()==3)
                                <a href="{{url('cart')}}?book=all" class="btn btn-dark border-0 rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt">
                                    View in cart
                                </a>
                                @endif

                                @if($book->payment()==1 || $book->status!=1)
                                <a href="{{url('section',[$book->slug,$book->slug])}}?book=all" class="btn btn-dark border-0 rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt">
                                    Read
                                </a>
                                @endif


                                <!-- <button type="submit" name="add-to-cart" value="7145" class="btn btn-dark border-0 rounded-0 p-3 min-width-250 ml-md-4 single_add_to_cart_button button alt">Online Order</button> -->



                            </form>
                        </div>
                        <div class="px-4 px-xl-7 py-5 d-flex align-items-center">
                            <ul class="list-unstyled nav">
                                <li class="mr-6 mb-4 mb-md-0">
                                    <a href="#" class="h-primary"><i class="flaticon-heart mr-2"></i> Add to Wishlist</a>
                                </li>
                                <li class="mr-6">
                                    <a href="#" class="h-primary"><i class="flaticon-share mr-2"></i> Share</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="js-scroll-nav mb-10">
                <div class="woocommerce-tabs wc-tabs-wrapper  2 mx-lg-auto">
                    @if($book->payment()==1 || $book->status!=1)
                    @if(count($book->sections)>0)
                    <div id="ProductSections" class="">
                        <div class="border-top border-bottom">
                            <ul class="container tabs wc-tabs nav justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item active">
                                    <a class="nav-link py-4 font-weight-medium active" href="#ProductSections">
                                        Sections
                                    </a>
                                </li>
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#Description">
                                        Description
                                    </a>
                                </li>
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#ProductDetails">
                                        Product Details
                                    </a>
                                </li>

                                <!-- <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#ProductReviews">
                                        Reviews (0)
                                    </a>
                                </li> -->
                            </ul>
                        </div>

                        <div class="tab-content font-size-2 container">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9">

                                        <div class="row">
                                            @foreach($book->sections as $section)
                                            <div class="d-flex mb-8 justify-content-center">
                                                <?php
                                                $sectionImageUrl = "#";
                                                if (count($section->getMedia('sections')) > 0) {
                                                    if ($section->getMedia('sections')[0]->hasGeneratedConversion('120x180')) {
                                                        $sectionImageUrl = $section->getMedia('sections')[0]->getUrl('120x180');
                                                    }
                                                }
                                                $url = url('section-details', $section->slug);
                                                if (count($section->sections) > 0) {
                                                    $url = url('section', [$book->slug, $section->slug]);
                                                }
                                                ?>
                                                <a href="{{ $url }}" class="js-fancybox d-block p-4 border position-relative max-width-234" data-src="#" data-speed="700">
                                                    <span class="position-absolute-center text-dark font-size-10">
                                                        <!-- <i class="flaticon-multimedia"></i> -->
                                                    </span>
                                                    <div class="hover-area">
                                                        <img src="{{$sectionImageUrl}}" class="img-fluid d-block mx-auto mb-3" alt="{{$section->title}}-image">
                                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-dark">{{$section->title}}</h2>
                                                        <div class="font-size-2 text-gray-700">{{$section->language}}</div>
                                                    </div>
                                                    <!-- <span class="text-white bg-dark px-3 py-1 position-absolute bottom-0 right-0">1:45</span> -->
                                                </a>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endif
                    @endif
                    <div id="Description" class="">
                        <div class="border-top border-bottom">
                            <ul class="container tabs wc-tabs nav justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#ProductSections">
                                        Sections
                                    </a>
                                </li>
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item active">
                                    <a class="nav-link py-4 font-weight-medium active" href="#Description">
                                        Description
                                    </a>
                                </li>
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#ProductDetails">
                                        Product Details
                                    </a>
                                </li>

                                <!-- <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#ProductReviews">
                                        Reviews (0)
                                    </a>
                                </li> -->
                            </ul>
                        </div>

                        <div class="tab-content font-size-2 container">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9">
                                        {!!$book->description!!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="ProductDetails" class="">
                        <div class="border-top border-bottom">
                            <ul class="container tabs wc-tabs nav justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#ProductSections">
                                        Sections
                                    </a>
                                </li>
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#Description">
                                        Description
                                    </a>
                                </li>
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item active">
                                    <a class="nav-link py-4 font-weight-medium active" href="#ProductDetails">
                                        Product Details
                                    </a>
                                </li>

                                <!-- <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#ProductReviews">
                                        Reviews (0)
                                    </a>
                                </li> -->
                            </ul>
                        </div>

                        <div class="tab-content font-size-2 container">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9">

                                        <div class="table-responsive mb-4">
                                            <table class="table table-hover table-borderless">
                                                <tbody>
                                                    <!-- <tr>
                                                        <th class="px-4 px-xl-5">Format: </th>
                                                        <td class="">Paperback | 384 pages</td>
                                                    </tr> -->
                                                    <!-- <tr>
                                                        <th class="px-4 px-xl-5">Dimensions</th>
                                                        <td>9126 x 194 x 28mm | 301g</td>
                                                    </tr> -->
                                                    <tr>
                                                        <th class="px-4 px-xl-5">Publication date: </th>
                                                        <td>{{date('Y:m:d', strtotime($book->created_at))}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-4 px-xl-5">Publisher:</th>
                                                        <td>{{$book->publisher}}</td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <th class="px-4 px-xl-5">Imprint:</th>
                                                        <td>Corsair</td>
                                                    </tr> -->
                                                    <tr>
                                                        <th class="px-4 px-xl-5">Publication City/Country:</th>
                                                        <td>Kpk, Pakistan</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="px-4 px-xl-5">Language:</th>
                                                        <td>{{$book->language}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- <div id="ProductReviews" class="">
                        <div class="border-top border-bottom">
                            <ul class="container tabs wc-tabs nav justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#Description">
                                        Description
                                    </a>
                                </li>
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#ProductDetails">
                                        Product Details
                                    </a>
                                </li>
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item">
                                    <a class="nav-link py-4 font-weight-medium" href="#ProductSections">
                                        Sections
                                    </a>
                                </li>
                                <li class="flex-shrink-0 flex-md-shrink-1 nav-item active">
                                    <a class="nav-link py-4 font-weight-medium active" href="#ProductReviews">
                                        Reviews (0)
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content font-size-2 container">
                            <div class="row">
                                <div class="col-xl-8 offset-xl-2">
                                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab pt-9">

                                        <h4 class="font-size-3">Customer Reviews </h4>
                                        <div class="row mb-8">
                                            <div class="col-md-6 mb-6 mb-md-0">
                                                <div class="d-flex  align-items-center mb-4">
                                                    <span class="font-size-15 font-weight-bold">4.6</span>
                                                    <div class="ml-3 h6 mb-0">
                                                        <span class="font-weight-normal">3,714 reviews</span>
                                                        <div class="text-yellow-darker">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-md-flex">
                                                    <button type="button" class="btn btn-outline-dark rounded-0 px-5 mb-3 mb-md-0">See all reviews</button>
                                                    <button type="button" class="btn btn-dark ml-md-3 rounded-0 px-5">Write a review</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <ul class="list-unstyled pl-xl-4">
                                                    <li class="py-2">
                                                        <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                            <div class="col-auto">
                                                                <span class="text-dark">5 stars</span>
                                                            </div>
                                                            <div class="col px-0">
                                                                <div class="progress bg-white-100" style="height: 7px;">
                                                                    <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="text-secondary">205</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2">
                                                        <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                            <div class="col-auto">
                                                                <span class="text-dark">4 stars</span>
                                                            </div>
                                                            <div class="col px-0">
                                                                <div class="progress bg-white-100" style="height: 7px;">
                                                                    <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 53%;" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="text-secondary">55</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2">
                                                        <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                            <div class="col-auto">
                                                                <span class="text-dark">3 stars</span>
                                                            </div>
                                                            <div class="col px-0">
                                                                <div class="progress bg-white-100" style="height: 7px;">
                                                                    <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="text-secondary">23</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2">
                                                        <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                            <div class="col-auto">
                                                                <span class="text-dark">2 stars</span>
                                                            </div>
                                                            <div class="col px-0">
                                                                <div class="progress bg-white-100" style="height: 7px;">
                                                                    <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="text-secondary">0</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2">
                                                        <a class="row align-items-center mx-gutters-2 font-size-2" href="javascript:;">
                                                            <div class="col-auto">
                                                                <span class="text-dark">1 stars</span>
                                                            </div>
                                                            <div class="col px-0">
                                                                <div class="progress bg-white-100" style="height: 7px;">
                                                                    <div class="progress-bar bg-yellow-darker" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="text-secondary">4</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                        <h4 class="font-size-3 mb-8">1-5 of 44 reviews</h4>
                                        <ul class="list-unstyled mb-8">
                                            <li class="mb-4 pb-5 border-bottom">
                                                <div class="d-flex align-items-center mb-3">
                                                    <h6 class="mb-0">Amazing Story! You will LOVE it</h6>
                                                    <div class="text-yellow-darker ml-3">
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="far fa-star"></small>
                                                    </div>
                                                </div>
                                                <p class="mb-4 text-lh-md">Such an incredibly complex story! I had to buy it because there was a waiting list of 30+ at the local library for this book. Thrilled that I made the purchase</p>
                                                <div class="text-gray-600 mb-4">Staci, February 22, 2020 </div>
                                                <ul class="nav">
                                                    <li class="mr-7">
                                                        <a href="#" class="text-gray-600 d-flex align-items-center">
                                                            <i class="text-dark font-size-5 flaticon-like-1"></i>
                                                            <span class="ml-2">90</span>
                                                        </a>
                                                    </li>
                                                    <li class="mr-7">
                                                        <a href="#" class="text-gray-600 d-flex align-items-center">
                                                            <i class="text-dark font-size-5 flaticon-dislike"></i>
                                                            <span class="ml-2">10</span>
                                                        </a>
                                                    </li>
                                                    <li class="mr-7">
                                                        <a href="#" class="text-gray-600 d-flex align-items-center">
                                                            <i class="text-dark font-size-5 flaticon-flag"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mb-4 pb-5 border-bottom">
                                                <div class="d-flex align-items-center mb-3">
                                                    <h6 class="mb-0">Get the best seller at a great price.</h6>
                                                    <div class="text-yellow-darker ml-3">
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="far fa-star"></small>
                                                    </div>
                                                </div>
                                                <p class="mb-4 text-lh-md">Awesome book, great price, fast delivery. Thanks so much.</p>
                                                <div class="text-gray-600 mb-4">Staci, February 22, 2020 </div>
                                                <ul class="nav">
                                                    <li class="mr-7">
                                                        <a href="#" class="text-gray-600 d-flex align-items-center">
                                                            <i class="text-dark font-size-5 flaticon-like-1"></i>
                                                            <span class="ml-2">90</span>
                                                        </a>
                                                    </li>
                                                    <li class="mr-7">
                                                        <a href="#" class="text-gray-600 d-flex align-items-center">
                                                            <i class="text-dark font-size-5 flaticon-dislike"></i>
                                                            <span class="ml-2">10</span>
                                                        </a>
                                                    </li>
                                                    <li class="mr-7">
                                                        <a href="#" class="text-gray-600 d-flex align-items-center">
                                                            <i class="text-dark font-size-5 flaticon-flag"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mb-4 pb-5 border-bottom">
                                                <div class="d-flex align-items-center mb-3">
                                                    <h6 class="mb-0">I read this book short...</h6>
                                                    <div class="text-yellow-darker ml-3">
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="far fa-star"></small>
                                                    </div>
                                                </div>
                                                <p class="mb-4 text-lh-md">I read this book shortly after I got it and didn't just put it on my TBR shelf mainly because I saw it on Reese Witherspoon's bookclub September read. It was one of the best books I've read this year, and reminded me some of Kristen Hannah's The Great Alone. </p>
                                                <div class="text-gray-600 mb-4">Staci, February 22, 2020 </div>
                                                <ul class="nav">
                                                    <li class="mr-7">
                                                        <a href="#" class="text-gray-600 d-flex align-items-center">
                                                            <i class="text-dark font-size-5 flaticon-like-1"></i>
                                                            <span class="ml-2">90</span>
                                                        </a>
                                                    </li>
                                                    <li class="mr-7">
                                                        <a href="#" class="text-gray-600 d-flex align-items-center">
                                                            <i class="text-dark font-size-5 flaticon-dislike"></i>
                                                            <span class="ml-2">10</span>
                                                        </a>
                                                    </li>
                                                    <li class="mr-7">
                                                        <a href="#" class="text-gray-600 d-flex align-items-center">
                                                            <i class="text-dark font-size-5 flaticon-flag"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <h4 class="font-size-3 mb-4">Write a Review</h4>
                                        <div class="d-flex align-items-center mb-6">
                                            <h6 class="mb-0">Select a rating(required)</h6>
                                            <div class="text-yellow-darker ml-3 font-size-4">
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                                <small class="far fa-star"></small>
                                            </div>
                                        </div>
                                        <div class="js-form-message form-group mb-4">
                                            <label for="descriptionTextarea" class="form-label text-dark h6 mb-3">Details please! Your review helps other shoppers.</label>
                                            <textarea class="form-control rounded-0 p-4" rows="7" id="descriptionTextarea" placeholder="What did you like or dislike? What should other shoppers know before buying?" required data-msg="Please enter your message." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="inputCompanyName" class="form-label text-dark h6 mb-3">Add a title</label>
                                            <input type="text" class="form-control rounded-0 px-4" name="companyName" id="inputCompanyName" placeholder="3000 characters remaining" aria-label="3000 characters remaining">
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-dark btn-wide rounded-0 transition-3d-hover">Submit Review</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> -->
                </div>
            </div>

            <!-- <section class="space-bottom-3">
                <div class="container">
                    <header class="mb-5 d-md-flex justify-content-between align-items-center">
                        <h2 class="font-size-7 mb-3 mb-md-0">Customers Also Considered</h2>
                    </header>
                    <div class="js-slick-carousel products no-gutters border-top border-left border-right" data-arrows-classes="u-slick__arrow u-slick__arrow-centered--y" data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10" data-slides-show="5" data-responsive='[{
                               "breakpoint": 1500,
                               "settings": {
                                 "slidesToShow": 4
                               }
                            },{
                               "breakpoint": 1199,
                               "settings": {
                                 "slidesToShow": 3
                               }
                            }, {
                               "breakpoint": 992,
                               "settings": {
                                 "slidesToShow": 2
                               }
                            }, {
                               "breakpoint": 554,
                               "settings": {
                                 "slidesToShow": 2
                               }
                            }]'>
                        <div class="product">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="single-product-v3.html" class="d-block"><img src="{{ asset('UI/assets/img/120x180/img1.jpg')}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="single-product-v3.html">Paperback</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="single-product-v3.html">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/others/authors-single.html" class="text-gray-700">Jay Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="single-product-v3.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="single-product-v3.html" class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="single-product-v3.html" class="h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="single-product-v3.html" class="d-block"><img src="{{ asset('UI/assets/img/120x180/img2.jpg')}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="single-product-v3.html">Kindle Edition</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="single-product-v3.html">The Overdue Life of Amy Byler</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/others/authors-single.html" class="text-gray-700">Kelly Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="single-product-v3.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="single-product-v3.html" class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="single-product-v3.html" class="h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="single-product-v3.html" class="d-block"><img src="{{ asset('UI/assets/img/120x180/img3.jpg')}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="single-product-v3.html">Paperback</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="single-product-v3.html">All You Can Ever Know: A Memoir</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/others/authors-single.html" class="text-gray-700">Jay Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="single-product-v3.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="single-product-v3.html" class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="single-product-v3.html" class="h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="single-product-v3.html" class="d-block"><img src="{{ asset('UI/assets/img/120x180/img4.jpg')}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="single-product-v3.html">Kindle Edition</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="single-product-v3.html">The Last Sister (Columbia River Book 1)</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/others/authors-single.html" class="text-gray-700">Kelly Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="single-product-v3.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="single-product-v3.html" class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="single-product-v3.html" class="h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="single-product-v3.html" class="d-block"><img src="{{ asset('UI/assets/img/120x180/img5.jpg')}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="single-product-v3.html">Paperback</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="single-product-v3.html">Think Like a Monk: Train Your Mind for Peace and Purpose Everyday</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/others/authors-single.html" class="text-gray-700">Jay Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="single-product-v3.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="single-product-v3.html" class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="single-product-v3.html" class="h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="single-product-v3.html" class="d-block"><img src="{{ asset('UI/assets/img/120x180/img6.jpg')}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="single-product-v3.html">Kindle Edition</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="single-product-v3.html">The Overdue Life of Amy Byler</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/others/authors-single.html" class="text-gray-700">Kelly Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="single-product-v3.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="single-product-v3.html" class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="single-product-v3.html" class="h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="single-product-v3.html" class="d-block"><img src="{{ asset('UI/assets/img/120x180/img7.jpg')}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="single-product-v3.html">Paperback</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="single-product-v3.html">All You Can Ever Know: A Memoir</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/others/authors-single.html" class="text-gray-700">Jay Shetty</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="single-product-v3.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="single-product-v3.html" class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="single-product-v3.html" class="h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product">
                            <div class="product__inner overflow-hidden p-3 p-md-4d875">
                                <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                    <div class="woocommerce-loop-product__thumbnail">
                                        <a href="single-product-v3.html" class="d-block"><img src="{{ asset('UI/assets/img/120x180/img8.jpg')}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="image-description"></a>
                                    </div>
                                    <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                        <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="single-product-v3.html">Kindle Edition</a></div>
                                        <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="single-product-v3.html">The Last Sister (Columbia River Book 1)</a></h2>
                                        <div class="font-size-2  mb-1 text-truncate"><a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/others/authors-single.html" class="text-gray-700">Kelly Harms</a></div>
                                        <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>29</span>
                                        </div>
                                    </div>
                                    <div class="product__hover d-flex align-items-center">
                                        <a href="single-product-v3.html" class="text-uppercase text-dark h-dark font-weight-medium mr-auto">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                            <span class="product__add-to-cart-icon font-size-4"><i class="flaticon-icon-126515"></i></span>
                                        </a>
                                        <a href="single-product-v3.html" class="mr-1 h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-switch"></i>
                                        </a>
                                        <a href="single-product-v3.html" class="h-p-bg btn btn-outline-primary border-0">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
        </div>
    </main>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {



        $('.js-minus').click(function() {
            var item_id = $(this).attr("data-id");
            var amount = $(this).attr("data-amount");
            var quantity = $('#quantity').val();
            if (quantity > 1) {
                var updateQuantity = parseInt(quantity) - 1;
                $('#quantity').val(updateQuantity);

            }
        });

        $('.js-plus').click(function() {

            var amount = $(this).attr("data-amount");
            var quantity = $('#quantity').val();
            var updateQuantity = parseInt(quantity) + 1;
            $('#quantity').val(updateQuantity);
        });
    });
</script>
@stop