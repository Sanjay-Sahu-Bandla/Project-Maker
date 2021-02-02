<?php

if(!file_exists('Projects/'.$_POST['project_name']) && !empty($_POST['project_name'])) {
	
	$old_umask = umask(0);
	
	$project_name = $_POST['project_name'];
	mkdir('Projects/'.$project_name);
	mkdir('Projects/'.$project_name.'/Assets');
	mkdir('Projects/'.$project_name.'/Assets/dist');
	mkdir('Projects/'.$project_name.'/Assets/plugins');
	mkdir('Projects/'.$project_name.'/JSON');
	mkdir('Projects/'.$project_name.'/Images');
	mkdir('Projects/'.$project_name.'/Support_Pages');
	
	// recursive function to copy files and folders
	
	function recurse_copy($src,$dst) { 
		$dir = opendir($src); 
		@mkdir($dst); 
		while(false !== ( $file = readdir($dir)) ) { 
			if (( $file != '.' ) && ( $file != '..' )) { 
				if ( is_dir($src . '/' . $file) ) { 
					recurse_copy($src . '/' . $file,$dst . '/' . $file); 
				} 
				else { 
					copy($src . '/' . $file,$dst . '/' . $file); 
				} 
			} 
		}
		closedir($dir); 
	}
	
	// upload fav icon
	
	if(isset($_FILES["fav_icon"]["name"])) {
		
		$file_name = preg_replace('/\s/', '',basename($_FILES["fav_icon"]["name"]));
		
		if(move_uploaded_file($_FILES["fav_icon"]["tmp_name"], 'Projects/'.$project_name.'/Images/'.$file_name)) {
			// echo "Icon Uploaded,";
		}
		else {
			// echo "Icon did not Upload !,";
		}
	}
	
	// create bootstrap
	
	if(isset($_POST['bootstrap'])) {
		
		mkdir('Projects/'.$project_name.'/Assets/plugins/bootstrap-4.4.1');
		
		$src = 'Assets/plugins/bootstrap-4.4.1';
		$dst = 'Projects/'.$project_name.'/Assets/plugins/bootstrap-4.4.1';
		
		recurse_copy($src,$dst);
		
	}
	
	// create fontawesome
	
	if(isset($_POST['fontawesome'])) {
		
		mkdir('Projects/'.$project_name.'/Assets/plugins/fontawesome-free');
		
		$src = 'Assets/plugins/fontawesome-free';
		$dst = 'Projects/'.$project_name.'/Assets/plugins/fontawesome-free';
		
		recurse_copy($src,$dst);
		
	}
	
	// create jquery
	
	if(isset($_POST['jquery'])) {
		
		mkdir('Projects/'.$project_name.'/Assets/plugins/jquery');
		
		$src = 'Assets/plugins/jquery';
		$dst = 'Projects/'.$project_name.'/Assets/plugins/jquery';
		
		recurse_copy($src,$dst);
		
	}
	
	// create croppie
	
	if(isset($_POST['croppie'])) {
		
		mkdir('Projects/'.$project_name.'/Assets/plugins/croppie');
		
		$src = 'Assets/plugins/croppie';
		$dst = 'Projects/'.$project_name.'/Assets/plugins/croppie';
		
		recurse_copy($src,$dst);
		
	}
	
	// create croppie
	
	if(isset($_POST['sweetalert'])) {
		
		mkdir('Projects/'.$project_name.'/Assets/plugins/sweetalert-master');
		
		$src = 'Assets/plugins/sweetalert-master';
		$dst = 'Projects/'.$project_name.'/Assets/plugins/sweetalert-master';
		
		recurse_copy($src,$dst);
		
	}

	// generate files //
	
	if(isset($_POST['link_files'])) {
		
		$html_data = '<!DOCTYPE html>
		<html lang="en">
		<head>
		
		<meta charset="utf-8">
		
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<!-- Fav Icon -->
		<link rel="icon" type="image/png" href="Images/'.$file_name.'">
		<link rel="icon" type="image/png" sizes="192x192" href="Images/'.$file_name.'">
		<link rel="icon" type="image/png" sizes="32x32" href="Images/'.$file_name.'">
		<link rel="icon" type="image/png" sizes="96x96" href="Images/'.$file_name.'">
		<link rel="icon" type="image/png" sizes="16x16" href="Images/'.$file_name.'">
		
		<link rel = "apple-touch-icon" type = "image/png" href = "Images/'.$file_name.'"/>
		
		<!-- JQuery -->
		<script src="Assets/plugins/jquery/jquery.slim.min.js"></script>
		
		<!-- bootstrap -->
		<link href="Assets/plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="Assets/plugins/bootstrap-4.4.1/dist/js/bootstrap.min.js"></script>
		
		<!-- fontawesome -->
		<link href="Assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">
		
		<!-- customizations -->
		<link rel="stylesheet" type="text/css" href="Assets/dist/style.css">
		
		<script src="Assets/dist/script.js" type="text/javascript"></script>
		
		<title>'.$project_name.'</title>
		</head>
		<body>
		</body>
		</html>
		';
		
	}
	
	else {
		$html_data = '<!DOCTYPE html>
		<html lang="en">
		<head>
		
		<meta charset="utf-8">
		
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<!-- JQuery -->
		<script src=""></script>
		
		<!-- bootstrap -->
		<link href="" rel="stylesheet">
		<script src=""></script>
		
		<!-- fontawesome -->
		<link href="" rel="stylesheet">
		
		<!-- customizations -->
		<link rel="stylesheet" type="text/css" href="">
		
		<script src="" type="text/javascript"></script>
		
		<title>'.$project_name.'</title>
		</head>
		<body>
		</body>
		</html>
		';
	}
	
	
	if(isset($_POST['html_file'])) {
		
		if(isset($_POST['generate_structure'])) {
			
			file_put_contents('Projects/'.$project_name.'/index.html',$html_data);
		}
		
		else {
			
			file_put_contents('Projects/'.$project_name.'/index.html','');
		}
	}
	
	if(isset($_POST['php_file'])) {
		
		if(isset($_POST['generate_structure'])) {
			
			file_put_contents('Projects/'.$project_name.'/index.php',$html_data);
		}
		else {
			
			file_put_contents('Projects/'.$project_name.'/index.php','');
		}
	}
	
	if(isset($_POST['css_file'])) {
		
		file_put_contents('Projects/'.$project_name.'/Assets/dist/style.css','');
	}
	
	if(isset($_POST['scss_file'])) {
		
		file_put_contents('Projects/'.$project_name.'/Assets/dist/style.scss','');
	}
	
	if(isset($_POST['js_file'])) {
		
		file_put_contents('Projects/'.$project_name.'/Assets/dist/script.js','');
	}
	
	// add data to JSON/projects.json
	
	$JSON_data = file_get_contents("JSON/projects.json");
	$array = json_decode($JSON_data,true);
	
	date_default_timezone_set("Asia/Kolkata");
	
	$timestamp =  date('d-m-Y h:i:s');
	$id = time();
	
	$add_data = array(
		'project_name'=>$project_name,
		'timestamp'=>$timestamp,
		'id'=>$id
	);
	
	array_unshift($array, $add_data);
	
	if(file_put_contents("JSON/projects.json",json_encode($array,JSON_PRETTY_PRINT))) {
		
		echo "JSON_success,";
	}
	
	else {
		echo "JSON_fail,";
	}
	
	echo "Project_created";
	
}

else {
	
	echo "Project_exists";
}

?>