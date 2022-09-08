<!DOCTYPE html>
<html lang="en">

<head>

    <title>@yield('title') - Bettani Series</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ URL::to('/') }}">
    <link rel="shortcut icon" href="{{ asset('UI/assets/img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('UI/assets/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('UI/assets/vendor/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('UI/assets/vendor/animate.css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('UI/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('UI/assets/vendor/slick-carousel/slick/slick.css')}}" />
    <link rel="stylesheet" href="{{ asset('UI/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('UI/assets/vendor/intl-tel-input-master/build/css/intlTelInput.css')}}">
    <link rel="stylesheet" href="{{ asset('UI/assets/css/theme.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- <link href="{{ asset('UI/assets/vendor/bootstrap5/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <!-- <script src="{{ asset('UI/assets/vendor/bootstrap5/js/bootstrap.bundle.min.js')}}"></script> -->
</head>

<body>

    <!-- import header in body  -->
    @include('front/components/header')
    <!-- end of header  -->
    <!-- import siderbar in body  -->
    @include('sweetalert::alert')
    @include('front/components/aside')
    <!-- end of siderbar  -->

    @yield('content')

    <!-- import header in body  -->
    @include('front/components/footer')
    <!-- end of header  -->



    <script src="{{ asset('UI/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('UI/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
    <script src="{{ asset('UI/assets/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('UI/assets/vendor/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('UI/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('UI/assets/vendor/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{ asset('UI/assets/vendor/multilevel-sliding-mobile-menu/dist/jquery.zeynep.js')}}"></script>
    <script src="{{ asset('UI/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <script src="{{ asset('UI/assets/js/hs.core.js')}}"></script>
    <script src="{{ asset('UI/assets/js/components/hs.unfold.js')}}"></script>
    <script src="{{ asset('UI/assets/js/components/hs.malihu-scrollbar.js')}}"></script>
    <script src="{{ asset('UI/assets/js/components/hs.header.js')}}"></script>
    <script src="{{ asset('UI/assets/js/components/hs.slick-carousel.js')}}"></script>
    <script src="{{ asset('UI/assets/js/components/hs.selectpicker.js')}}"></script>
    <script src="{{ asset('UI/assets/js/components/hs.show-animation.js')}}"></script>
    <script src="{{asset('UI/assets/vendor/intl-tel-input-master/build/js/intlTelInput.js')}}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script>
        $(document).on('ready', function() {

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));

            // initialization of malihu scrollbar
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');

            // init zeynepjs
            var zeynep = $('.zeynep').zeynep({
                onClosed: function() {
                    // enable main wrapper element clicks on any its children element
                    $("body main").attr("style", "");

                    console.log('the side menu is closed.');
                },
                onOpened: function() {
                    // disable main wrapper element clicks on any its children element
                    $("body main").attr("style", "pointer-events: none;");

                    console.log('the side menu is opened.');
                }
            });

            // handle zeynep overlay click
            $(".zeynep-overlay").click(function() {
                zeynep.close();
            });

            // open side menu if the button is clicked
            $(".cat-menu").click(function() {
                if ($("html").hasClass("zeynep-opened")) {
                    zeynep.close();
                } else {
                    zeynep.open();
                }
            });
        });


        // var input = document.querySelector(".phone");
        // window.intlTelInput(input, {
        //     formatOnDisplay: true,
        //     onlyCountries: ['pk'],
        //     utilsScript: "build/js/utils.js",
        // });
    </script>


    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "110200458390481");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v14.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- <style type="text/css" media="print">
        * {
            display: none;
        }
    </style>
    <script>
        $(document).bind("contextmenu", function(e) {
            return false;
        });
    </script> -->
    @yield('script')
</body>

<!-- Mirrored from demo2.madrasthemes.com/bookworm-html/redesigned-octo-fiesta/html-demo/home/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 May 2022 07:51:23 GMT -->

</html>