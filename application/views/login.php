<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">User Login</h1>
    <?php
        echo form_open('main/login');
        echo form_label('Username', 'username');
        $arr_username = array(
            'name' => 'username',
            'id' => 'username',
            'value' => set_value('username')
        );
    ?>
    <div class="input">
    <?php
        echo form_input($arr_username);
    ?>
    <span class="help-inline">Your username here</span>
    </div>
    <br/>
    <?php 
        echo form_label('Password', 'password');
        $arr_password = array(
            'name' => 'password',
            'id' => 'password',
            'value' => set_value('password')
        );
    ?>
    <div class="input">
    <?php
        echo form_password($arr_password);
    ?>
    <span class="help-inline">Your password here</span>
    </div>
    <br/>
    <?php
        $arr_button = array(
            'name'  => 'submit',
            'value' => 'Login',
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