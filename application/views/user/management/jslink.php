<script>
    var TableDatatablesAjax = function () {

        var handleTable = function () {


            var table = $('#datatable_ajax');

            var grid = new Datatable();

            grid.init({
                src: $("#datatable_ajax"),
                onSuccess: function (grid, response) {
                    // grid:        grid object
                    // response:    json object of server side ajax response
                    // execute some code after table records loaded
                },
                onError: function (grid) {
                    // execute some code on network or other general error
                },
                onDataLoad: function(grid) {
                    // execute some code on ajax data load
                },
                loadingMessage: 'Loading...',
                dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options

                    // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                    // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/scripts/datatable.js).
                    // So when dropdowns used the scrollable div should be removed.
                    //"dom": "<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'<'table-group-actions pull-right'>>r>t<'row'<'col-md-8 col-sm-12'pli><'col-md-4 col-sm-12'>>",

                    // save datatable state(pagination, sort, etc) in cookie.
                    "bStateSave": true,

                    // save custom filters to the state
                    "fnStateSaveParams":    function ( oSettings, sValue ) {
                        $("#datatable_ajax tr.filter .form-control").each(function() {
                            sValue[$(this).attr('name')] = $(this).val();
                        });

                        return sValue;
                    },

                    // read the custom filters from saved state and populate the filter inputs
                    "fnStateLoadParams" : function ( oSettings, oData ) {
                        //Load custom filters
                        $("#datatable_ajax tr.filter .form-control").each(function() {
                            var element = $(this);
                            if (oData[element.attr('name')]) {
                                element.val( oData[element.attr('name')] );
                            }
                        });

                        return true;
                    },

                    "lengthMenu": [
                        [10, 20, 50, 100, 150, -1],
                        [10, 20, 50, 100, 150, "All"] // change per page values here
                    ],
                    "pageLength": 20, // default record count per page
                    "ajax": {
                        "url": "<?php echo site_url('user/ajax_get_users'); ?>", // ajax source
                    },
                    "ordering": false,
                    "serverSide": false,
                    "order": [
                        [1, "asc"]
                    ]// set first column as a default sort by asc
                }
            });

            table.on('click', '.edit', function (e) {
                e.preventDefault();

                var nRow = $(this).parents('tr')[0];
                var input_name = $('.user-name', nRow).val();
                var input_email = $('.user-email', nRow).val();
                var input_phone = $('.user-phone', nRow).val();
                var input_address = $('.user-address', nRow).val();
                var input_status = $('.user-status', nRow).val();
                var input_id = $('.user-id', nRow).val();

                $('#user_name').val(input_name);
                $('#user_email').val(input_email);
                $('#user_phone').val(input_phone);
                $('#user_address').val(input_address);
                $('#user_status').val(input_status).change();
                $('#user_id').val(input_id);

                $('#m_user_edit_modal').modal('show');
            });

            table.on('click', '.delete', function (e) {
                e.preventDefault();

                var nRow = $(this).parents('tr')[0];
                var input_id = $('.user-id', nRow).val();

                if (confirm('<?=_l('del_question')?>')) {
                    process_ajax('',
                        '<?=site_url('user/ajax_delete_user')?>',
                        {
                            id: input_id
                        },
                        function (resp) {
                            showToast('success', 'toast-bottom-full-width', "<?=_l('success')?>");
                            setTimeout(function () {
                                location.reload();
                            }, 600);
                        },
                        function (resp) {
                            showToast('warning', 'toast-bottom-full-width', "<?=_l('failed')?>");
                        }
                    );
                }
            });

            table.on('click', 'tbody tr', function (e) {
                e.preventDefault();

                if ($(e.target).hasClass('edit') || $(e.target).hasClass('delete') || $(e.target).children('.edit').length)
                    return;

                if ($(this).children().length == 1)
                    return;

                var nRow = $(this);
                var input_name = $('.user-name', nRow).val();
                var input_email = $('.user-email', nRow).val();
                var input_phone = $('.user-phone', nRow).val();
                var input_address = $('.user-address', nRow).val();
                var input_status = $('.user-status', nRow).val();
                var input_id = $('.user-id', nRow).val();

                $('#info_name').val(input_name);
                $('#info_email').val(input_email);
                $('#info_phone').val(input_phone);
                $('#info_address').val(input_address);

                if(input_status == '1') {
                    $("#info_status").text("<?=_l('active')?>");
                }
                else {
                    $("#info_status").text("<?=_l('inactive')?>");
                }
                $('#m_user_info_modal').modal('show');
            })

            $('thead').find('.filter').find('input').on('keyup', function(e) {
                if (e.keyCode == 13) {
                    grid.submitFilter();
                }
            });

            $('thead').find('.filter').find('select').on('change', function () {
                grid.submitFilter();
            });

            //grid.setAjaxParam("customActionType", "group_action");
            //grid.getDataTable().ajax.reload();
            //grid.clearAjaxParams();
        }

        var editFormInit = function () {
            $('#edit_form').validate({
                // define validation rules
                rules: {
                    //=== Client Information(step 3)
                    //== Billing Information
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true
                    }
                },

                //display error alert on form submit
                invalidHandler: function(event, validator) {
                    swal("<?=_l('submit_error')?>");
                },

                submitHandler: function (form) {

                    process_ajax('',
                        '<?=site_url('user/ajax_update_user')?>',
                        $(form).serializeArray(),
                        function (resp) {
                            showToast('success', 'toast-bottom-full-width', "<?=_l('success')?>");
                            setTimeout(function() {
                                location.reload();
                            }, 600);
                        },
                        function (resp) {
                            showToast('warning', 'toast-bottom-full-width', "<?=_l('failed')?>");
                        }
                    );

                    return false;
                }
            });
        }

        return {

            //main function to initiate the module
            init: function () {

                handleTable();
                editFormInit();
            }

        };

    }();

    jQuery(document).ready(function() {
        $('.selectpicker').selectpicker();
        TableDatatablesAjax.init();
    });
</script>