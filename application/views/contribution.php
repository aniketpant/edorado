<?php include './application/views/inc/header.php'; ?>

    <h1 class="page-header">Contribution</h1>

    <div class="media">
      <a class="pull-left" href="http://aniketpant.com">
        <img class="media-object img img-rounded" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( "me@aniketpant.com " ) ) ); ?>.jpg?s=200" />
      </a>
      <div class="media-body">
        <h4 class="media-heading">So, who wrote this code?</h4>
        <p>Just another guy called <a href="https://twitter.com/aniket_pant">Aniket</a>.</p>
        <h4>Looking for the code?</h4>
        <iframe src="http://ghbtns.com/github-btn.html?user=aniketpant&repo=edorado&type=fork&size=large"
  allowtransparency="true" frameborder="0" scrolling="0" width="170" height="30"></iframe>
        <h4>Follow him</h4>
        <a href="https://twitter.com/aniket_pant" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @aniket_pant</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
    </div>

    <h2>Note from the developer</h2>
    <div class="lead">
      <p>This project is in a perpetual development cycle. Since, the <em>future is uncertain</em>, the code will be rewritten soon.</p>
    </div>

<?php include './application/views/inc/footer.php'; ?>