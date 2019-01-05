    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold"><?=_l('my_profile')?></span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_personal" data-toggle="tab"><?=_l('personal_info')?></a>
                        </li>
                        <li>
                            <a href="#tab_password" data-toggle="tab"><?=_l('change_password')?></a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane active" id="tab_personal">
                            <form action="javascript:;" method="post" id="form_profile" class="form-horizontal">
                            	<div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> <?=_l('profile_err_msg')?> </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> <?=_l('personal_succ_msg')?> </div>
                                    <div class="alert alert-warning display-hide">
                                        <button class="close" data-close="alert"></button> <?=_l('network_error')?> </div>
	                                <div class="form-group">
                                        <label class="control-label col-md-3"><?=_l('name')?>
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
		                                    <input type="text" placeholder="John" name="name" class="form-control" value="<?=$user_data->name?>" />
		                                </div>
		                            </div>
	                                <div class="form-group">
                                        <label class="control-label col-md-3"><?=_l('phone')?>
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
		                                    <input type="text" placeholder="+1 646 580 DEMO (6284)" name="telefon" class="form-control" value="<?=$user_data->telefon?>" />
		                                </div>
		                            </div>
	                                <div class="form-group">
                                        <label class="control-label col-md-3"><?=_l('email')?>
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
		                                    <input type="email" placeholder="example@email.com" name="email" class="form-control" value="<?=$user_data->email?>" />
		                                </div>
		                            </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3"><?=_l('address')?>
                                            <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="sample address" name="adresse" class="form-control" value="<?=$user_data->adresse?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green"><?=_l('save_btn')?></button>
                                            <button type="button" class="btn grey-salsa btn-outline"><?=_l('cancel_btn')?></button>
                                        </div>
                                    </div>
	                            </div>
                            </form>
                        </div>
                        <!-- END PERSONAL INFO TAB -->
                        <!-- CHANGE PASSWORD TAB -->
                        <div class="tab-pane" id="tab_password">
                            <form action="javascript:;" method="post" id="form_password" class="form-horizontal">
                            	<div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> <?=_l('profile_err_msg')?> </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> <?=_l('password_succ_msg')?> </div>
                                    <div class="alert alert-warning display-hide">
                                        <button class="close" data-close="alert"></button> <?=_l('check_cur_pwd')?> </div>
	                            	<div class="form-group">
	                                    <label class="control-label col-md-3"><?=_l('cur_password')?>
	                                        <span class="required"> * </span>
	                                    </label>
	                                    <div class="col-md-4">
		                                    <input type="password" class="form-control" name="cur_password" />
		                                </div>
		                            </div>
	                            	<div class="form-group">
	                                    <label class="control-label col-md-3"><?=_l('new_password')?>
	                                        <span class="required"> * </span>
	                                    </label>
	                                    <div class="col-md-4">
		                                    <input type="password" class="form-control" name="new_password" />
		                                </div>
		                            </div>
	                            	<div class="form-group">
	                                    <label class="control-label col-md-3"><?=_l('confirm_password')?>
	                                        <span class="required"> * </span>
	                                    </label>
	                                    <div class="col-md-4">
		                                    <input type="password" class="form-control" name="confirm_password" />
		                                </div>
		                            </div>
		                        </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green"><?=_l('save_btn')?></button>
                                            <button type="button" class="btn grey-salsa btn-outline"><?=_l('cancel_btn')?></button>
                                        </div>
                                    </div>
	                            </div>
                            </form>
                        </div>
                        <!-- END CHANGE PASSWORD TAB -->
                    </div>
                </div>
            </div>
        </div>
    </div>