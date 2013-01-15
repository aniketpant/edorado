<?php include './application/views/inc/header.php'; ?>

	<div class="hero-unit">
	    <h1 class="page-header">Hang on mate!</h1>
	    <p>Hold your horses for <strong><?= $start ?></strong>.</p>
      <p>Go get your friends till then. Won't it be great to have more people.</p>
	</div>

  <h2>We're nearly set.</h2>

  <div class="progress progress-striped active progress-success">
    <div class="bar" style="width: <?= $bar ?>%;"></div>
  </div>

  <?php if(!$is_complete) { ?>
  <div class="alert alert-block alert-info"><?php echo anchor('/home/profile"', 'Please update your profile in the meantime.'); ?></div>
  <?php } ?>

<?php include './application/views/inc/footer.php'; ?>