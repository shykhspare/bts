@extends('front/layout/layout')
@section('content')
@section('title','Login')
<main id="content">
    <div class="mb-5 space-bottom-lg-3">
        <div class="py-3 py-lg-7">
            <h6 class="font-weight-medium font-size-7 text-center my-1">Login </h6>
        </div>

        <div class="container">
            <div class="mb-lg-8">
                <div class="col-lg-9 mx-auto card">
                    <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-4">
                        <div class="mb-2 mb-lg-7 ml-xl-4 card text-center">
                            <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7 pt-4">Warmly Welcome to Bettani Series</h6>
                        </div>
                        <div id="login" data-target-group="idForm">

                            <header class="border-bottom px-4 px-md-6 py-4">
                                <h2 class="font-size-3 mb-0 d-flex align-items-center"><i class="flaticon-user mr-3 font-size-5"></i>Account</h2>
                            </header>

                            <div class="p-4 p-md-6">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label id="signinEmailLabel" class="form-label" for="signinEmail">Username or email *</label>
                                            <input type="email" class="form-control rounded-0 height-4 px-4" name="email" id="signinEmail" placeholder="creativelayers088@gmail.com" aria-label="creativelayers088@gmail.com" aria-describedby="signinEmailLabel" required="">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label id="signinPasswordLabel" class="form-label" for="signinPassword">Password *</label>
                                            <input type="password" class="form-control rounded-0 height-4 px-4" name="password" id="signinPassword" placeholder="" aria-label="" aria-describedby="signinPasswordLabel" required="">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mb-5 align-items-center">

                                        <div class="js-form-message">
                                            <div class=" d-flex align-items-center text-muted">
                                                <input type="checkbox" id="termsCheckbox" name="termsCheckbox">
                                                <label class="custom-control-label" for="termsCheckbox">
                                                    <span class="font-size-2 text-secondary-gray-700">
                                                        Remember me
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                        <a class="js-animation-link text-dark font-size-2 t-d-u link-muted font-weight-medium" href="javascript:;" data-target="#forgotPassword" data-link-group="idForm" data-animation-in="fadeIn">Forgot Password?</a>
                                    </div>
                                    <div class="mb-4d75">
                                        <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Sign In</button>
                                    </div>
                                </form>
                                <div class="mb-2">
                                    <a href="{{url('register')}}" class=" btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium">Create Account</a>
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