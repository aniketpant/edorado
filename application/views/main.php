<?php include './application/views/inc/header.php'; ?>

<div class="share fb">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=260345107343206";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="https://www.facebook.com/pages/E-Dorado/147373291982761" data-send="false" data-width="450" data-show-faces="true"></div>
</div>
<div class="share twitter">
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://edorado.bits-quark.org" data-text="Check out E-Dorado - the online treasure hunt." data-via="aniket_pant" data-hashtags="quark2012">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
    <div class="analytics">
        <div class="block">
            <h2>Analytics</h2>
            <p>
                The total number of people playing E-Dorado is <strong><?= $total_participants ?></strong>
            </p>
        </div>
        <div class="block">
            <h2>Analysis of top 10 levels</h2>
            <table class="zebra-striped">
                <th>
                    Level
                </th>
                <th>
                    Number of players
                </th>
                <?php
                    foreach ($level_based as $row) {
                ?>
                <tr>
                    <td>
                    <?php echo $row->level; ?>
                    </td>
                    <td>
                    <?php echo $row->number_of_participants; ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>

<?php include './application/views/inc/footer.php'; ?>