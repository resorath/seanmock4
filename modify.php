<?php
	require_once("bll/portfolioExpert.php");
	$db = new portfolioExpert();


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
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<div class="container">
			<h2>Select Entry</h2>
			<p><a href="edit.php">New</a></p>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Item</td><td>Tagged</td><td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<?php
					$rows = $db->getAllEntries();

					while($row = $rows->fetch_assoc()):
					?>
					<tr>
						<td><?=$row['name'] ?></td>
						<td></td>
						<td>
							<a href="edit.php?id=<?=$row['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
							<span class="glyphicon glyphicon-trash"></span>
						</td>

					</tr>
					<?php endwhile ?>
				</tbody>
			</table>
		</div>


	</body>
</html>