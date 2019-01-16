<script>

    var process_ajax = function (blockDiv, url, data, successCallback, errorCallback) {
        if (!blockDiv && blockDiv != '') $('#' + blockDiv).prop('disabled', true);
        $(document.body).css({'cursor' : 'wait'});
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data: data,
            success: function (resp) {
                $(document.body).css({'cursor' : 'default'});
                if (!blockDiv && blockDiv != '') $('#' + blockDiv).prop('disabled', false);
                if (resp.state == 'success') {
                    successCallback(resp);
                } else {
                    errorCallback(resp);
                }
            },
            error: function () {
                errorCallback('Error occured.');
                $(document.body).css({'cursor' : 'default'});
            }
        });
    };

    // Functions made by Alex

    var process_form_data = function (blockDiv, url, data, successCallback, errorCallback) {
        if (!blockDiv && blockDiv != '') $('#' + blockDiv).prop('disabled', true);
        $(document.body).css({'cursor' : 'wait'});

        var request = new XMLHttpRequest();
        request.open("POST", url);

        request.onload = function() {
            var resp;
            resp = JSON.parse(request.responseText);

            $(document.body).css({'cursor' : 'default'});
            if (!blockDiv && blockDiv != '') $('#' + blockDiv).prop('disabled', false);

            if (resp.state == 'success') {
                successCallback(resp);
            } else {
                errorCallback(resp);
            }
            return;
        };
        request.send(data);
    };

    //Functions End

    function showToast(toasttype, position, message, strtitle) {
        var shortCutFunction = toasttype;
        var msg = message;
        var title = strtitle || '';
        var $showDuration = "1000";
        var $hideDuration = "1000";
        var $timeOut = "5000";
        var $extendedTimeOut = "1000";
        var $showEasing = "swing";
        var $hideEasing = "linear";
        var $showMethod = "fadeIn";
        var $hideMethod = "fadeOut";
        //var toastIndex = toastCount++;
//                toastr.clear();

        toastr.options = {
            closeButton: true,
            debug: false,
            positionClass: position,
            onclick: null
        };

        if (jQuery('#addBehaviorOnToastClick').prop('checked')) {
            toastr.options.onclick = function () {
                alert('You can perform some custom action after a toast goes away');
            };
        }

        if ($showDuration.length) {
            toastr.options.showDuration = $showDuration;
        }

        if ($hideDuration.length) {
            toastr.options.hideDuration = $hideDuration;
        }

        if ($timeOut.length) {
            toastr.options.timeOut = $timeOut;
        }

        if ($extendedTimeOut.length) {
            toastr.options.extendedTimeOut = $extendedTimeOut;
        }

        if ($showEasing.length) {
            toastr.options.showEasing = $showEasing;
        }

        if ($hideEasing.length) {
            toastr.options.hideEasing = $hideEasing;
        }

        if ($showMethod.length) {
            toastr.options.showMethod = $showMethod;
        }

        if ($hideMethod.length) {
            toastr.options.hideMethod = $hideMethod;
        }

        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
        if ($toast.find('#okBtn').length) {
            $toast.delegate('#okBtn', 'click', function () {
                //alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                $toast.remove();
            });
        }
        if ($toast.find('#surpriseBtn').length) {
            $toast.delegate('#surpriseBtn', 'click', function () {
                //alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
            });
        }

        jQuery('#clearlasttoast').click(function () {
            toastr.clear($toastlast);
        });
    }

    function validate_email(sEmail) {
        var filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (filter.test(sEmail)) {
            return true;
        }
        else {
            return false;
        }
    }

    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
