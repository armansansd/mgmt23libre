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

function lsfolder($dir){   
    $ffs = scandir($dir);
    //print_r($ffs);
    echo '<ul class="lsfolder">';
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
            echo '<li class="folder"><a href="'.URL.'\/data/'.$ff.'">'.$ff;
            //recursif
            // if(is_dir($dir.'/'.$ff)) lsfolder($dir.'/'.$ff);
            echo '</a></li>';
        }
    }
    echo '</ul>';
}