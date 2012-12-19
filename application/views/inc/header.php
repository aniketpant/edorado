<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <title><?php echo $page_title; ?> &mdash; eDorado</title>

        <!-- custom stylesheet -->
        <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css" />

        <!-- jquery -->
        <script src="<?php echo base_url(); ?>public/js/jquery.js" type="text/javascript"></script>
        
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/bootstrap.min.css" />        
        <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- d3.js -->        
        <script src="<?php echo base_url(); ?>public/js/d3.js" type="text/javascript"></script>

        <!-- xcharts -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/xcharts.min.css" />        
        <script src="<?php echo base_url(); ?>public/js/xcharts.min.js" type="text/javascript"></script>
        
</head>
<body>
    <div id="header">
        <nav class="navbar navbar-static-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                <?php include 'navigation.php'; ?>
                </div>
            </disv>
        </nav>
    </div>
    <div class="container-fluid">
        <?php
            $loggedin = $this->session->userdata('logged_in');
            $username = $this->session->userdata('username');
            if ($loggedin == TRUE) {
        ?>
        <p class="user pull-right">
            Welcome, <strong><?php echo $username; ?></strong>. (<a href="<?php echo site_url(); ?>/home/logout">Logout</a>)
        </p>
        <?php
            }
        ?>