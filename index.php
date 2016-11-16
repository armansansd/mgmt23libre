<!DOCTYPE html>
<html lang="en" class="">
<head>
	<meta charset="UTF-8">
	<title>entouteslettres</title>
	<link rel="stylesheet" href="assets/css/main.css">
	<script
			  src="http://code.jquery.com/jquery-2.2.4.min.js"
			  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			  crossorigin="anonymous">
	</script>
	<script src="assets/js/function.js"></script>
</head>
<body>
	<?php require('config.php'); ?>
	<?php require('assets/php/function.php'); ?>
	<div id="column">
		<h2>Fichiers Partagés</h2>
		<div class="lsdoc">
			<?php
				$dir = LOCAL_PATH."/data";
				lsfolder($dir) 
			?>
		</div>
		<form action="" class="addfiles">
			<label for="">folder</label>
			<br/>
			<input type="text" name="folder" id="">
			<br/>
			<label for="">files</label>
			<input type="file" name="files" id="">
		</form>
	</div>
	<div id="column">
		<h2>Framapad(s)</h2>
		<div class="padliste">
		</div>
		<label><input type="text" name="pad" id="pad" /> <b id="addPad">+</b></label>
		<br /><i>nb : les pads sont mensuels.</i>
	</div>
	<div id="column">
		<h2>
			Forum
			<img style="width:20px; height:auto;"src="assets/img/cat.png" alt="">
		</h2>
		<a href="https://framateam.org/bla23/channels/town-square">Framateam : 2/3 libre</a>
	</div>	
</body>
</html>
