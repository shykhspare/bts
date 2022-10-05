<header id="site-header" class="site-header__v1">
    <div class="topbar border-bottom d-none d-md-block">
        <div class="container-fluid px-2 px-md-5 px-xl-8d75">
            <div class="topbar__nav d-md-flex justify-content-between align-items-center">
                <ul class="topbar__nav--left nav ml-md-n3">
                    <li class="nav-item"><a href="#" class="nav-link link-black-100"><i
                                class="glph-icon flaticon-question mr-2"></i>Can we help you?</a></li>
                    <li class="nav-item"><a href="tel:{{ $website->phone }}" class="nav-link link-black-100"><i
                                class="glph-icon flaticon-phone mr-2"></i>{{ $website->phone }}</a></li>
                </ul>
                <ul class="topbar__nav--right nav mr-md-n3">
                    <li class="nav-item"><a href="#" class="nav-link link-black-100"><i
                                class="glph-icon flaticon-pin"></i></a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-black-100"><i
                                class="glph-icon flaticon-switch"></i></a></li>
                    <li class="nav-item"><a href="#" class="nav-link link-black-100"><i
                                class="glph-icon flaticon-heart"></i></a></li>
                    <li class="nav-item">
                        @if (!Auth::guest())
                            <a href="{{ url('dashboard') }}"
                                class="nav-link link-black-100">{{ Auth::User()->name }}</a>
                        @else
                            <a id="sidebarNavToggler9" href="javascript:;" role="button"
                                class="px-2 nav-link link-black-100" aria-controls="sidebarContent9"
                                aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent9"
                                data-unfold-type="css-animation"
                                data-unfold-overlay='{
            "className": "u-sidebar-bg-overlay",
            "background": "rgba(0, 0, 0, .7)",
            "animationSpeed": 500
        }'
                                data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <i class="glph-icon flaticon-user"></i>
                            </a>
                        @endif
                    </li>
                    <li class="nav-item">

                        <a id="sidebarNavToggler1" href="javascript:;" role="button"
                            class="nav-link link-black-100 position-relative" aria-controls="sidebarContent1"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent1"
                            data-unfold-type="css-animation"
                            data-unfold-overlay='{
                                    "className": "u-sidebar-bg-overlay",
                                    "background": "rgba(0, 0, 0, .7)",
                                    "animationSpeed": 500
                                }'
                            data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                            <span
                                class="position-absolute bg-dark width-16 height-16 rounded-circle d-flex align-items-center justify-content-center text-white font-size-n9 right-0">{{ count($cart) }}</span>
                            <i class="glph-icon flaticon-icon-126515"></i>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </div>

    <img src="{{ asset('images/banner.jpg') }}" alt="logo" style="width: 100% !important">

    <div class="masthead border-bottom position-relative" style="margin-bottom: -1px;">
        <div class="container-fluid px-3 px-md-5 px-xl-8d75 py-2 py-md-0">
            <div class="d-flex align-items-center position-relative flex-wrap">
                <div class="offcanvas-toggler mr-4 mr-lg-8">
                    <a id="sidebarNavToggler2" href="javascript:;" role="button" class="cat-menu"
                        aria-controls="sidebarContent2" aria-haspopup="true" aria-expanded="false"
                        data-unfold-event="click" data-unfold-hide-on-scroll="false"
                        data-unfold-target="#sidebarContent2" data-unfold-type="css-animation"
                        data-unfold-overlay='{
                            "className": "u-sidebar-bg-overlay",
                            "background": "rgba(0, 0, 0, .7)",
                            "animationSpeed": 100
                        }'
                        data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                        data-unfold-duration="100">
                        <svg width="20px" height="18px">
                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                d="M-0.000,-0.000 L20.000,-0.000 L20.000,2.000 L-0.000,2.000 L-0.000,-0.000 Z" />
                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                d="M-0.000,8.000 L15.000,8.000 L15.000,10.000 L-0.000,10.000 L-0.000,8.000 Z" />
                            <path fill-rule="evenodd" fill="rgb(25, 17, 11)"
                                d="M-0.000,16.000 L20.000,16.000 L20.000,18.000 L-0.000,18.000 L-0.000,16.000 Z" />
                        </svg>
                    </a>
                </div>
                <div class="site-branding pr-md-4">
                    <a href="{{ url('/') }}" class="d-block mb-1">
                        <img src="{{ $website->getMedia('settings')[0]->getUrl('header') }}"
                            class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid"
                            alt="bettani-series-logo"></a>
                    </a>
                </div>
                <div class="site-navigation mr-auto d-none d-xl-block">
                    <ul class="nav">

                        <li class="nav-item"><a href="{{ url('/') }}"
                                class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium {{ Request::is('/') ? 'active border-bottom border-primary border-width-2' : '' }} ">Home</a>
                        </li>
                        <li class="nav-item"><a href="{{ url('books') }}"
                                class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium {{ Request::is('books') ? 'active border-bottom border-primary border-width-2' : '' }} ">Books</a>
                        </li>
                        <li class="nav-item"><a href="{{ url('about-us') }}"
                                class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium {{ Request::is('about-us') ? 'active border-bottom border-primary border-width-2' : '' }} ">About
                                Us</a></li>
                        <li class="nav-item"><a href="{{ url('contact-us') }}"
                                class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium {{ Request::is('contact-us') ? 'active border-bottom border-primary border-width-2' : '' }} ">Contact
                                Us</a></li>
                        <li class="nav-item"><a href="{{ url('test') }}"
                                class="nav-link link-black-100 mx-4 px-0 py-5 font-weight-medium {{ Request::is('contact-us') ? 'active border-bottom border-primary border-width-2' : '' }} ">Test</a>
                        </li>



                    </ul>
                </div>
                <ul class="d-md-none nav mr-md-n3 ml-auto">
                    <li class="nav-item">
                        @if (!Auth::guest())
                        @else
                            <a id="sidebarNavToggler9" href="javascript:;" role="button"
                                class="px-2 nav-link link-black-100" aria-controls="sidebarContent9"
                                aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent9"
                                data-unfold-type="css-animation"
                                data-unfold-overlay='{
                                    "className": "u-sidebar-bg-overlay",
                                    "background": "rgba(0, 0, 0, .7)",
                                    "animationSpeed": 500
                                }'
                                data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <i class="glph-icon flaticon-user"></i>
                            </a>
                        @endif

                    </li>
                </ul>
                <div class="site-search ml-xl-0 ml-md-auto w-r-100 my-2 my-xl-0">
                    <form class="form-inline">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i
                                    class="glph-icon flaticon-loupe input-group-text py-2d75 bg-white-100 border-white-100"></i>
                            </div>
                            <input class="form-control bg-white-100 min-width-380 py-2d75 height-4 border-white-100"
                                type="search" placeholder="Search for Books by Keyword ..." aria-label="Search">
                        </div>
                        <button class="btn btn-outline-success my-2 my-sm-0 sr-only" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
