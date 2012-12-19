<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">All Questions</h1>
    <div id="content">
        <ul class="levels">
            <li class="box"><a href="<?php echo site_url(); ?>/admin/add_question">+</a></li>
            <?php
                for ($i = 1; $i <= $num_questions; $i++)
                {
            ?>
            <li class="box level"><a id="<?php echo $i; ?>" href="<?php echo site_url(); ?>/admin/edit_question/<?php echo $i ?>"><?php echo $i; ?></a></li>
            <?php
                }
            ?>
        </ul>
    </div>
    <div id="question-data"></div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('li.level a').mouseenter(function() {
            var id = $(this).attr('id');
            var url = "<?php echo site_url(); ?>/admin/show_question/" + id;
            $("#question-data").load(url);
        });
    });
</script>

<?php include './application/views/inc/footer.php'; ?>