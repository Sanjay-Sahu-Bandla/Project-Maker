<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<!-- JQuery -->
	<script src="Assets/plugins/jquery/jquery-3.5.0.min.js"></script>

	<!-- bootstrap -->
	<link href="Assets/plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="Assets/plugins/bootstrap-4.4.1/dist/js/bootstrap.min.js"></script>
	
	<!-- fontawesome -->
	<link href="Assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet">

	<!-- customizations -->
	<link rel="stylesheet" type="text/css" href="Assets/dist/style.css">

	<!-- <script type="text/javascript" src="Assets/dist/script.js"></script> -->

	<title>Project Controller - SSB</title>
</head>
<body class="container mt-3">

	<br>
	<div id="head" class="d-flex justify-content-between">
		<h2 class="">Project Manager </h2>
		<h2 id="create_new">
			<a href="create_project.php" class="text-primary"><i class="fas fa-folder-plus"></i></a>
		</h2>
	</div>
	<br>

	<?php

	$JSON_data = file_get_contents("JSON/projects.json");
	$array = json_decode($JSON_data,true);

	?>

	<ul class="list-group">
		<li class="list-group-item text-center active">
			<div><h6 class="pl-3 d-inline text-white">Existed Projects</h6>
			</div>
		</li>

		<?php
		for($i = 0; $i<count($array); $i++) {
			?>

			<li class="list-group-item list-group-item-action d-flex justify-content-between dark-secondary">

				<div>
					<?php echo $array[$i]['project_name']; ?>
				</div>

				<div class="icons">
					<a href="Projects/<?php echo $array[$i]['project_name']; ?>" target="_blank">
						<i class="fas fa-eye text-primary"></i>
					</a>
					<a href="delete_project.php?folder=<?php echo $array[$i]['project_name']; ?>&action=delete" id="delete_project">
						<i class="fas fa-trash text-danger ml-3"></i>
					</a>
				</div>

			</li>

			<?php

		}

		?>
		
	</ul>        

</body>
</html>