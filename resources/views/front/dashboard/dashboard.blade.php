@extends('front/layout/layout')
@section('content')
@section('title','Dashboard')
<main id="content">
    <div class="container">
        <div class="row">
            @include('front/components/sidebar')
            <div class="col-md-9">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab">
                        <div class="pt-5 pt-lg-8 pl-md-5 pl-lg-9 space-bottom-2 space-bottom-lg-3 mb-xl-1">
                            <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Dashboard</h6>
                            <div class="ml-lg-1 mb-4">
                                <span class="font-size-22">Hello {{Auth::User()->name}}</span>
                                <span class="font-size-2"> (not {{Auth::User()->name}}? <a class="link-black-100" href="{{url('logout')}}">Log out</a>)</span>
                            </div>
                            <div class="mb-4">
                                <p class="mb-0 font-size-2 ml-lg-1 text-gray-600">From your account dashboard you can view your <span class="text-dark">recent orders,</span> manage and edit your <span class="text-dark">password and account details.</span></p>
                            </div>
                            <div class="row no-gutters row-cols-1 row-cols-md-2 row-cols-lg-3">
                                <div class="col">
                                    <div class="border py-6 text-center">
                                        <a href="{{url('myorders')}}" class="btn btn-primary rounded-circle px-4 mb-2">
                                            <span class="flaticon-order font-size-10 btn-icon__inner"></span>
                                        </a>
                                        <div class="font-size-3 mb-xl-1">Orders</div>
                                    </div>
                                </div>


                                <div class="col">
                                    <div class="border py-6 text-center">
                                        <a href="{{url('myaccount')}}" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                                            <span class="flaticon-user-1 font-size-10 btn-icon__inner text-primary"></span>
                                        </a>
                                        <div class="font-size-3 mb-xl-1">Account Details</div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="border border-left-0 py-6 text-center">
                                        <a href="#" class="btn bg-gray-200 rounded-circle px-4 mb-2">
                                            <span class="flaticon-exit font-size-10 btn-icon__inner text-primary"></span>
                                        </a>
                                        <div class="font-size-3 mb-xl-1">Orders</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab">
                        <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-lg-2 mb-lg-4">
                            <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Downloads</h6>
                            <table class="table">
                                <thead>
                                    <tr class="border">
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-md-5">Order</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Date</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Staus</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Total</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border">
                                        <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">#30785</th>
                                        <td class="align-middle py-5">March 26, 2020</td>
                                        <td class="align-middle py-5">On hold</td>
                                        <td class="align-middle py-5">
                                            <span class="text-primary">$1,855.00</span> for 5 items
                                        </td>
                                        <td class="align-middle py-5">
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-dark rounded-0 btn-wide font-weight-medium">View
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-four-example1" role="tabpanel" aria-labelledby="pills-four-example1-tab">
                        <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-2 mb-lg-4">
                            <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-5 mb-lg-8 pb-xl-1">Addresses</h6>
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <div class="mb-6 mb-md-0">
                                        <h6 class="font-weight-medium font-size-22 mb-3">Billing Address
                                        </h6>
                                        <address class="d-flex flex-column mb-4">
                                            <span class="text-gray-600 font-size-2">Ali Tufan</span>
                                            <span class="text-gray-600 font-size-2">Bedford St,</span>
                                            <span class="text-gray-600 font-size-2">Covent Garden, </span>
                                            <span class="text-gray-600 font-size-2">London WC2E 9ED</span>
                                            <span class="text-gray-600 font-size-2">United Kingdom</span>
                                        </address>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-dark width-150 rounded-0 btn-wide font-weight-medium">Edit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="font-weight-medium font-size-22 mb-3">Shipping Address
                                    </h6>
                                    <address class="d-flex flex-column mb-4">
                                        <span class="text-gray-600 font-size-2">Ali Tufan</span>
                                        <span class="text-gray-600 font-size-2">Bedford St,</span>
                                        <span class="text-gray-600 font-size-2">Covent Garden, </span>
                                        <span class="text-gray-600 font-size-2">London WC2E 9ED</span>
                                        <span class="text-gray-600 font-size-2">United Kingdom</span>
                                    </address>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-dark width-150 rounded-0 btn-wide font-weight-medium">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-five-example1" role="tabpanel" aria-labelledby="pills-five-example1-tab">
                        <div class="border-bottom mb-6 pb-6 mb-lg-8 pb-lg-9">
                            <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9">
                                <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Account Details</h6>
                                <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Edit Account</div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput1">First name *</label>
                                            <input type="text" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput1" name="name" aria-label="Jack Wayley" placeholder="Ali" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput2">Last name *</label>
                                            <input type="text" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput2" name="name" aria-label="Jack Wayley" placeholder="TUF.." required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput3">Display name</label>
                                            <input type="text" class="form-control rounded-0" name="name" aria-label="Jack Wayley" id="exampleFormControlInput3" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-4 mb-md-0">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput4">Email address</label>
                                            <input type="email" class="form-control rounded-0" name="name" id="exampleFormControlInput4" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-md-5 pl-lg-9 space-bottom-2 space-bottom-lg-3">
                            <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Password Change</div>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="js-form-message">
                                        <label for="exampleFormControlInput5">Current Password</label>
                                        <input type="password" class="form-control rounded-0" name="name" id="exampleFormControlInput5" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="js-form-message">
                                        <label for="exampleFormControlInput6">New Password</label>
                                        <input type="password" class="form-control rounded-0" name="name" id="exampleFormControlInput6" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-5">
                                    <div class="js-form-message">
                                        <label for="exampleFormControlInput7">Confirm new password</label>
                                        <input type="password" class="form-control rounded-0" name="name" id="exampleFormControlInput7" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-six-example1" role="tabpanel" aria-labelledby="pills-six-example1-tab">
                        <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9 space-bottom-lg-3">
                            <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Wishlist</h6>
                            <table class="table mb-0">
                                <thead>
                                    <tr class="border">
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium pl-3 pl-md-5">Prouct</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Price</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Stock Staus</th>
                                        <th scope="col" class="py-3 border-bottom-0 font-weight-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border">
                                        <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">
                                            <div class="d-flex align-items-center">
                                                <a class="d-block" href="#">
                                                    <img class="img-fluid" src="../../assets/img/90x138/img1.jpg" alt="Image-Description">
                                                </a>
                                                <div class="ml-xl-4">
                                                    <div class="font-weight-normal">
                                                        <a href="#">The Overdue Life of Amy Byler</a>
                                                    </div>
                                                    <div class="font-size-2"><a href="#" class="text-gray-700" tabindex="0">Jay Shetty</a></div>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle py-5">$37</td>
                                        <td class="align-middle py-5">In Stock</td>
                                        <td class="align-middle py-5">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                        </td>
                                    </tr>
                                    <tr class="border">
                                        <th class="pl-3 pl-md-5 font-weight-normal align-middle py-6">
                                            <div class="d-flex align-items-center">
                                                <a class="d-block" href="#">
                                                    <img class="img-fluid" src="../../assets/img/90x138/img3.jpg" alt="Image-Description">
                                                </a>
                                                <div class="ml-xl-4">
                                                    <div class="font-weight-normal">
                                                        <a href="#">The Overdue Life of Amy Byler</a>
                                                    </div>
                                                    <div class="font-size-2"><a href="#" class="text-gray-700" tabindex="0">Jay Shetty</a></div>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle py-5">$37</td>
                                        <td class="align-middle py-5">In Stock</td>
                                        <td class="align-middle py-5">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                        </td>
                                    </tr>
                                    <tr class="border">
                                        <th class="pl-5 font-weight-normal align-middle py-6">
                                            <div class="d-flex align-items-center">
                                                <a class="d-block" href="#">
                                                    <img class="img-fluid" src="../../assets/img/90x138/img4.jpg" alt="Image-Description">
                                                </a>
                                                <div class="ml-xl-4">
                                                    <div class="font-weight-normal">
                                                        <a href="#">The Overdue Life of Amy Byler</a>
                                                    </div>
                                                    <div class="font-size-2"><a href="#" class="text-gray-700" tabindex="0">Jay Shetty</a></div>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle py-5">$37</td>
                                        <td class="align-middle py-5">In Stock</td>
                                        <td class="align-middle py-5">
                                            <span class="product__add-to-cart">ADD TO CART</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection