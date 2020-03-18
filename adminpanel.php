<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ashwamegh Group">
    <meta name="author" content="Ashwamegh Group">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords"  content="Ashwamegh Group">
    <meta name="google" content="Ashwamegh Group" />
	<meta name="yahoo" content="Ashwamegh Group" />
	<meta name="bing" content="Ashwamegh Group" />
    <title>Admin Panel | Ashwamegh Group</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	<link href="css/toastr.css" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-92605105-1', 'auto');
	  ga('send', 'pageview');

	</script>
	
</head><!--/head-->

<?php 
require("libs/constants.php");
require("libs/config.php");
?>

<body>

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="sidebar col-xs-12 col-sm-3 col-md-3">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +91 98252 50479</p></div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
	</header><!--/header-->

    <section id="admin_panel">
		<div class="container">
			<ul class="nav nav-tabs">
				<li class="menu-tab-item-catalouge active"><a data-toggle="tab" href="#catalouges">Catalouges</a></li>
				<li class="menu-tab-item-image"><a data-toggle="tab" href="#images">Images</a></li>
			</ul>
			<div class="tab-content">
				<div id="catalouges" class="tab-pane fade in active">
					<div class="row">
						<div class="col-lg-12 margin-tb">					
							<div class="pull-left">
								<h2>Catalouges</h2>
							</div>
							<div class="pull-right">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
									Add New Catalouge
								</button>
							</div>
						</div>
					</div>
					</br>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="100px">Sr. No.</th>
								<th>Catalouge Name</th>
								<th width="200px">Action</th>
							</tr>
						</thead>
						<tbody id="catalouge_table">
						</tbody>
					</table>
					
					<!-- Create Item Modal -->
					<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">x</span></button>
									<h4 class="modal-title" id="myModalLabel">Create New Catalouge</h4>
								</div>

								<div class="modal-body">
									<form data-toggle="validator" action="libs/create.php" method="POST">

										<div class="form-group">
											<label class="control-label" for="title">Catalouge Name:</label>
											<input type="text" name="title" class="form-control" data-error="Please Enter Catalouge Name." required />
											<div class="help-block with-errors"></div>
										</div>

										<div class="form-group">
											<button type="submit" class="btn crud-submit btn-success">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Edit Item Modal -->
					<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
									<h4 class="modal-title" id="myModalLabel">Edit Catalouge</h4>
								</div>

								<div class="modal-body">
									<form data-toggle="validator" action="libs/update.php" method="put">
										<input type="hidden" name="id" class="edit-id">

										<div class="form-group">
											<label class="control-label" for="title">Catalouge Name:</label>
											<input type="text" name="title" class="form-control" data-error="Please Enter Catalouge Name." required />
											<div class="help-block with-errors"></div>
										</div>

										<div class="form-group">
											<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
										</div>

									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div id="images" class="tab-pane fade">
					<div class="row">
						<div class="col-lg-12 margin-tb">					
							<div class="pull-left">
								<h2>Images</h2>
							</div>
						</div>
					</div>
					</br>
					<div class="row">
						<div class="col-lg-12 margin-tb">
							<label class="pull-left" >Choose Catalouge</label>
						</div>
						<div class="col-lg-6 pull-left margin-tb">
							<select name="catalouge_name" id="catalouge_name" class="form-control">
								
							</select>
						</div>
					</div>
					</br>
					<div class="pull-right">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-image">
							Add New Image
						</button>
					</div>
					</br>
					</br>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="100px">Sr. No.</th>
								<th>Image Thumbnail</th>
								<th width="200px">Action</th>
							</tr>
						</thead>
						<tbody id="image_table">
						
						</tbody>
					</table>
					
					<!-- Create New Image Modal -->
					<div class="modal fade" id="add-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" ><span aria-hidden="true">x</span></button>
									<h4 class="modal-title" id="myModalLabel">Add New Image</h4>
								</div>

								<div class="modal-body">
									<form data-toggle="validator" action="libs/add_image.php" method="POST">

										<div class="form-group">
											<label class="control-label" for="title">Upload Image:</label>
											<input type="file" name="image_name" id="image_name" class="form-control" data-error="Please Add Image File." required />
											<div class="help-block with-errors"></div>
										</div>

										<div class="form-group">
											<button type="submit" class="btn crud-image-submit btn-success">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
				<ul id="pagination" class="pagination-sm"></ul>
				
		  </div>
		</div><!--/.container-->
    </section><!--/about-us-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
				<div class="col-sm-6"></div>
                <div class="col-sm-6" align="right">
                    Copyright © 2017 All rights reserved | Designed & Developed by <a target="_blank" href="https://pkpipaliya.in/" title="Pruthvesh Pipaliya">Pruthvesh Pipaliya</a>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
	<script src="js/item-ajax.js"></script>
	<script src="js/toastr.js"></script>
	<script type="text/javascript" src="js/pagination.js"></script>
</body>
</html>