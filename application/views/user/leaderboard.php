<?php include './application/views/inc/header.php'; ?>
        
<script src="<?php echo base_url(); ?>public/js/tablesorter.min.js" type="text/javascript">

</script>

    <h1 class="page-header">The Mighty Leader Board</h1>
    <table id="leaderboard" class="table zebra-striped">
        <thead>
        <th>
            username
        </th>
        <th>
            Levels Completed
        </th>
        </thead>
        <tbody>
            <?php
            foreach($leaderboard as $row)
            {
            ?>
            <tr>
                <td>
                        <?php echo $row->username; ?>
                </td>
                <td>
                        <?php echo $row->level; ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    
<script>
    $(function() {
        $("#leaderboard").tablesorter({ sortList: [[1,1]] });
    });
</script>

<?php include './application/views/inc/footer.php'; ?>