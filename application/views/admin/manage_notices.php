<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">Manage Notices</h1>
    <div id="notices"></div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var get_notices_url = "<?php echo site_url(); ?>/admin/get_notices";
        $("#notices").load(get_notices_url);
    });
</script>

<?php include './application/views/inc/footer.php'; ?>