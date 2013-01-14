<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">Dashboard <small>Admins Only</small></h1>    

    <div class="alert alert-block <?php if ($this->session->userdata('status') == 'running') echo 'alert-success'; else echo 'alert-error'; ?>"><p>Hell yeah! It's <strong><?= $this->session->userdata('status') ?></strong></p></div>

<?php
  echo form_open('admin', '', array('class' => 'form form-horizontal'));
?>
<?php
  echo form_label('Status', 'status');
  $options = array(
    'running' => 'Running',
    'paused'  => 'Paused'
  );
?>
    <div class="input">
<?php
  echo form_dropdown('status', $options, $this->session->userdata('status'));
?>
    </div>
<?php
  $arr_button = array(
    'name'  => 'save',
    'value' => 'Save',
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

<?php include './application/views/inc/footer.php'; ?>