<div class="row">
    <div class="col-md-12">
        <!-- Begin: Demo Datatable 1 -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-users font-dark"></i>
                    <span class="caption-subject font-dark sbold"><?=$this->lang->line('user_management')?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="datatable_ajax">
                        <thead>
                        <tr role="row" class="heading">
                            <th> # </th>
                            <th> <?=$this->lang->line('name')?> </th>
                            <th> <?=$this->lang->line('email')?> </th>
                            <th> <?=$this->lang->line('phone')?> </th>
                            <th> <?=$this->lang->line('address')?> </th>
                            <th> <?=$this->lang->line('status')?> </th>
                            <th> <?=$this->lang->line('actions')?> </th>
                        </tr>
                        <tr role="row" class="filter">
                            <td>

                            </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="name"> </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="email"> </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="phone"> </td>
                            <td>
                                <input type="text" class="form-control form-filter input-sm" name="address"> </td>
                            <td>
                                <select name="filter_status" class="form-control form-filter selectpicker input-sm">
                                    <option value=""><?=$this->lang->line('select_all')?></option>
                                    <option value="1"><?=$this->lang->line('active')?></option>
                                    <option value="0"><?=$this->lang->line('inactive')?></option>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                    <i class="fa fa-search"></i><?=$this->lang->line('search')?></button>
                                <button class="btn btn-sm red btn-outline filter-cancel">
                                    <i class="fa fa-times"></i><?=$this->lang->line('reset')?></button>
                            </td>
                        </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End: Demo Datatable 1 -->
    </div>
</div>

<div class="modal fade" id="m_user_edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">
                    <?=$this->lang->line('edit_user_info')?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" class="m-form m-form--state m-form--fit m-form--label-align-right" id="edit_form">
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label class="form-control-label">
                                        * <?=$this->lang->line('name')?>:
                                    </label>
                                    <input type="hidden" id="user_id" name="uid" />
                                    <input type="text" id="user_name" name="name" class="form-control m-input" placeholder="Jackson William" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label class="form-control-label">
                                        * <?=$this->lang->line('email')?>:
                                    </label>
                                    <input type="text" id="user_email" name="email" class="form-control m-input" placeholder="jackson@gmail.com" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label class="form-control-label">
                                        * <?=$this->lang->line('phone')?>:
                                    </label>
                                    <input type="text" id="user_phone" name="phone" class="form-control m-input" placeholder="1-(555)-555-5555" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label class="form-control-label">
                                        * <?=$this->lang->line('address')?>:
                                    </label>
                                    <input type="text" id="user_address" name="address" class="form-control m-input" placeholder="Probe Adresse" value="">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-12">
                                    <label class="form-control-label">
                                        * <?=$this->lang->line('status')?>:
                                    </label>
                                    <select id="user_status" name="user_status" class="form-control selectpicker form-filter input-sm">
                                        <option value="1"><?=$this->lang->line('active')?></option>
                                        <option value="0"><?=$this->lang->line('inactive')?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <button type="submit" class="btn btn-primary">
                                        <?=$this->lang->line('save_btn')?>
                                    </button>
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">
                                        <?=$this->lang->line('cancel_btn')?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="m_user_info_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title">
                    <?=$this->lang->line('user_info')?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <input type="text" id="info_name" name="name" class="form-control m-input" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <input type="text" id="info_email" name="email" class="form-control m-input" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <input type="text" id="info_phone" name="phone" class="form-control m-input" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <input type="text" id="info_address" name="address" class="form-control m-input" value="" readonly>
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <div class="col-lg-12">
                                <button type="button" id="info_status" class="btn btn-circle green btn-outline"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">
                                    <?=$this->lang->line('close_btn')?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>