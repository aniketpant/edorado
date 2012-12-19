<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">All Users</h1>
    <ul class="inline">
        <?php foreach ($user_data as $user) { ?>
        <li><a class="btn btn-small" id="<?php echo $user->idlogin_master; ?>" href="<?php echo site_url(); ?>/admin/user_answers/<?php echo $user->idlogin_master; ?>"><?php echo $user->username; ?></a></li>
        <?php } ?>
    </ul>

<?php include './application/views/inc/footer.php'; ?>