<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'/Assets/home/plugins/images/favicon.png'; ?>">
    <title>NetshGuard Central</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'/Assets/home/bootstrap/dist/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url().'/Assets/home/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css'; ?>" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url().'/Assets/home/plugins/bower_components/toast-master/css/jquery.toast.css'; ?>" rel="stylesheet">

    <!-- morris CSS -->
    <link href="<?php echo base_url().'/Assets/home/plugins/bower_components/morrisjs/morris.css'; ?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url().'/Assets/home/plugins/bower_components/chartist-js/dist/chartist.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/Assets/home/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css'; ?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url().'/Assets/home/css/animate.css'; ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'/Assets/home/css/style.css'; ?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url().'/Assets/home/css/colors/default.css'; ?>" id="theme" rel="stylesheet">
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?php echo base_url('home/dashboard'); ?>">
                        <!-- Logo icon image, you can use font-icon also --><b>
                            <!--This is light logo icon--><img src="<?php echo base_url().'/Assets/home/plugins/images/nglogin.png'; ?>" alt="home"
                                class="light-logo" width="219" />
                        </b>
                        <!-- Logo text image you can use text also --> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg"
                            href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"><b class="hidden-xs">Hello, Admin</b></a>
                    </li>
                    <li>
                        <a href="logout" class="waves-effect"><i class="fa fa-sign-out fa-fw"
                                aria-hidden="true"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                            class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    
                    <li style="padding: 70px 0 0;">
                        <a href="<?php echo base_url('home/dashboard'); ?>" class="waves-effect"><i class="fa fa-home fa-fw"
                                aria-hidden="true"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('home/protection'); ?>" class="waves-effect"><i class="fa fa-gear fa-fw"
                                aria-hidden="true"></i> Protection Settings</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('home/blacklist'); ?>" class="waves-effect"><i class="fa fa-ban fa-fw"
                                aria-hidden="true"></i> Blacklist</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('home/logs'); ?>" class="waves-effect"><i class="fa fa-pencil-square fa-fw"
                                aria-hidden="true"></i> Attack Logs</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('home/chatbot'); ?>" class="waves-effect"><i class="fa fa-bell fa-fw"
                                aria-hidden="true"></i> Chatbot Notification</a>
                    </li>
                </ul>
            </div>
        </div>
        <?= $this->renderSection('content'); ?>
        <footer class="footer text-center"> 2021 &copy; Ample Admin Edited by NetshGuard Team. </footer>
</div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url().'/Assets/home/plugins/bower_components/jquery/dist/jquery.min.js'; ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'/Assets/home/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url().'/Assets/home/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js'; ?>"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url().'/Assets/home/js/jquery.slimscroll.js'; ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url().'/Assets/home/js/waves.js'; ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url().'/Assets/home/js/custom.min.js'; ?>"></script>
    <script src="<?php echo base_url().'/Assets/home/plugins/bower_components/toast-master/js/jquery.toast.js'; ?>"></script>

        <script src="<?php echo base_url().'/Assets/home/plugins/bower_components/waypoints/lib/jquery.waypoints.js'; ?>"></script>
        <script src="<?php echo base_url().'/Assets/home/plugins/bower_components/counterup/jquery.counterup.min.js'; ?>"></script>
        <!-- chartist chart -->
        <script src="<?php echo base_url().'/Assets/home/plugins/bower_components/chartist-js/dist/chartist.min.js'; ?>"></script>
        <script src="<?php echo base_url().'/Assets/home/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js'; ?>"></script>
        <!-- Sparkline chart JavaScript -->
        <script src="<?php echo base_url().'/Assets/home/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js'; ?>"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url().'/Assets/home/js/custom.min.js'; ?>"></script>
        <script src="<?php echo base_url().'/Assets/home/js/dashboard1.js'; ?>"></script>
</body>

</html>