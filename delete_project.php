<?php

// delete a project by getting the parameters

if(isset($_GET['folder'])&&isset($_GET['action'])) {

	$project_name = $_GET['folder'];
	
	// delete project details from JSON/projects.json

	$data = file_get_contents("JSON/projects.json");

	$arr = json_decode($data, true);
	for ($i = 0; $i < count($arr); $i++) {

		if($arr[$i]['project_name'] == $project_name) {

			unset($arr[$i]);

			$arr = array_values($arr);
		}
	}

	if(file_put_contents("JSON/projects.json",json_encode($arr,JSON_PRETTY_PRINT))) {

		echo "JSON_success";

		echo "<script>

		alert('JSON_success');
		window.location = 'index.php';

		</script>";
	}

	else {
		echo "JSON_fail";

		echo "<script>

		alert('JSON_fail');
		window.location = 'index.php';

		</script>";
	}

	// delete entire folder

	function deleteDir($path) {

		return is_file($path) ?
		@unlink($path) :
		array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);

		echo "Project_deleted";

		echo "<script>

		alert('Project_deleted');
		window.location = 'index.php';

		</script>";
	}

	if($_GET['action'] == 'delete') {

		$folder = 'Projects/'.$_GET['folder'];

		deleteDir($folder);
	}
}

?>