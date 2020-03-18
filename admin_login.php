<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Ashwamegh Group</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
	
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
			<div id="div-to-replace">
				<div class="center wow fadeInDown">
					<h2>Login</h2>
					<p class="lead">
					Login With Your Credential. 
					</p>
				</div>
				
				<div class="row row-centered contact-wrap"> 
					<form id="login-contact-form" class="contact-form" name="contact-form" method="post" action="tempfilereq.php">
						<div class="col-sm-5 col-centered">
							<div class="form-group">
								<label>User Name *</label>
								<input type="text" name="name" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Password *</label>
								<input type="password" name="password" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>How much is (<img src="captcha.php"> )*</label>
								<input type="text" class="form-control" name="captchacode" required="required"> <br />
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Login</button>
							</div>
						</div>
					</form>
				</div><!--/.row-->
				
				<!-- about us slider -->
				
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
	<script src="js/item-ajax.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>