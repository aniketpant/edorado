<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <title><?php echo $page_title; ?> &mdash; Edorado</title>
        <style>
            body { margin: 0 auto }
            #main {
                margin: 15% auto;
                width: 960px;
                text-align: center;
            }
            #main h1:before {
                content: "他妈的 ";
            }
            #main h1:after {
                content: " 关闭";
            }
        </style>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/bootstrap.min.css" />
        
    </head>
    <body>
        <div id="main">
            <h1 class="page-header">, Larger is not always better</h1>
            <a class="btn large primary secret" href="<?php echo site_url(); ?>/main/main_page">अब लाइट ले</a>
            <!-- I prefer smaller here -->
        </div>
    </body>
</html>