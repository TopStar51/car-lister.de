<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
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
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets')?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets')?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets')?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets')?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?=base_url('assets')?>/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('assets')?>/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?=base_url('assets')?>/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?=base_url('assets')?>/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?=base_url('assets')?>/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url('assets'); ?>/favicon.ico" /> 
    </head>
    <!-- END HEAD -->

    <body class="login" style="position: relative; top: 50vh; margin-top: -254px !important;">
        <!-- BEGIN LOGO -->
		<!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="javascript:;" method="post">
                <h3 class="form-title"><strong>Car-lister.de Login</strong></h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any email and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                </div>
                <div class="form-actions">
                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" /> Remember me
                        <span></span>
                    </label>
                    <button type="submit" class="btn-login btn green pull-right"> Login </button>
                </div>
<!--                <div class="login-options">-->
<!--                    <h4>Or login with</h4>-->
<!--                    <ul class="social-icons">-->
<!--                        <li>-->
<!--                            <a class="facebook" data-original-title="facebook" href="javascript:;"> </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a class="twitter" data-original-title="Twitter" href="javascript:;"> </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a class="googleplus" data-original-title="Goole Plus" href="javascript:;"> </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a class="linkedin" data-original-title="Linkedin" href="javascript:;"> </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--                <div class="forget-password">-->
<!--                    <h4>Forgot your password ?</h4>-->
<!--                    <p> no worries, click-->
<!--                        <a href="javascript:;" id="forget-password"> here </a> to reset your password. </p>-->
<!--                </div>-->
<!--                <div class="create-account" hidden>-->
<!--                    <p> Don't have an account yet ?&nbsp;-->
<!--                        <a href="javascript:;" id="register-btn"> Create an account </a>-->
<!--                    </p>-->
<!--                </div>-->
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="javascript:;" method="post">
                <h3>Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn red btn-outline">Back </button>
                    <button type="submit" class="btn green pull-right"> Submit </button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->
            <!-- END REGISTRATION FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> 2018 &copy; CAR-LISTER.DE </div>
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
        <script src="<?=base_url('assets')?>/global/plugins/respond.min.js"></script>
        <script src="<?=base_url('assets')?>/global/plugins/excanvas.min.js"></script> 
        <script src="<?=base_url('assets')?>/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?=base_url('assets')?>/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets')?>/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets')?>/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets')?>/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets')?>/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets')?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?=base_url('assets')?>/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets')?>/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets')?>/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets')?>/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?=base_url('assets')?>/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>