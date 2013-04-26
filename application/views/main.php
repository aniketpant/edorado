<?php include './application/views/inc/header.php'; ?>

<div class="hero-unit">
    <h1>Welcome to eDorado '13</h1>
    <p><?php echo anchor('/main/register', 'Registrations'); ?> are now open.</p>
</div>

<p class="lead" style="text-align: center">For all announcements, follow <a href="https://www.facebook.com/bitsedorado">E-Dorado on Facebook</a>.</p>

<div class="share fb">
<div class="fb-like" data-href="https://www.facebook.com/bitsedorado" data-send="true" data-width="450" data-show-faces="true"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=465363156848461";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</div>
<div class="share twitter">
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://edorado.bits-quark.org" data-text="Check out eDorado '13 - the online treasure hunt." data-via="aniket_pant" data-hashtags="quark2013">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
    <div class="analytics">
        <?php if ($total_participants >= 50): ?>
        <h2>Analytics</h2>
        <p>The total number of people playing E-Dorado is <strong><?= $total_participants ?></strong></p>
        <h3>Number of players vs Levels</h3>
        <figure style="width: 400px; height: 300px;" id="analysis"></figure>
        <script type="text/javascript">
            var data = {
              "xScale": "ordinal",
              "yScale": "linear",
              "main": [
                {
                  "data": [
                    <?php foreach ($level_based as $row) { ?>
                    {
                      "x": "<?= $row['level'] ?>",
                      "y": "<?= $row['number_of_participants'] ?>"
                    },
                    <?php } ?>
                  ]
                }
              ]
            };
            var myChart = new xChart('bar', data, '#analysis');
        </script>
        <?php endif; ?>
    </div>

<?php include './application/views/inc/footer.php'; ?>