<table class="table">
    <thead>
        <th>Level</th>
        <th>Notice Type</th>
        <th>Message</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach($notice_data as $notice) { ?>
        <tr>
            <td><?php echo $notice->level; ?></td>
            <td><?php echo $notice->notice_type ?></td>
            <td><?php echo $notice->notice_message ?></td>
            <td>
                <?php
                    echo form_open('', array( 'rel' => 'deleteNotice', 'id' => $notice->idnotice ));
                    echo form_hidden('idnotice', $notice->idnotice);
                    echo form_submit(
                            array(
                                'name'  => 'submit',
                                'value' => 'Delete',
                                'class' => 'btn'
                            ));
                    echo form_close();
                ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<h4>Add New Notice</h4>
<?php echo form_open('', array( 'rel' => 'addNotice', 'id' => "add-notice") ); ?>
<table class="table">
    <tbody>
        <tr>
            <td>
            <?php
                $data_level = array(
                    'name'          => 'level',
                    'id'            => 'level',
                    'placeholder'   => 'Level',
                    'value'         => ''
                );
                echo form_input($data_level);
            ?>
            </td>
            <td>
            <?php
                $data_type_options = array(
                    'default' => 'Default',
                    'important' => 'Important',
                    'new'       => 'New',
                    'warning'   => 'Warning',
                    'info'      => 'Info',
                );
                echo form_dropdown('notice-type', $data_type_options);
            ?>
            </td>
            <td>
            <?php
                $data_message = array(
                    'name'          => 'notice-message',
                    'id'            => 'notice-message',
                    'placeholder'   => 'Message',
                    'value'         => ''
                );
                echo form_input($data_message);
            ?>
            </td>
            <td>
             <?php
                $arr_button = array(
                    'name'  => 'submit',
                    'value' => 'Add',
                    'class' => 'btn btn-primary'
                );
                echo form_submit($arr_button);
            ?>   
            </td>
        </tr>
    </tbody>
</table>
<?php echo form_close(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        var get_notices_url = "<?php echo site_url(); ?>/admin/get_notices";
        $("form[rel*=addNotice]").submit(function(event) {
            event.preventDefault();
            var add_notice_url = "<?php echo site_url(); ?>/admin/add_notice";
            $.post(add_notice_url, $("form[rel*=addNotice]").serialize());
            $("#notices").load(get_notices_url);
        });
        $("form[rel*=deleteNotice]").submit(function(event) {
            event.preventDefault();
            var delete_notice_url = "<?php echo site_url(); ?>/admin/delete_notice";
            var id = $(this).attr("id");
            $.post(delete_notice_url, $("form[rel*=deleteNotice]#" + id).serialize());
            $("#notices").load(get_notices_url);
        });
    });
</script>