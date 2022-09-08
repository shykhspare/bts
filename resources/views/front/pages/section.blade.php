@extends('front/layout/layout')
@section('content')
@section('title','Section')
<div class="page-header mb-8">
    <div class="bg-img-hero bg-gradient-primary" style="background-image: url(../../assets/img/1920x840/img1.jpg);">
        <div class="container position-relative mb-2">
            <div class="d-flex justify-content-center space-2 space-lg-4">
                <h6 class="font-weight-medium text-white font-size-12 py-lg-5">Sections</h6>
            </div>
            <nav class="woocommerce-breadcrumb font-size-2 d-flex justify-content-center align-items-center pb-4">
                <a class="text-white" href="{{url('/')}}">Home</a>
                <span class="breadcrumb-separator text-white mx-1"><i class="fas fa-angle-right"></i></span>
                <a class="text-white" href="{{url('book',$book['slug'])}}">{{$book['title']}}</a>
                <span class="breadcrumb-separator text-white mx-1"><i class="fas fa-angle-right"></i></span>

            </nav>
        </div>
    </div>
</div>
<div class="site-content" id="content">
    <div class="container">
        <div class="row">
            <div id="primary" class="container">
                <div class="shop-control-bar d-lg-flex justify-content-between align-items-center mb-5 text-center text-md-left">


                </div>

                <div class="tab-content p-2" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">


                        <div class="row">
                            @foreach($sections as $section)
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
            <div id="secondary" class="sidebar widget-area order-1" role="complementary">
            </div>
        </div>
    </div>
</div>
@endsection