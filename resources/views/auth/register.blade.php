@extends('front/layout/layout')
@section('content')
@section('title','Sign-up')
<main id="content">
    <div class="mb-5 space-bottom-lg-3">
        <div class="py-3 py-lg-7">
            <h6 class="font-weight-medium font-size-7 text-center my-1">Sign-up </h6>
        </div>

        <div class="container">
            <div class="mb-lg-8">
                <div class="col-lg-9 mx-auto card">
                    <div class="bg-white mt-n10 mt-md-n13 pt-5 pt-lg-7 px-3 px-md-5 pl-xl-10 pr-xl-4">
                        <div class="mb-2 mb-lg-7 ml-xl-4 card text-center">
                            <h6 class="font-weight medium font-size-10 mb-4 mb-lg-7 pt-4">Warmly Welcome to Bettani Series</h6>
                        </div>
                        <div id="signup" style="opacity: 1;" data-target-group="idForm" class="animated fadeIn">

                            <header class="border-bottom px-4 px-md-6 py-4">
                                <h2 class="font-size-3 mb-0 d-flex align-items-center"><i class="flaticon-resume mr-3 font-size-5"></i>Create Account</h2>
                            </header>

                            <div class="p-4 p-md-6">
                                <form class="registrionFrom">

                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control rounded-0 height-4 px-4" name="name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label class="form-label">Phone No *</label>
                                            <!-- <input id="signup-phone1" type="tel" class="form-control phoneNumberInput" name="phone" required=""> -->
                                            <input type="tel" class="form-control" name="phone" required="">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label id="signinEmailLabel1" class="form-label" for="signinEmail1">Email *</label>
                                            <input type="email" class="form-control rounded-0 height-4 px-4" name="email" id="signinEmail1" placeholder="creativelayers088@gmail.com" aria-label="creativelayers088@gmail.com" aria-describedby="signinEmailLabel1" required="">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <div class="js-form-message">
                                            <label for="exampleFormControlInput1">Gender</label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label id="signinPasswordLabel1" class="form-label" for="signinPassword1">Password *</label>
                                            <input type="password" class="form-control rounded-0 height-4 px-4" name="password" id="signinPassword1" placeholder="" aria-label="" aria-describedby="signinPasswordLabel1" required="">
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label id="signupConfirmPasswordLabel" class="form-label" for="signupConfirmPassword">Confirm Password *</label>
                                            <input type="password" class="form-control rounded-0 height-4 px-4" name="password_confirmation" id="signupConfirmPassword" placeholder="" aria-label="" aria-describedby="signupConfirmPasswordLabel" required="">
                                        </div>
                                    </div>

                                    <div class="errorRegistration">

                                    </div>

                                    <div class="form-group mb-4">
                                        
                             
                                    <input type="checkbox" required name="term">     <span class="small text-muted">Carefully fill this form. Fake information and data may adversely and negatively influence your account in future.</span>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Create Account</button>
                                    </div>
                                </form>
                                <div class="text-center mb-4">
                                    <span class="small text-muted">Already have an account?</span>
                                    <a class="js-animation-link small" href="{{url('login')}}" data-target="#login" data-link-group="idForm" data-animation-in="fadeIn">Login
                                    </a>
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