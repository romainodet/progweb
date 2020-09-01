<!DOCTYPE html>
<html>
<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="static/css/materialize.min.css"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php require('header.php'); ?>
<main>
	<div class="row">
		<div class="col sm12 l8" id="main">
			<h1>Main</h1>
		</div>
		<div class="col sm12 l4" id="relative">
			<?php require('relative.php'); ?>
		</div>
	</div>

</main>
<?php require('footer.php'); ?>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="static/js/materialize.js"></script>
</body>
</html>