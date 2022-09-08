@extends('front/layout/layout')
@section('title', 'Home')
@section('content')


<section class="space-bottom-3">
    <div class="bg-gray-200 space-2 space-lg-0 bg-img-hero" style="background-image: url({{asset('UI/assets/img/1920x588/img1.jpg')}})">
        <div class="container">
            <div class="js-slick-carousel u-slick" data-pagi-classes="text-center u-slick__pagination position-absolute right-0 left-0 mb-n8 mb-lg-4 bottom-0">


                @foreach($slides as $key=> $slide)

                <?php
                $ImageUrl = "#";
                if (count($slide->getMedia('slide')) > 0) {
                    if ($slide->getMedia('slide')[0]->hasGeneratedConversion('800x420')) {
                        $ImageUrl  = $slide->getMedia('slide')[0]->getUrl('800x420');
                    }
                }
                ?>
                <div class="js-slide">
                    <div class="hero row min-height-588 align-items-center">
                        <div class="col-lg-7 col-wd-6 mb-4 mb-lg-0">
                            {!!$slide->description!!}
                        </div>
                        <div class="col-lg-5 col-wd-6" data-scs-animation-in="fadeInRight" data-scs-animation-delay="500">
                            <img class="img-fluid" src="{{$ImageUrl}}" alt="image-description">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- @if($categories)
<section class="space-bottom-3">
    <div class="container">
        <header class="mb-5 d-md-flex justify-content-between align-items-center">
            <h2 class="font-size-7 mb-3 mb-md-0">Featured Categories</h2>
            <a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/shop/v1.html" class="h-primary d-block">All Categories <i class="glyph-icon flaticon-next"></i></a>
        </header>
        <ul class="list-unstyled my-0 row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 row-cols-wd-5">
            @foreach($categories as $category)
            <li class="product-category col mb-4 mb-xl-0">
                <div class="product-category__inner bg-indigo-light px-6 py-5">
                    <div class="product-category__icon font-size-12 text-primary-indigo"><i class="glyph-icon flaticon-gallery"></i></div>
                    <div class="product-category__body">
                        <h3 class="text-truncate font-size-3">{{$category->title}}</h3>
                        <a href="https://demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/shop/v1.html" class="stretched-link text-dark">Shop Now</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endif -->

<section class="space-bottom-3">
    <header class="mb-4 container">
        <h2 class="font-size-7 text-center">Featured Books</h2>
    </header>
    <div class="container">
        <ul class="nav justify-content-md-center nav-gray-700 mb-5 flex-nowrap flex-md-wrap overflow-auto overflow-md-visible" id="featuredBooks" role="tablist">
            <li class="nav-item mx-5 mb-1 flex-shrink-0 flex-md-shrink-1">
                <a class="nav-link px-0 active" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="true">Books</a>
            </li>

        </ul>
        <div class="tab-content" id="featuredBooksContent">
            <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                <ul class="products list-unstyled row no-gutters row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-wd-6 border-top border-left my-0">
                    @foreach($books as $key=> $book)


                    <?php
                    $bookImageUrl = "#";
                    $bookpdf = "#";
                    if (count($book->getMedia('books')) > 0) {
                        if ($book->getMedia('books')[0]->hasGeneratedConversion('150x226')) {
                            $bookImageUrl = $book->getMedia('books')[0]->getUrl('150x226');
                        }
                    }

                    if (count($book->getMedia('pdf'))) {
                        $bookpdf = $book->getMedia('pdf')[0]->getUrl();
                    }
                    ?>
                    <li class="product col">
                        <div class="product__inner overflow-hidden p-3 p-md-4d875">
                            <div class="woocommerce-LoopProduct-link woocommerce-loop-product__link d-block position-relative">
                                <div class="woocommerce-loop-product__thumbnail">
                                    <a href="{{url('book',$book->slug)}}" class="d-block"><img src="{{  $bookImageUrl}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="{{$book->title}}-image"></a>
                                </div>
                                <div class="woocommerce-loop-product__body product__body pt-3 bg-white">
                                    <div class="text-uppercase font-size-1 mb-1 text-truncate"><a href="{{url('book',$book->slug)}}">Paperback</a></div>
                                    <h2 class="woocommerce-loop-product__title product__title h6 text-lh-md mb-1 text-height-2 crop-text-2 h-dark"><a href="{{url('book',$book->slug)}}">{{$book->title}}</a></h2>
                                    <div class="font-size-2  mb-1 text-truncate"><a href="{{url('author', $book->author->slug)}}" class="text-gray-700">{{$book->author['name']}}</a></div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <!-- <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">{{$website->currency_symbol}}</span>{{$book->price}}</span> -->
                                    </div>
                                </div>
                                <div class=" d-flex  align-items-center pt">
                                    @if($book->is_hard==true)
                                    <a href="{{url('items/add?slug=')}}{{$book->slug}}&type=order" class="btn btn-sm btn-primary">
                                        <span>Online Order</span>
                                    </a>

                                    @endif

                                    <a href="{{url('book',$book->slug)}}" class="btn btn-sm btn-primary">
                                        Read Online
                                    </a>
                                    @if($bookpdf!='#')
                                    <a href="{{$bookpdf }}" class="btn btn-sm btn-primary">
                                        Pdf Content
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>


        </div>
    </div>
</section>

<section class="space-bottom-3">
    <div class="container">
        <header class="d-md-flex justify-content-between align-items-center mb-8">
            <h2 class="font-size-7 mb-3 mb-md-0">Favorite Authors</h2>
            <a href="{{url('authors')}}" class="h-primary d-block">View All <i class="glyph-icon flaticon-next"></i></a>
        </header>
        <ul class="row rows-cols-5 no-gutters authors list-unstyled js-slick-carousel u-slick" data-slides-show="{{count($authors)}}" data-arrows-classes="u-slick__arrow u-slick__arrow-centered--y" data-arrow-left-classes="fas fa-chevron-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-n10" data-arrow-right-classes="fas fa-chevron-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-n10" data-responsive='[{
                    "breakpoint": 1025,
                    "settings": {
                        "slidesToShow": 3
                    }
                }, {
                    "breakpoint": 992,
                    "settings": {
                        "slidesToShow": 2
                    }
                }, {
                    "breakpoint": 768,
                    "settings": {
                        "slidesToShow": 1
                    }
                }, {
                    "breakpoint": 554,
                    "settings": {
                        "slidesToShow": 1
                    }
                }]'>

            @foreach($authors as $key=> $author)

            <li class="author col">
                <a href="{{url('authors',$author->slug)}}" class="text-reset">
                    <img src="{{$author->getMedia('authors')[0]->getUrl('thumbnail')}}" class="mx-auto mb-5 d-block rounded-circle" alt="image-description">
                    <div class="author__body text-center">
                        <h2 class="author__name h6 mb-0">{{$author->name}}</h2>
                        <div class="text-gray-700 font-size-2">{{count($author->books)}} Published Books</div>
                    </div>
                </a>
            </li>
            @endforeach

        </ul>
    </div>
</section>

@endsection