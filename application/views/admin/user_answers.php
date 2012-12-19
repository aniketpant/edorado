<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">User: <strong><?php echo $user_details->username; ?></strong></h1>
    <p>
        <?php echo anchor('/admin/users', '← Back', array('class' => 'btn')) ?>&emsp;<?php echo anchor(current_url(), 'Refresh', array('class' => 'btn')); ?>
    </p>
    <div id="content">
        <table class="table">
            <thead>
                <tr><th>Level</th><th>Answer Submitted</th><th>Submitted</th></tr>
            </thead>
            <tbody>
                <?php foreach($user_data as $row) { ?>
                <tr>
                    <td><?php echo $row->level; ?></td>
                    <td><?php echo $row->answer_submitted; ?></td>
                    <?php
                        $now = date('Y-m-d H:m:s');
                        $ans_time = $row->answer_time;
                        $time = strtotime($now) - strtotime($ans_time) + 1200;
                        if ($time < 60) {
                            $time = round($time);
                            $final_time = $time.' seconds ago';
                        }
                        else if ($time < 3600) {
                            $time = $time/60;
                            $time = round($time);
                            $final_time = $time.' minutes ago';
                        }
                        else if ($time < 86400) {
                            $time = $time/3600;
                            $time = round($time);
                            $final_time = $time.' hours ago';
                        }
                        else {
                            $time = $time/86400;
                            $time = round($time);
                            $final_time = $time.' days ago';
                        }
                    ?>
                    <td><?php echo $final_time; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php include './application/views/inc/footer.php'; ?>