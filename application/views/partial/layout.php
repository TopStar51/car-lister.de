<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Car-lister.de</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #5 for statistics, charts, recent events and reports" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN LAYOUT FIRST STYLES -->
    <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
    <!-- END LAYOUT FIRST STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url('assets'); ?>/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/global/plugins/bootstrap-sweetalert/sweetalert.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/select2/css/select2.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/global/plugins/select2/css/select2-bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url('assets'); ?>/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url('assets'); ?>/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets'); ?>/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo base_url('assets'); ?>/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />

    <!-- custom styles -->
    <link href="<?=base_url('assets/custom/my.css')?>" rel="stylesheet" type="text/css" />

    <?php

    foreach ($this->custom_css_list as $css) {
        gf_html_load_css($css);
    }
    ?>

    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url('') ?>";
    </script>

    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="<?php echo base_url('assets'); ?>/favicon.ico" /> 
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <!-- BEGIN CONTAINER -->
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php site_url('');?>">
                        <img src="<?php echo base_url('assets'); ?>/layouts/layout/img/logo-2.png" alt="logo" class="logo-default" style="margin-top: 12px"/> 
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-language">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-right: 30px">
                                <i class="icon-globe"></i>
                                <span class="language"><?=$language?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=site_url('language/switch_lang/EN')?>">
                                    English</a>
                                </li>
                                <li>
                                    <a href="<?=site_url('language/switch_lang/DE')?>">
                                    Deutsch</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username username-hide-on-mobile"><?=_l('hi')?>, <strong>Nick</strong></span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?=site_url('profile')?>">
                                        <i class="icon-user"></i><?=_l('my_profile')?></a>
                                </li>
                                <li>
                                    <a href="<?=site_url()?>/login/logout">
                                        <i class="icon-key"></i><?=_l('log_out')?></a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>
                        <!-- END SIDEBAR TOGGLER BUTTON -->
                        <li class="nav-item <?=$this->path[0] == 'cars' ? 'active open' : ''?>">
                            <a href="<?=site_url('cars')?>" class="nav-link nav-toggle">
                                <img src="<?=base_url()?>assets/custom/img/icon_car.png" alt="icon-car" class="icon-car" />
                                <span class="title bold"><?=_l('cars')?></span>
                                <?php if($this->path[0]=='cars') echo '<span class="selected"></span>'; ?>
                            </a>
                        </li>
                        <li class="nav-item <?=$this->path[0] == 'parking' ? 'active open' : ''?>">
                            <a href="<?=site_url('parking')?>" class="nav-link nav-toggle">
                                <img src="<?=base_url()?>assets/custom/img/icon_parking.png" alt="icon-parking" class="icon-parking" />
                                <span class="title bold"><?=_l('parking_place')?></span>
                                <?php if($this->path[0]=='parking') echo '<span class="selected"></span>'; ?>
                            </a>
                        </li>
                        <?php if($this->user_type == 'ADMIN') { ?>
                        <li class="nav-item  <?=$this->path[0] == 'user' ? 'active open' : ''?>">
                            <a href="<?=site_url('user/index')?>" class="nav-link nav-toggle">
                                <img src="<?=base_url()?>assets/custom/img/icon_user.png" alt="icon-user" class="icon-user" />
                                <span class="title bold"><?=_l('users')?></span>
                                <?php if($this->path[0]=='parking') echo '<span class="selected"></span>'; ?>
                                <span class="arrow <?=$this->path[0]=='user'? 'open' : '' ?>"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?=$this->path[0] == 'user' && $this->path[1] =='index' ? 'active open' : ''?>">
                                    <a href="<?=site_url('user/index')?>" class="nav-link ">
                                        <i class="icon-users"></i>
                                        <span class="title"><?=_l('user_management')?></span>
                                        <?php if($this->path[0]=='user' && $this->path[1]=='index') echo '<span class="selected"></span>'; ?>
                                    </a>
                                </li>
                                <li class="nav-item <?=$this->path[0] == 'user' && $this->path[1] =='add' ? 'active open' : ''?>">
                                    <a href="<?=site_url('user/add')?>" class="nav-link ">
                                        <i class="icon-user-follow"></i>
                                        <span class="title"><?=_l('add_user')?></span>
                                        <?php if($this->path[0]=='user' && $this->path[1]=='add') echo '<span class="selected"></span>'; ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php }?>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <?php
                    foreach ($this->view_list as $view) {
                        $view_page = $view[0];
                        $view_param = $view[1];
                        $this->load->view($view_page, $view_param);
                    }
                    ?>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2019 &copy; CAR-LISTER.DE
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN CORE PLUGINS -->
    <script src="<?php echo base_url('assets'); ?>/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url('assets'); ?>/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url('assets'); ?>/global/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo base_url('assets'); ?>/global/scripts/app.min.js" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="<?php echo base_url('assets'); ?>/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')?>" type="text/javascript"></script>

    <!-- END THEME LAYOUT SCRIPTS -->

    <script src="<?=base_url('assets/global/plugins/select2/js/select2.full.min.js')?>" type="text/javascript"></script>

    <?php

    foreach ($this->custom_js_list as $js) {
        gf_html_load_js($js);
    }

    ?>
</body>

</html>