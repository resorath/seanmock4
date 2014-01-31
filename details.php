<?php
	require_once("bll/portfolioExpert.php");
	$db = new portfolioExpert();

	$entry = $db->getProject($_GET['project']);

  $imageurls = explode(",", $entry['imgurl']);
  $thumburls = explode(",", $entry['thumburl']);
  $comments = explode("%%", $entry['imagecomment']);

	if($entry == null)
		die("Oops! Didn't find that project. Sorry about that.");

	//print_r($entry);


?>        
        <div id="detailpane">
		      <div class="float-left"><img src="img/<?=$thumburls[0] ?>"></div>
          <div class="float-right">
            <button class="btn" id="morescreenshots">More Screenshots</button>
            <?php if(strlen($entry['siteurl']) > 0): ?>
            	<button class="btn" onclick="location.href='<?=$entry['siteurl'] ?>'">Live Site</button>
            <?php endif ?>
          </div>
          <h2><?=$entry['name'] ?></h2>
          <p><?=$entry['description'] ?></p>
        </div>

        <div class="additionalscreens" id="additionalscreens">
          <div class="backbutton"><button type="button" class="btn btn-block" id="backfromscreens">Back</div>
          <?php for($i = 0; $i < count($thumburls); $i++): ?>
            <a tabindex="1" title="<?=$comments[$i] ?>" class="fancybox" rel="group" href="img/<?=$imageurls[$i] ?>"><img src="img/<?=$thumburls[$i] ?>" alt="" class="moreimage" /></a>
          <?php endfor ?><!--
  	      <a tabindex="1" title="Sample Image 1" class="fancybox" rel="group" href="sample-images/image_1_big.jpg"><img src="sample-images/image_1.jpg" alt="" class="moreimage" /></a>
  	      <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
          <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" class="moreimage" /></a>
-->
        </div>
    