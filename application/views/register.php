<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">Register Here</h1>
    <?php    
        echo form_open('main/register');        
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
    <span class="help-block">Your username here</span>
    </div>
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
    <span class="help-block">Enter your desired password here.</span>
    </div>
    <?php
        echo form_label('Confirm Password', 'passconf');
        $arr_passconf = array(
            'name' => 'passconf',
            'id' => 'passconf',
            'value' => set_value('passconf')
        );
    ?>
    <div class="input">
    <?php        
        echo form_password($arr_passconf);
    ?>
    <span class="help-block">Enter your password again to confirm.</span>
    </div>
    <?php
        $arr_button = array(
            'name'  => 'submit',
            'value' => 'Register Me!',
            'class' => 'btn btn-primary large'
        );
    ?>
    <div class="input">
    <?php
        echo form_submit($arr_button);
    ?>
    </div>
    <br/>
    <?php
        echo form_close();
        if ($error!="")
            echo '<div class="alert alert-block alert-error">'. $error.' </div>';
        echo validation_errors();
    ?>

<?php include './application/views/inc/footer.php'; ?>