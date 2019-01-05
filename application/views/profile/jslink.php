<script type="text/javascript">
var FormValidation = function () {

    // basic validation
    var handleProfileValidation = function() {
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation

        var form = $('#form_profile');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        var neterror = $('.alert-warning', form);

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            messages: {
                select_multi: {
                    maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                    minlength: jQuery.validator.format("At least {0} items must be selected")
                }
            },
            rules: {
                name: {
                    required: true
                },
                adresse: {
                    required: true
                },
                telefon: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success.hide();
                error.show();
                App.scrollTo(error, -200);
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var cont = $(element).parent('.input-group');
                if (cont.size() > 0) {
                    cont.after(error);
                } else {
                    element.after(error);
                }
            },

            highlight: function (element) { // hightlight error inputs

                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                error.hide();
                neterror.hide();
                process_ajax('',
                    '<?=site_url('profile/update_profile')?>',
                    $(form).serializeArray(),
                    function (resp) {
                        success.show();
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    },
                    function (resp) {
                        neterror.show();
                    }
                );
            }
        });
    }

    // password validation
    var handlePasswordValidation = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form = $('#form_password');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);
            var neterror = $('.alert-warning', form);

            form.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    cur_password: {
                        required: true
                    },
                    new_password: {
                        required: true,
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "[name='new_password']"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success.hide();
                    error.show();
                    App.scrollTo(error, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var cont = $(element).parent('.input-group');
                    if (cont.size() > 0) {
                        cont.after(error);
                    } else {
                        element.after(error);
                    }
                },

                highlight: function (element) { // hightlight error inputs

                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    error.hide();
                    neterror.hide();
                    process_ajax('',
                        '<?=site_url('profile/update_password')?>',
                        $(form).serializeArray(),
                        function (resp) {
                            success.show();
                            setTimeout(function() {
                                location.reload();
                            }, 500);
                        },
                        function (resp) {
                            neterror.show();
                        }
                    );
                }
            });


    }

    return {
        //main function to initiate the module
        init: function () {

            handleProfileValidation();
            handlePasswordValidation();

        }

    };

}();

jQuery(document).ready(function() {
    FormValidation.init();
});
</script>