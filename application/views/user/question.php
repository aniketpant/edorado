<?php include './application/views/inc/header.php'; ?>

    <span class="details">
        <strong>Level #<?php echo $level+1; ?></strong>
    </span>
    <br/>
    <div class="question">
        <?php
            if ($question->image_name) {
        ?>
        <div class="image">
            <img src="<?php echo base_url().'uploads/'.$question->image_name.$question->image_ext; ?>" alt="Image" />
        </div>
        <?php
            }
        ?>
        <?php
            if ($question->comment) {
        ?>
        <!-- Hint:  <?php echo $question->comment; ?>  -->
        <?php
            }
        ?>
    </div>
    <?php
        echo form_open('home/submitanswer');
        echo form_label('Answer', 'answer');
        $arr_answer = array(
            'name' => 'answer',
            'id' => 'answer',
            'value' => set_value('answer')
        );
    ?>
    <div class="input">
    <?php
        echo form_input($arr_answer);
    ?>
        <span class="help-block">Enter your answer here (without spaces)</span>
    </div><br/>
    <?php
        $arr_button = array(
            'name'  => 'submit',
            'value' => 'Submit Answer',
            'class' => 'btn btn-primary large'
        );
    ?>
    <div class="input">
        <?php 
            echo form_submit($arr_button);
        ?>
    </div>
    <?php
        echo form_close();
    ?>
    <?php
    if ($last_answers != FALSE) {
    ?>
    <div class="last-answers">
        <h1 class="page-header">
            Your Last Tried Answers
        </h1>
        <ol>
        <?php
            foreach ($last_answers as $last_answer) {
        ?>
            <li>
                <?php
                    echo $last_answer->answer_submitted;
                ?>
            </li>
        <?php
            }
        ?>
        </ol>
    </div>
    <?php
    }
    ?>

<?php include './application/views/inc/footer.php'; ?>