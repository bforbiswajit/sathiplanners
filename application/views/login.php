<!DOCTYPE html>
<html>
    <head>
        <title>Sathi Planners Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Sathi Planners Login"/>
        <link href="<?php echo base_url('public/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/dist/css/AdminLTE.css'); ?>" rel="stylesheet" type="text/css" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <!--webfonts-->
            <link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700,400italic,500italic,600italic,700italic' rel='stylesheet' type='text/css'>
        <!--//webfonts-->
        <link href="<?php echo base_url('public/dist/css/skins/skin-green.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/dist/css/custom_style.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/dist/css/form_style.css'); ?>" rel='stylesheet' type='text/css' />
    </head>
    <body>
        <div class="modal" id="forgot_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="border:none">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="margin-top:0px;padding-top:0px">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                    <div class="box-body">
                                        <form id="forgot_form" action="index.php/login/forget" style="padding:0px">
                                            <div style="padding:20px;font-size:1em;text-align:center;width:100%"><p>Enter Your Email Address</p></div>
                                            <li>
                                                <input type="text" class="text" style="width:100%" name="email" placeholder="example@example.com">
                                            </li>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <div class="submit" style="padding:0px;">
                                                            <input type="submit" value="SUBMIT" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div><!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--/start-login-one-->
        <div class="login-01">
            <div class="one-login  hvr-float-shadow">
                <?php
                    if($this->session->userdata('err_msg')){
                ?>
                    <div id="login_err_msg" class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->userdata('err_msg');?>
                    </div>
                <?php
                    }
                ?>
                <div class="one-login-head">
                    <img src="<?php echo base_url('public/dist/img/SP_Logo.png'); ?>" width="150px" height="150px" alt="Sathi Planners"/>
                    <h1></h1>
                    <span></span>
                </div>
                <form id="login_form" method="post" action="index.php/login/dologin">
                    <ul>
                        <li>
                            <!--input type="text" class="text" id="username" style="width:90%" placeholder="example@example.com">
                            <i class=" icon user"></i-->
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-user" style="background-color: initial;"></span>    
                                <input type="text" class="text" id="username" name="email" style="width:90%" placeholder="example@example.com" required>
                            </div>
                        </li>
                        <li>
                            <div class="input-group">
                                <span class="input-group-addon glyphicon glyphicon-lock" style="background-color: initial;"></span>    
                                <input type="password" id="password" name="password" style="width:90%" value="" placeholder="Password" required>
                            </div>
                        </li>
                    </ul>
                    <div class="p-container">
                        <b id="error" style="color:red"></b>
                        <div class="clear"> </div>
                    </div>
                    <div class="submit">
                        <input type="submit" value="SIGN IN" >
                    </div>
                    <div class="p-container">
                        <h6><a data-toggle="modal" data-target="#forgot_modal" href="">Forgot Password ?</a> </h6>
                        <div class="clear"> </div>
                    </div>
                    <div class="social-icons">
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
             <!-- REQUIRED JS SCRIPTS -->
        <!-- jQuery 2.1.4 -->
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('public/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
            <!-- <script src="assets/plugins/scrollbar/jquery.mCustomScrollbar.js"></script> -->
        <!-- AdminLTE App -->
    </body>
</html>