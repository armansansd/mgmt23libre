
<?php 

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'pushpad' : pushpad($_POST['padname']);break;
    }
}
if(isset($_POST['submit'])){
	upload();
}

function pushpad($t){
	require('../../config.php');

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
            echo '<li class="folder"><a href="http://'.URL.'/data/'.$ff.'">'.$ff;
            //recursif
            // if(is_dir($dir.'/'.$ff)) lsfolder($dir.'/'.$ff);
            echo '</a></li>';
        }
    }
    echo '</ul>';
}

function upload(){
	if(isset($_POST["folder"])){

		$target_dir = LOCAL_PATH."/data";
		$dirname = $_POST["folder"];
		$path = $target_dir."/".$dirname;

		if (!file_exists($path)) {
    		mkdir($path, 0777, true);
    		//nb file 
    		$total = count($_FILES['file']['name']);
    		for($i=0; $i<$total; $i++) {
  				$tmpFilePath = $_FILES['file']['tmp_name'][$i];
			  	if ($tmpFilePath != ""){
    				$newFilePath = $path.'/'. $_FILES['file']['name'][$i];
    				move_uploaded_file($tmpFilePath, $newFilePath);
    			}else{
    				echo "<div class='info'>hmm c'est cassé</div>";
    			}
			}
		}else{
			$total = count($_FILES['file']['name']);
    		for($i=0; $i<$total; $i++) {
  				$tmpFilePath = $_FILES['file']['tmp_name'][$i];
			  	if ($tmpFilePath != ""){
    				$newFilePath = $path.'/'. $_FILES['file']['name'][$i];
    				move_uploaded_file($tmpFilePath, $newFilePath);
    			}else{
    				echo "<div class='info'>hmm c'est cassé</div>";
    			}
			}
		}
	}else{
		echo "<div class='info'>nom de dossier vide ou invalide</div>";
	}
}