$(document).ready(function () {
    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("fa-eye-slash");
            $('#show_hide_password i').removeClass("fa-eye");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password i').addClass("fa-eye");
        }
    });
});

$(function () {


    // var signupphon1 = document.querySelector("#signup-phone1");
    // window.intlTelInput(signupphon1, {
    //     // allowDropdown:true,
    //     autoPlaceholder: "polite",
    //     onlyCountries: ['pk'],
    //     utilsScript: "build/js/utils.js",
    // });



    // show hide answer



    var appUrl = $("meta[name=base_url]").attr("content");


    $(".forgetpassword").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: appUrl + '/forgot-password',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data === 'passwords.sent') {
                    Swal.fire({
                        "title": "Success",
                        "text": "Reset Link Send Successfully",
                        "timer": 5000,
                        "width": "32rem",
                        "padding": "1.25rem",
                        "showConfirmButton": false,
                        "showCloseButton": true,
                        "timerProgressBar": false,
                        "customClass": {
                            "container": null,
                            "popup": null,
                            "header": null,
                            "title": null,
                            "closeButton": null,
                            "icon": null,
                            "image": null,
                            "content": null, "input": null, "actions": null, "confirmButton": null, "cancelButton": null, "footer": null
                        }, "toast": true, "icon": "error", "position": "top-end"
                    });
                }
            }
        });

    });
    $(".LoginFrom").submit(function (e) {
        $('#errorLogin').html();
        e.preventDefault();
        $('#btnLogin').html('Login..');
        var formData = new FormData(this);

        $.ajax({
            url: appUrl + '/login2',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {

                console.log(data);
                if (data.response === "success") {
                    // window.location.replace(appUrl);
                    location.reload();
                }
                if (data.response === "fail") {


                    Swal.fire({
                        "title": "Unable to Login",
                        "text": data.message,
                        "timer": 5000,
                        "width": "32rem",
                        "padding": "1.25rem",
                        "showConfirmButton": false,
                        "showCloseButton": true,
                        "timerProgressBar": false,
                        "customClass": {
                            "container": null,
                            "popup": null,
                            "header": null,
                            "title": null,
                            "closeButton": null,
                            "icon": null,
                            "image": null,
                            "content": null, "input": null, "actions": null, "confirmButton": null, "cancelButton": null, "footer": null
                        }, "toast": true, "icon": "error", "position": "top-end"
                    });

                    $('#errorLogin').html('<small id="emailHelp" class="form-text text-muted">' + data.message + '</small>');
                    $('#btnLogin').html('Log In');
                }

            },
            error: function (data) {
                $('#btnLogin').html('Log In');
            }
        });
    });





    // Register Ajax Form 
    $(".registrionFrom").submit(function (e) {
        $('#errorRegistration').html();
        $('#errorRegistrationPassword').html();

        e.preventDefault();
        $('#btnRegister').html('Creating Account..');
        var formData = new FormData(this);
        $.ajax({
            url: appUrl + '/Register2',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.response === "success") {
                    // window.location.replace(appUrl + '/checkout');
                    location.reload();
                }
                if (data.response === "fail") {
                    var errorMessage = '';
                    if ('email' in data.error) {
                        errorMessage += data.error.email;
                    } else if ('password' in data.error) {
                        errorMessage += data.error.password;
                    } else if ('phone' in data.error) {
                        errorMessage += data.error.phone;
                    } else {
                        errorMessage = "Fail to Register please Try again";
                    }

                    Swal.fire({
                        "title": "Fail To Register",
                        "text": errorMessage,
                        "timer": 5000,
                        "width": "32rem",
                        "padding": "1.25rem",
                        "showConfirmButton": false,
                        "showCloseButton": true,
                        "timerProgressBar": false,
                        "customClass": {
                            "container": null,
                            "popup": null,
                            "header": null,
                            "title": null,
                            "closeButton": null,
                            "icon": null,
                            "image": null,
                            "content": null, "input": null, "actions": null, "confirmButton": null, "cancelButton": null, "footer": null
                        }, "toast": true, "icon": "error", "position": "top-end"
                    });



                    // $('#btnRegister').html('Sign Up');


                    // $('.errorRegistration').html(errorMessage);
                }

            },
            error: function (data) {
                $('#btnRegister').html('Create Account');

            }
        });
    });
});