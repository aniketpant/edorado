<?php
    $logged_in = $this->session->userdata('logged_in');
    $is_admin = $this->session->userdata('is_admin');
    if ($logged_in == TRUE) {
        if ($is_admin) {
            $links = array(
                0 => "/admin",
                1 => "/admin/questions",
                2 => "/admin/users",
                3 => "/admin/notices",
                4 => "/main/logout" );

            $links_text = array(
                0 => "Home",
                1 => "Questions",
                2 => "Users",
                3 => "Notices",
                4 => "Logout" );
        }
        else {
            $links = array(
                0 => "/home",
                1 => "/home/question",
                2 => "/home/profile",
                3 => "/main/leaderboard",
                4 => "/main/solving",
                5 => "/main/logout" );

            $links_text = array(
                0 => "Current",
                1 => "Question",
                2 => "Profile",
                3 => "Leader Board",
                4 => "Solving",
                5 => "Logout" );
        }
    }
    else {
        $links = array(
            0 => "/main",
            1 => "/main/login",
            2 => "/main/register",
            3 => "/main/leaderboard",
            4 => "/main/contacts",
            5 => "/main/solving",
            6 => "/main/rules" );

        $links_text = array(        
            0 => "Home",
            1 => "Login",
            2 => "Register",
            3 => "Leader Board",
            4 => "Contacts",
            5 => "Solving",
            6 => "Rules" );
    }
?>