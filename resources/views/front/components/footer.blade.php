<footer>
    <div class="border-top space-top-3">
        <div class="border-bottom pb-5 space-bottom-lg-3">
            <div class="container">

                <div class="space-bottom-2 space-bottom-md-3">
                    <div class="text-center mb-5">
                        <h5 class="font-size-7 font-weight-medium">Join Our Newsletter</h5>
                        <p class="text-gray-700">Signup to be the first to hear about exclusive deals, special offers and upcoming collections</p>
                    </div>

                    <div class="form-row justify-content-center">
                        <div class="col-md-5 mb-3 mb-md-2">
                            <div class="js-form-message">
                                <div class="input-group">
                                    <input type="text" class="form-control px-5 height-60 border-dark" name="name" id="signupSrName" placeholder="Enter email for weekly newsletter." aria-label="Your name" required="" data-msg="Name must contain only letters." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 ml-md-2">
                            <button type="submit" class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium">Subscribe
                            </button>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-4 mb-6 mb-lg-0">
                        <div class="pb-6">
                            <a href="{{url('/')}}" class="d-inline-block mb-5">
                                <img src="{{ $website->getMedia('settings')[0]->getUrl('header')}}" class="img-fluid d-block mx-auto attachment-shop_catalog size-shop_catalog wp-post-image img-fluid" alt="bettani-series-logo"></a>
                            </a>
                            <address class="font-size-2 mb-5">
                                <span class="mb-2 font-weight-normal text-dark">
                                    {!! $website->address !!}
                                </span>
                            </address>
                            <div class="mb-4">
                                <a href="mailto:{{$website->email}}" class="font-size-2 d-block link-black-100 mb-1">{{$website->email}}</a>
                                <a href="tel:{{$website->phone}}" class="font-size-2 d-block link-black-100">{{$website->phone}}</a>
                            </div>
                            <ul class="list-unstyled mb-0 d-flex">
                                <li class="btn pl-0">
                                    <a class="link-black-100" href="{{$website->instagram}}">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                </li>
                                <li class="btn">
                                    <a class="link-black-100" href="{{$website->facebook}}">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>
                                </li>
                                <li class="btn">
                                    <a class="link-black-100" href="{{$website->youtube}}">
                                        <span class="fab fa-youtube"></span>
                                    </a>
                                </li>
                                <li class="btn">
                                    <a class="link-black-100" href="{{$website->twitter}}">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                </li>
                                <li class="btn">
                                    <a class="link-black-100" href="{{$website->pinterest}}">
                                        <span class="fab fa-pinterest"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 mb-6 mb-lg-0">
                        <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1">Explore</h4>
                        <ul class="list-unstyled mb-0">
                            <li class="pb-2">
                                <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{url('about-us')}}">About as</a>
                            </li>
                            <li class="pt-2">
                                <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{url('contact-us')}}">Contact Us</a>
                            </li>
                            <li class="pt-2">
                                <a class="widgets-hover transition-3d-hover font-size-2 link-black-100" href="{{url('login')}}">Sign in/Join</a>
                            </li>


                        </ul>
                    </div>



                </div>
            </div>
        </div>
        <div class="space-1">
            <div class="container">
                <div class="d-lg-flex text-center text-lg-left justify-content-between align-items-center">

                    <p class="mb-3 mb-lg-0 font-size-2">{!! $website->copyright !!}</p>

                    <div class="ml-auto d-lg-flex align-items-center">
                        <div class="mb-4 mb-lg-0 mr-5">
                            <img class="img-fluid" src="{{ asset('UI/assets/img/324x38/img1.png')}}" alt="Image-Description">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>