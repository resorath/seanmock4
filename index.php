<?php
  require_once("bll/portfolioExpert.php");
  $db = new portfolioExpert();

  $entries = $db->getAllEntries();

?><!DOCTYPE html>
<html>
  <head>
    <title>Sean Feil Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link href="resources/css/reset.css" rel="stylesheet">
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/isotope.css" rel="stylesheet">
    <link href="resources/css/style.css" rel="stylesheet">
    <link href="resources/css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <noscript>
    Sorry, this page uses JavaScript to make things pretty. Please enable it for this page, or <a href="contact">send me an e-mail</a> to express your opposition. 
    <meta HTTP-EQUIV="REFRESH" content="0; url=/noscript"> 
    </noscript>
  </head>
  <body class="no-touch">
    <div>
      <header>
        <h1>Welcome</h1>
        <p>Porfolio of Sean Feil. Application Developer for Web, User Experience Designer, Project Manager.</p>
      </header>

      <nav id="calltoaction">
        <div class="container calltoaction">
          <button class="btn btn-primary btn-wide" type="button">Say Hello</button>
          <button class="btn btn-primary btn-wide" type="button">View Resume</button>
          <button class="btn btn-primary btn-wide" type="button">Learn More About Sean</button>
        </div>
      </nav>

      <nav id="filter">
        <span class="glyphicon glyphicon-filter"></span>
        <div id="filters" class="btn-group  btn-group-xs">
          <button type="button" class="btn btn-default" data-filter="*">Show All Work</button>
          <button type="button" class="btn btn-default" data-filter=".ux">UX and Frontend Design</button>
          <button type="button" class="btn btn-default" data-filter=".web">Technical Web Applications</button>
          <button type="button" class="btn btn-default" data-filter=".pm">Projects I've Managed</button>
        </ul>
      </nav>

      <div id="imagegrid">

          <?php while($entry = $entries->fetch_assoc()): ?>
            <div class="imagegridelement <?=$entry['tags'] ?> <?=$entry['type'] ?>" id="<?=$entry['shortname'] ?>"><img src="img/<?php $e=explode(",", $entry['thumburl']); echo($e[0]); ?>" id="<?=$entry['type'] ?>">
            <span><h2><?=$entry['name'] ?></h2></span>
          </div>

        <?php endwhile ?><!--
          <div class="imagegridelement ux featured" id="project1"><img src="sample-images/image_1_big.jpg" id="featured">
            <span><h2>Text test</h2></span>
          </div>

          <div class="imagegridelement web standard" id="project2"><img src="sample-images/image_2.jpg" id="standard">
            <span><h2>Text test</h2></span>
          </div>
          <div class="imagegridelement pm standard" id="project2"><img src="sample-images/image_3.jpg" id="standard"></div>
          <div class="imagegridelement pm standard" id="project2"><img src="sample-images/image_4.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_5.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_6.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_7.jpg" id="standard"></div>
          <div class="imagegridelement featured" id="project2"><img src="sample-images/image_8_big.jpg" id="featured"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_9.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_10.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_1.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_2.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_3.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_4.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_5.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_6.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_7.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_8.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_9.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_10.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_1.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_2.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_3.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_4.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_5.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_6.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_7.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_8.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_9.jpg" id="standard"></div>
          <div class="imagegridelement standard" id="project2"><img src="sample-images/image_10.jpg" id="standard"></div>-->

      </div>

      <aside id="details">
        <div class="container detailview" id="detailview">
          <div class="holdon">
            <p>Hold on a sec...<p>
            <img src="img/ajax-loader.gif">
          </div>
        </div>
      </aside>

      <footer>
        <p>Copyright &copy Sean Feil 2014. </p>

      </footer>
  </div>



  <script type="text/javascript" src="resources/js/jquery.min.js"></script>
  <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="resources/js/jquery.imagesloaded.js"></script>
  <script type="text/javascript" src="resources/js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="resources/js/jquery.hashchanged.js"></script>
  <script type="text/javascript" src="resources/js/jquery.color.js"></script>
  <script type="text/javascript" src="resources/js/portfolio.js"></script>  
  <script type="text/javascript" src="resources/js/jquery.fancybox.js"></script>

  <script>
  $('footer').click(function(){ 
    $('#detailview').show(); 
    $.get('details.php?project=d', function(data){
      $('#detailview').html(data);
    }) 
  }) 
  </script>
  </body>
</html>

