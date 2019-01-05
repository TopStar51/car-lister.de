<div class="row">
    <div class="col-md-12">
        <!-- Begin: Demo Datatable 1 -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold"><?=_l('add_user')?></span>
                </div>
            </div>

            <div class="portlet-body">
                <div class="m-form__section m-form__section--first">
                    <form action="" method="POST" enctype="multipart/form-data" class="m-form m-form--state m-form--fit m-form--label-align-right" id="add_form">
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label class="form-control-label">
                                            * <?=_l('name')?>:
                                        </label>
                                        <input type="text" name="name" class="form-control m-input" placeholder="Jackson William" value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label class="form-control-label">
                                            * <?=_l('email')?>:
                                        </label>
                                        <input type="text" name="email" class="form-control m-input" placeholder="jackson@gmail.com" value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label class="form-control-label">
                                            * <?=_l('password')?>:
                                        </label>
                                        <input type="password" id="passwort" name="passwort" class="form-control m-input" placeholder="******" value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label class="form-control-label">
                                            * <?=_l('confirm_password')?>:
                                        </label>
                                        <input type="password" name="confirm_password" class="form-control m-input" placeholder="******" value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label class="form-control-label">
                                            * <?=_l('phone')?>:
                                        </label>
                                        <input type="text" name="telefon" class="form-control m-input" placeholder="1-(555)-555-5555" value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label class="form-control-label">
                                            * <?=_l('address')?>:
                                        </label>
                                        <input type="text" name="adresse" class="form-control m-input" placeholder="Probe Adresse" value="">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-lg-6">
                                        <label class="form-control-label">
                                            * <?=_l('status')?>:
                                        </label>
                                        <select name="is_active" class="form-control selectpicker form-filter input-sm">
                                            <option value="1"><?=_l('active')?></option>
                                            <option value="0"><?=_l('inactive')?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit" style="margin-top: 30px">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <button type="submit" class="btn btn-primary btn-save">
                                            <?=_l('save_btn')?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End: Demo Datatable 1 -->
    </div>
</div>