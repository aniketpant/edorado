<?php include './application/views/inc/header.php'; ?>

    <span class="details">
        Current Level: <strong>Level #<?php echo $level+1; ?></strong>
    </span>
    <br/><br/>
    <?php if($is_complete == 0) { ?>
    <div class="alert-message"><span class="label label-important">Important</span>&nbsp;Please update your profile <a href="<?php echo site_url(); ?>/home/profile">here</a>.</div>
    <?php } ?>
    <div class="alert-message info">All answers to be entered in lowercase, without spaces.<br/>The numbers need to be written as numerals and not in words.</div>
 <?php if($public_notices) { ?>
     <div class="alert-message block-message">
        <?php
            foreach($public_notices as $public_notice) {
                if ($public_notice->notice_type == 'new') {
                    $class = 'label-success';
                }
                else if ($public_notice->notice_type == 'warning') {
                    $class = 'label-warning';
                }
                else if ($public_notice->notice_type == 'important') {
                    $class = 'label-important';
                }
                else if ($public_notice->notice_type == 'info') {
                    $class = 'label-info';
                }
                else {
                    $class = '';
                }
        ?>
            <div>
                <span class="<?php echo $class; ?> label"><?php echo $public_notice->notice_type; ?></span>&nbsp;<?php echo $public_notice->notice_message; ?>
            </div>
        <?php
            }
        ?>
    </div>
    <?php } ?>
     <?php if($notices) { ?>
     <div class="alert alert-message">
        <?php
            foreach($notices as $notice) {
                if ($notice->notice_type == 'new') {
                    $class = 'success';
                }
                else if ($notice->notice_type == 'warning') {
                    $class = 'warning';
                }
                else if ($notice->notice_type == 'important') {
                    $class = 'important';
                }
                else if ($notice->notice_type == 'info') {
                    $class = 'notice';
                }
                else {
                    $class = '';
                }
        ?>
            <div>
                <span class="<?php echo $class; ?> label"><?php echo $notice->notice_type; ?></span>&nbsp;<?php echo $notice->notice_message; ?>
            </div>
        <?php
            }
        ?>
    </div>
    <?php } ?>
    <?php if ($level != 0) { ?>
    <div class="alert alert-warning">
        <span class="label label-info">Notice</span>
        <a rel="modal" href="#message" data-toggle="modal">Message from the admins!</a>
    </div>
    <div id="message" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Message from the admins</h3>
        </div>
        <div class="modal-body">
            <blockquote>
                <p>We are watching over you!</p>
                <p>Yes, we are. And your answers are quite <strong>funny</strong>.</p>
                <small>the creators</small>
            </blockquote>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
    <?php } ?>
    <a class="btn btn-primary large" href="<?php echo site_url(); ?>/home/question">Attempt Question #<?php echo $level+1; ?></a>

<?php include './application/views/inc/footer.php'; ?>