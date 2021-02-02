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

    <script type="text/javascript" src="Assets/dist/script.js"></script>

    <title>Project Controller - SSB</title>
</head>

<body class="container mt-3">

    <br>
    <div id="head" class="d-flex justify-content-between">
        <h2 class="">Project Manager </h2>
        <h2 id="create_new">
            <a href="#" class="text-primary" data-toggle="modal" data-target="#exampleModal"><i
                    class="fas fa-folder-plus"></i></a>
        </h2>
    </div>
    <br>

    <ul class="list-group">
        <li class="list-group-item text-center active">
            <div>
                <h6 class="pl-3 d-inline text-white">Existed Projects</h6>
            </div>
        </li>

        <div id="projects">
        </div>

    </ul>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h3 class="text-center dark-text">Create Project</h3>
                    <form class="needs-validation" method="post" action="deploy.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Project name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value="" required
                                    name="project_name" autofocus="">
                                <div class="invalid-feedback">
                                    Valid project name is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="file" class="custom-file-input" id="fav_icon" name="fav_icon">
                                <label class="custom-file-label" for="fav_icon" style="margin-top: 30px;">Fav Icon
                                    (optional)</label>
                            </div>
                        </div>

                        <!-- Project Includes -->

                        <div class="mb-3">

                            <ul class="list-group">
                                <li class="list-group-item text-center active">
                                    <div>
                                        <h6 class="pl-3 d-inline text-white">Project Includes</h6>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked="" name="bootstrap"
                                            id="bootstrap">
                                        <label class="custom-control-label" for="bootstrap">Bootstrap 4.4.1 </label>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked=""
                                            name="fontawesome" id="fontawesome">
                                        <label class="custom-control-label" for="fontawesome">Fontawesome 5</label>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked="" name="jquery"
                                            id="jquery">
                                        <label class="custom-control-label" for="jquery">JQuery.slim.min.js -
                                            3.5.0</label>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="croppie" id="croppie">
                                        <label class="custom-control-label" for="croppie">Croppie </label>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="sweetalert"
                                            id="sweetalert">
                                        <label class="custom-control-label" for="sweetalert">Sweet Alert </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Generate Files -->

                        <div class="mb-3">

                            <ul class="list-group">
                                <li class="list-group-item text-center active">
                                    <div>
                                        <h6 class="pl-3 d-inline text-white">Generate Files</h6>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked="" name="html_file"
                                            id="html_file">
                                        <label class="custom-control-label" for="html_file">index.html </label>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked="" name="php_file"
                                            id="php_file">
                                        <label class="custom-control-label" for="php_file">index.php </label>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked="" name="css_file"
                                            id="css_file">
                                        <label class="custom-control-label" for="css_file">style.css </label>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked="" name="scss_file"
                                            id="scss_file">
                                        <label class="custom-control-label" for="scss_file">style.scss </label>
                                    </div>
                                </li>
                                <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked="" name="js_file"
                                            id="js_file">
                                        <label class="custom-control-label" for="js_file">script.js </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="mb-3">
                            <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" checked=""
                                        name="generate_structure" id="generate_structure">
                                    <label class="custom-control-label" for="generate_structure">Generate Structure for
                                        the index files</label>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" checked="" name="link_files"
                                        id="link_files">
                                    <label class="custom-control-label" for="link_files">Link index files with the
                                        generated files</label>
                                </div>
                            </li>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block text-white" name="submit" type="submit">Continue
                            to create

                            <div id="loader" class="d-inline"></div>

                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

	<script>
	
	$(document).ready(function() {

		$.getJSON('JSON/projects.json',() => {

		}).done((data)=>{

            var project_item = '';
            for(var i=0; i<data.length; i++) {

                project_item += '<li class="list-group-item list-group-item-action d-flex justify-content-between dark-secondary"><div>'+data[i]['project_name']+'</div><div class="icons"><a href="Projects/'+data[i]['project_name']+'" target="_blank"><i class="fas fa-eye text-primary"></i></a><a href="#" class="delete_project" id="'+data[i]['id']+'"><i class="fas fa-trash text-danger ml-3"></i></a></div></li>';
            }
            $('#projects').html(project_item);
		});
	});
	
	</script>

</body>

</html>