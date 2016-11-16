<!DOCTYPE html>
<html lang="en" class="">
<head>
	<meta charset="UTF-8">
	<title>entouteslettres</title>
	<!-- faire un pad css -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="https://mensuel.framapad.org/p/platforme_css/export/txt">
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
		<form method="post" enctype="multipart/form-data" class="addfiles">
			<label for="">folder</label>
			<br/>
			<input type="text" id="folder" name="folder">
			<br/>
			<input type="file" name="file[]" id="file" multiple="multiple">
			<!-- <label for="">files</label>
			<br/> -->
			<input type="submit" value="yes!" name="submit">
			<br /><i>créer un dossier vide | créer un dossier et importer les fichiers | compléter un dossier en rentrant son nom dans le formulaire et upload des fichiers</i>
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
