<?php

if(!isset($_POST['id'])) {
	
	// default variables
	$project_id = $_GET['id'];
	$not_exists = true;
	$status = (object) ['JSON'=> false, 'folder'=>false, 'Additional'=>null];
	
	// delete project details from JSON/projects.json
	$projects = file_get_contents("JSON/projects.json");
	$arr = json_decode($projects, true);
	
	for ($i = 0; $i < count($arr); $i++) {
		
		if($arr[$i]['id'] == $project_id) {
			
			$project_name = $arr[$i]['project_name'];
			
			unset($arr[$i]);
			$arr = array_values($arr);
			
			$status->JSON = (file_put_contents("JSON/projects.json",json_encode($arr,JSON_PRETTY_PRINT))) ? true : false;
			$not_exists = false;
			
			break;
		}
	}

	// return if project does not exist
	if($not_exists) {
		
		$status->Additional = 'Project does not exist';
		
		header('Content-Type: application/json');
		echo json_encode($status);
		return;
	}
	
	// delete entire project folder
	function deleteDir($path) {
		
		return is_file($path) ?
		@unlink($path) :
		array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
	}
	
	$folder = "Projects/$project_name";
	
	if(file_exists($folder)) {
		
		deleteDir($folder);
		$status->folder = true;
	}
	
	header('Content-Type: application/json');
	echo json_encode($status);
}

?>