<div class="data">
    <h2>Preview</h2>
    <dl>
        <dt>Level</dt>
        <dd><?php echo $question->level; ?></dd>
        <dt>Comment</dt>
        <dd>
        <?php if($question->comment) { echo $question->comment; }
        else { ?>
        No comment for this question.
        <?php } ?>
        </dd>
        <dt>Answer</dt>
        <dd><?php echo $question->answer; ?></dd>
        <dt>Image</dt>
        <dd>
        <?php if($question->image_name) { ?>
        <img src="<?php echo base_url().'uploads/'.$question->image_name.$question->image_ext; ?>" alt="Image" />
        <?php } else { ?>
        No image for this question.
        <?php } ?>
        </dd>
    </dl>
</div>