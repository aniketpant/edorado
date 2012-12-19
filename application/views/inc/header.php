<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <title><?php echo $page_title; ?> &mdash; eDorado</title>
        
        <!-- TWITTER BOOTSTRAP -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/bootstrap.min.css" />        
        <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>public/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js" type="text/javascript"></script>
        
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