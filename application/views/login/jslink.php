<script>
    var Login = function () {

        var handleLogin = function () {

            $('.login-form').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                    remember: {
                        required: false
                    }
                },

                messages: {
                    email: {
                        required: "Email is required.",
                        email: "Email is invalid."
                    },
                    password: {
                        required: "Password is required."
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    $('.alert-danger span', $('.login-form')).html("Enter valid email and password.");
                    $('.alert-danger', $('.login-form')).show();
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-icon'));
                },

                submitHandler: function (form) {
                    form.submit(); // form validation success, call ajax form submit
                }
            });

            $('.login-form input').keypress(function (e) {
                if (e.which == 13) {
                    if ($('.login-form').validate().form()) {
                        submitLogin();
                        // $('.login-form').submit(); //form validation success, call ajax form submit
                    }
                    return false;
                }
            });

            $('.forget-form input').keypress(function (e) {
                if (e.which == 13) {
                    if ($('.forget-form').validate().form()) {
                        $('.forget-form').submit();
                    }
                    return false;
                }
            });

            $('#forget-password').click(function () {
                $('.login-form').hide();
                $('.forget-form').show();
            });

            $('#back-btn').click(function () {
                $('.login-form').show();
                $('.forget-form').hide();
            });

            $('.btn-login').click(function() {
                if ($('.login-form').validate().form()) {
                    submitLogin();
                }
            });
        }

        var submitLogin = function() {

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('login/ajax_login'); ?>",
                data: $('.login-form').serializeArray(),
                dataType: 'json',
                success: function (resp) {
                    if (resp.state == 'success') {
                        window.location.href = resp.url;
                    } else {
                        $('.alert-danger span', $('.login-form')).html(resp.message);
                        $('.alert-danger', $('.login-form')).show();
                    }
                },
                error: function () {
                    $('.alert-danger span', $('.login-form')).html("Error occured.");
                    $('.alert-danger', $('.login-form')).show();
                }
            });
        }


        return {
            //main function to initiate the module
            init: function () {

                handleLogin();

                // init background slide images
                $.backstretch([
                        "<?=base_url('assets')?>/pages/img/login/custom-bg1.jpg"
                    ], {
                        fade: 1000,
                        duration: 8000
                    }
                );

                $('.forget-form').hide();
            }

        };

    }();

    jQuery(document).ready(function () {
        Login.init();
    });
</script>