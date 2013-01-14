<?php
    require_once('links.php');   
    $currentpage = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"];
?>
    <ul class="nav navbar-static-top">
    <a class="brand" href="<?= site_url() ?>">eDorado '13</a>
<?php
    for ($i =0; $i < count($links); $i++)
    {
        $page = $links[$i];
        if (site_url().$page == $currentpage)
            echo '<li class="active"><a href="'.site_url().$links[$i].'">'.$links_text[$i].'</a><li>';
        else
            echo '<li><a href="'.site_url().$links[$i].'">'.$links_text[$i].'</a><li>';
    }
?>