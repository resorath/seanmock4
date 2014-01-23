<?php
	require_once("bll/portfolioExpert.php");
	$db = new portfolioExpert();

	$entry = $db->getProject($_GET['project']);

	if($entry == null)
		die("Oops! Didn't find that project. Sorry about that.");

	print_r($entry);


?>        

		<div class="float-left"><img src="img/<?=$entry['thumburl'] ?>"></div>
          <div class="float-right">
            <button class="btn">More Screenshots</button>
            <?php if(strlen($entry['siteurl']) > 0): ?>
            	<button class="btn" onclick="location.href='<?=$entry['siteurl'] ?>'">Live Site</button>
            <?php endif ?>
          </div>
          <h2><?=$entry['name'] ?></h2>
          <p><?=$entry['description'] ?></p>

          <div class="additionalscreens" id="additionalscreens">
		      <a tabindex="1" title="Sample Image 1" class="fancybox" rel="group" href="sample-images/image_1_big.jpg"><img src="sample-images/image_1.jpg" alt="" /></a>
		      <a tabindex="1" title="Sample Image 2" class="fancybox" rel="group" href="sample-images/image_2_big.jpg"><img src="sample-images/image_2.jpg" alt="" /></a>
          </div>
    