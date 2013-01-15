    <?php
    /*
    <blockquote class="pull-right">
      <p>We are also doing a brand new conference this year. <a href="http://markmyword.in"><strong>Mark My Word</strong></a>.</p>
      <p>So, if you're coming for <a href="http://bits-quark.org">Quark 2013</a>, then <a href="http://event.ayojak.com/event/mark-my-word">register for it</a>.</p>
      <small>Admins</small>
    </blockquote>
    */
    ?>
    </div>
    <div id="footer" class="container-fluid">
        <div class="row-fluid">
            <p class="muted pull-right">Read about the <?php echo anchor('main/contribution', 'contributions'); ?></p>
        </div>
    </div>
    <?php include 'analytics.php'; ?>
    <script type="text/javascript">
    WebFontConfig = {
      google: { families: [ 'Lato:300,400,400italic:latin' ] }
    };
    (function() {
      var wf = document.createElement('script');
      wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })(); </script>
  </body>
</html>