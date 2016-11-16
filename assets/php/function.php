<?php require('../../config.php'); ?>
<?php 
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'pushpad' : pushpad($_POST['padname']);break;
    }
}

function pushpad($t){
	$file = LOCAL_PATH."/links/pads.json";
	$json = json_decode(file_get_contents($file),TRUE);
	array_push($json, $t);
	file_put_contents($file, json_encode($json,TRUE));
}

function ()