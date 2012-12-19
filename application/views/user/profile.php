<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">Update your profile</h1>
    <?php
        echo form_open('home/profile');
        echo form_label('Contact', 'contact');
        $arr_contact = array(
            'name'  => 'contact',
            'id'    => 'contact',
            'value' => set_value('contact', $contact)
        );
    ?>
    <div class="input">
    <?php
        echo form_input($arr_contact);
    ?>
    <span class="help-inline">Your contact number here</span>
    </div>
    <br/>
    <?php 
        echo form_label('Email', 'email');
        $arr_email = array(
            'name'  => 'email',
            'id'    => 'email',
            'value' => set_value('email', $email)
        );
    ?>
    <div class="input">
    <?php
        echo form_input($arr_email);
    ?>
    <span class="help-inline">Your email here</span>
    </div>
    <br/>
    <?php 
        echo form_label('Organisation', 'organisation');
        $arr_org= array(
            'name'  => 'organisation',
            'id'    => 'organisation',
            'value' => set_value('organisation', $organisation)
        );
    ?>
    <div class="input">
    <?php
        echo form_input($arr_org);
    ?>
    <span class="help-inline">College/School/Company</span>
    </div>
    <br/>
    <?php
        $arr_button = array(
            'name'  => 'submit',
            'value' => 'Update Profile',
            'class' => 'btn btn-primary large'
        );
    ?>
    <div class="input">
    <?php
        echo form_submit($arr_button);
    ?>
    </div><br/>
    <?php
        echo form_close();
        
        if ($error!="")
            echo '<div class="alert-message error">'. $error.' </div>';
        echo validation_errors();
    ?>

<?php include './application/views/inc/footer.php'; ?>