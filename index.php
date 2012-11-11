<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/oembed.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript" src="/jwplayer/jwplayer.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
        <?php include_once('simple_video_oembed.php'); ?>
        <h1><?php echo $provider ?></h1>

        <?php
          if (array_key_exists("video", $_GET)) {
            $video_id = $_GET["video"];
            $video = find_video_by_id($video_id);
            $this_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $encoded_url = urlencode($this_url);
            $oembed_url = "/oembed?url=$encoded_url";
        ?>
            <h2>oEmbed Provider</h2>
            <p>
              <a href="<?php echo $oembed_url ?>">oEmbed</a>
            </p>
            
            <table>
              <?php
                $odd = false;
                foreach ($video as $key=>$val) {
                  echo "<tr" . (($odd=!$odd)?' class="odd"':'') . ">";
                  echo "<td class='property'>$key:</td><td>$val</td>";
                  echo "</tr>";
                }
              ?>
            </table>
        <?php
          } else {
        ?>
          <h2>File List</h2>
          <ul>
          <?php
            $files = glob($site_path."/".$files_path."*.mp4");
            foreach ($files as $file) {
              $info = pathinfo($file);
              echo "<li><a href='/videos/" . $info["filename"] ."'> " . $info["basename"] . "</a></li>";
            }
          ?>
          <ul>
        <?php
          }
        ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
