<?php
	require_once("bll/portfolioExpert.php");
	$db = new portfolioExpert();

	if(!empty($_POST))
		$db->editEntry($_POST);

	if(array_key_exists('id', $_GET))
		$entry = $db->getEntry($_GET['id']);

?><!DOCTYPE html>
<html>
	<head>
	    <title>Sean Feil Portfolio : EDIT</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	    <link href="resources/css/reset.css" rel="stylesheet">
	    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
	    <link href="resources/css/style.css" rel="stylesheet">
	    <link href="resources/css/select2.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body> 
		<div class="container">
			<h2>Edit Entry</h2>
			<form method="post" action="edit.php" enctype="multipart/form-data">

				<input type="hidden" name="id" value="<?=@$entry['id'] ?>">

				<div class="form-group">
					<label for="name">Entry Title</label>
					<input type="text" class="form-control" id="name" placeholder="Entry Title" name="name" value="<?=@$entry['name'] ?>">
				</div>


				<div class="form-group">
					<label for="shortname">Entry Short Name</label>
					<input type="text" class="form-control" id="shortname" placeholder="Short Name" name="shortname" value="<?=@$entry['shortname'] ?>">
				</div>

				<div class="form-group">
					<label for="siteurl">Live URL</label>
					<input type="text" class="form-control" id="url" placeholder="URL" name="siteurl" value="<?=@$entry['url'] ?>">
				</div>

				<div class="form-group">
					<label for="body">Entry Body</label>
					<textarea class="form-control" id="body" rows="15" name="body"><?=@$entry['body'] ?></textarea>
				</div>

				<div class="form-group">
					<label for="type">Entry Type</label>
					<select id="type" class="form-control" name="type">
						<option value="standard" id="standard" selected="selected">Standard</option>
						<option value="featured" id="featured">Featured</option>
					</select>
				</div>

				<div class="form-group">
					<label for="tags">Tags</label>
					<select multiple id="tags" class="form-control" style="height: 50px;" name="tags[]">
						<option value="ux" id="ux">UX Design</option>
						<option value="pm" id="pm">Project Management</option>
						<option value="web" id="web">Web Development</option>
					</select>
				</div>

				<div class="form-group">
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
					<label>Image: <input type="file" name="images[]" class="form-control"></label>
					<label>Thumb: <input type="file" name="thumbs[]" class="form-control"></label>
					<label>Comment: <input type="text" name="comments[]" class="form-control"></label>
					<br>
				</div>

				<input type="submit" class="btn btn-primary" value="Perform">

			</form>
		</div>

	<script type="text/javascript" src="resources/js/jquery.min.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="resources/js/select2.min.js"></script>

	<script>$(document).ready(function() { 
		$("#tags").select2(); 
		if("<?=@$entry['type'] ?>" != "")
			$("#type").val("<?=@$entry['type'] ?>");
		$("#tags").val("<?=@$entry['tags'] ?>");


	});</script>
	</body>
</html>