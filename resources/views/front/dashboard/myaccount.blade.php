@extends('front/layout/layout')
@section('content')
@section('title','My Account')

<main id="content">
    <div class="bg-gray-200 space-bottom-3">
        <div class="container">
            <div class="row">
                @include('front/components/sidebar')

                <div class="col-md-9">
                    <div class="py-5 py-lg-7">
                        <h6 class="font-weight-medium font-size-7 text-center mt-lg-1">My Account</h6>
                    </div>
                    <div class="max-width-890 mx-auto">
                        <div class="bg-white pt-6 border">

                            <div class="border-bottom mb-6 pb-6 mb-lg-8 pb-lg-9">
                                <div class="pt-5 pl-md-5 pt-lg-8 pl-lg-9">
                                    <h6 class="font-weight-medium font-size-7 ml-lg-1 mb-lg-8 pb-xl-1">Account Details</h6>
                                    <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Edit Account</div>
                                    <form action="{{url('update-profile')}}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="js-form-message">
                                                    <label for="exampleFormControlInput1">Full name *</label>
                                                    <input type="text" value="{{Auth::User()->name}}" class="form-control rounded-0 pl-3 placeholder-color-3" id="exampleFormControlInput1" name="name" aria-label="Jack Wayley" placeholder="Ali" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                                </div>
                                            </div>


                                            <div class="col-md-12 mb-4">
                                                <div class="js-form-message">
                                                    <label for="exampleFormControlInput1">Gender</label>
                                                    <br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" {{Auth::User()->gender=='male'? 'checked' : null }}>
                                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" {{Auth::User()->gender=='female'? 'checked' : null }}>
                                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <label for="street-address" class="form-label">Street address <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text form-control" name="address" id="street-address" value="{{Auth::User()->address}}" placeholder="House number and street name" value="{{Auth::User()->address}}" autocomplete="address-line1" required>
                                            </div>

                                            <div class="ml-3">
                                                <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390"> Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="pl-md-5 pl-lg-9 space-bottom-2 space-bottom-lg-3">
                                <div class="font-weight-medium font-size-22 mb-4 pb-xl-1">Password Change</div>
                                <form action="{{url('change-password')}}" method="post" class="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="js-form-message">
                                                <label for="exampleFormControlInput5">Current Password</label>
                                                <input type="password" class="form-control rounded-0" name="old_password" id="exampleFormControlInput5" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter your name." data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <div class="js-form-message">
                                                <label for="exampleFormControlInput6">New Password</label>
                                                <input type="password" class="form-control rounded-0" name="new_password" id="exampleFormControlInput6" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="New Password" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-5">
                                            <div class="js-form-message">
                                                <label for="exampleFormControlInput7">Confirm new password</label>
                                                <input type="password" class="form-control rounded-0" name="new_password_confirmation" id="exampleFormControlInput7" aria-label="Jack Wayley" required="" data-error-class="u-has-error" data-msg="Please enter Confirmation Password" data-success-class="u-has-success">
                                            </div>
                                        </div>
                                        <div class="ml-3">
                                            <button type="submit" class="btn btn-wide btn-dark text-white rounded-0 transition-3d-hover height-60 width-390"> Change Password</button>
                                        </div>

                                    </div>
                                </form>
                            </div>




                        </div>
                    </div>
                    <div>
                        <div>
                            <div>
                            </div>
                        </div>
</main>
@endsection

@section('script')

<script type="text/javascript" async="">
    var placeSearch, autocomplete;
    var componentForm = {
        postal_code: 'long_name'
    };

    function loadplaces() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.

        var element = document.getElementById('street-address');
        if (typeof(element) != 'undefined' && element != null) {

            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */
                (document.getElementById('street-address')), {
                    types: ['address'],
                    componentRestrictions: {
                        // country: ["us", "ca"]
                    }
                });

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }



        var element = document.getElementById('googleMap');
        if (typeof(element) != 'undefined' && element != null) {
            myMap();
        }
    }


    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = "";
            document.getElementById(component).disabled = false;
        }
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
</script>


<script async type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUVNN3YIHM1Yug2TOuoha4aKgWkh0TwvA&libraries=places&callback=loadplaces"></script>
@stop