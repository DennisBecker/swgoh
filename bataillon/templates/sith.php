<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BΛ - Bataillon Navigator</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="./css/main.css"/>
</head>
<body>
<div class="p-3">
	<h1>BΛ - Bataillon Navigator Heroic Sith Raid</h1>
	<h2>Last updated
		<time><?php echo date('Y-m-d'); ?></time>
	</h2>

	<?php echo $sithTeams; ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.5/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="./js/app.js"></script>

</body>
</html>
