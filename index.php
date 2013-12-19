<!DOCTYPE html>
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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div>
      <header>
        <h1>Welcome</h1>
        <p>Porfolio of Sean Feil. Application Developer for Web, User Experience Designer, Project Manager.</p>
      </header>

      <section id="calltoaction">
        <div class="container calltoaction">
          <button class="btn btn-primary btn-wide" type="button">Say Hello</button>
          <button class="btn btn-primary btn-wide" type="button">View Resume</button>
        </div>
      </section>

      <section id="portfolio">
        <div id="imagegrid">
            <div class="imagegridelement"><img src="sample-images/image_1_big.jpg" id="featured"></div>
            <div class="imagegridelement"><img src="sample-images/image_2.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_3.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_4.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_5.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_6.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_7.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_8_big.jpg" id="featured"></div>
            <div class="imagegridelement"><img src="sample-images/image_9.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_10.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_1.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_2.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_3.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_4.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_5.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_6.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_7.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_8.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_9.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_10.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_1.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_2.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_3.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_4.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_5.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_6.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_7.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_8.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_9.jpg" id="standard"></div>
            <div class="imagegridelement"><img src="sample-images/image_10.jpg" id="standard"></div>

        </div>
      </section>

      <footer>
        <p>Copyright &copy Sean Feil 2013. </p>

      </footer>
  </div>



  <script type="text/javascript" src="resources/js/jquery.min.js"></script>
  <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="resources/js/jquery.imagesloaded.js"></script>
  <script type="text/javascript" src="resources/js/jquery.isotope.min.js"></script>
  <script>
  // modified Isotope methods for gutters in masonry


  $('#imagegrid').isotope({
    itemSelector : '.imagegridelement',
    masonry : {
          columnWidth : 210
        },
  });
  </script>
  </body>
</html>
