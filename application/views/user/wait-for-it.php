<?php include './application/views/inc/header.php'; ?>

	<div class="hero-unit">
	    <h1 class="page-header">Hang on mate!</h1>
	    <p>Hold your horses till <strong>21st Jan, 00:00 Hrs</strong>.</p>
      <p>Time to go <?= $remaining ?></p>
	</div>

  <h2>We're nearly set.</h2>

  <div class="progress progress-striped active">
    <div class="bar" style="width: 85%;"></div>
  </div>

  <?php if(!$is_complete) { ?>
  <div class="alert alert-block alert-info"><?php echo anchor('/home/profile"', 'Please update your profile in the meantime.'); ?></div>
  <?php } ?>

<?php include './application/views/inc/footer.php'; ?>