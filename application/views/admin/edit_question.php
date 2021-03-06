<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">Edit Question <?php echo $question->level; ?></h1>
    <p>
        <?php echo anchor('/admin/questions', '← Back') ?>
    </p>
    <div id="content">
        <?php
            echo form_open_multipart('admin/update_question');
        ?>
        <?php
            echo form_hidden('questionid', $question->level);
        ?>
        <?php
            echo form_label('Comment', 'comment');
        ?>
        <div class="input">
        <?php
            $arr_comment = array(
                'name'  => 'comment',
                'id'    => 'comment',
                'value' => $question->comment
            );
            echo form_textarea($arr_comment);
        ?>
        </div>
        <br/>
        <?php
            echo form_label('Answer', 'answer');
        ?>
        <div class="input">
        <?php
            $arr_answer = array(
                'name'  => 'answer',
                'id'    => 'answer',
                'value' => $question->answer
            );
            echo form_input($arr_answer);
        ?>
        </div>
        <br/>
        <?php
            echo form_label('Image', 'userfile');
        ?>
        <div class="input">
        <?php
            $arr_image = array(
                'name'  => 'userfile',
                'id'  => 'userfile',
                'size'  => '20'
            );
            echo form_upload($arr_image);
        ?>
        </div>
        <br/>
        <?php
            $arr_button = array(
                'name'  => 'submit',
                'value' => 'Update Question',
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
            if ($error != '')
                echo '<div class="alert-message error">'. $error.' </div>';
            echo validation_errors();
        ?>
    </div>

<?php include './application/views/inc/footer.php'; ?>