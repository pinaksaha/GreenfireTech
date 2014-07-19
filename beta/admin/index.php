<!DOCTYPE html>
<?php 
	
	error_reporting(0);
	session_start();
	
	include_once("../lib/lib.php");
	
	$user = getUserByID($_SESSION['Userid']);
	$profile = getProfileByUserID($_SESSION['Userid']);
	$view = $_REQUEST['view'];
?>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <title>Greenfire Main Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- base css styles -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/normalize/normalize.css">

    <!-- page specific css style, not sure but ok -->
    <link rel="stylesheet" href="css/flaty.css">
    <link rel="stylesheet" href="css/flaty-responsive.css">
      <!--page specific css styles-->
        <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
        <link rel="stylesheet" type="text/css" href="assets/jquery-pwstrength/jquery.pwstrength.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-duallistbox/duallistbox/bootstrap-duallistbox.css" />
        <link rel="stylesheet" type="text/css" href="assets/dropzone/downloads/css/dropzone.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-switch/static/stylesheets/bootstrap-switch.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

    

    <link rel="shortcut icon" href="img/favicon.png">
    
    
     <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
		<link rel="stylesheet" href="css/flaty.css">
        <link rel="stylesheet" href="css/flaty-responsive.css">

        <link rel="shortcut icon" href="img/favicon.png">

    <script src="assets/modernizr/modernizr-2.6.2.min.js"></script>
  </head>
  <body>
  	<!-- BEGIN NAVBAR -->
  	<div id="navbar" class="navbar">
  		<div class="navbar-inner">
  			<div class="container-fluid">
  				<!-- BEGIN BRAND -->
  				<a href="index.php" class="brand">
  					<small>
  						<i class="icon-fire"></i>
  						GREEN FIRE 
  					</small>
  				</a>
  				<!-- EMD BRAND -->

  				<!-- BEGIN RESPONSIVE SIDEBAR COLLAPSE -->
  				<a href="#" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
  					<i class="icon-reorder"></i>
  				</a>
  				<!-- END RESPONSIVE SIDEBAR COLLAPSE -->

  				<!-- BEGIN NAVBAR BUTTONS -->
  				<ul class="nav flaty-nav pull-right">
  					<li class="user-profile">
  						<a data-toggle="dropdown" href="#" class="user-menu dropdown=toggle">
  							<?php 
	  							print "<img class='nav-user-photo' src='".$profile[0][pic_dir]."'>";
  							?>
  							<span class="hidden-phone" id="user_info"> 
  								<?php print " ".$user[0][username] ?>
  							</span>
  							<i class="icon.caret-down"></i>
  						</a>

  						<!-- BEGIN USER DROPDOWN -->
  						<ul class="dropdown-menu dropdown-navbar" id="user_menu">
  							
  							<li> <!-- Account Settings/edit password and email things-->
  								<a href="index.php?view=editaccount">
  									<i class="icon-cog"></i>
  									Account Settings
  								</a>
  							</li>

  							<li> <!-- Profile Settings/edit username and stuff-->
  								<a href="index.php?view=editprofile">
  									<i class="icon-user"></i>
  									Profile Settings
  								</a>
  							</li>

  							<li class="divider"></li>

  							<li> <!-- Log out-->
  								<a href="../logout.php">
  									<i class="icon-off"></i>
  									Logout
  								</a>
  							</li>
  						</ul>
  					</li>
  				</ul>
  				<!-- END NAVBAR BUTTONS -->
  				<!-- END NAVBAR BUTTONS -->
  			</div> <!-- /.container-fluid -->
  		</div> <!-- /.navbar-inner -->
  	</div>
  	<!-- END NAVBAR -->

  	<!-- BEGIN Container -->
    <div class="container-fluid" id="main-container">
    	<!-- BEGIN SIDEBAR -->
  		<div id="sidebar" class="nav-collapse">
  			<!-- BEGIN NAV LIST -->
  			<ul class="nav nav-list">
  				<!-- END SEARCH FORM -->

  				<!-- TESTING -->
  				<?php 
	  				if($view == "" || $view == "home")
	  				{
		  				print "<li class='active'>";
	  				}
	  				else
	  				{
		  				print "<li>";
	  				}	
  				?>
  				
  					<a href="index.php?view=home">
  						<i class="icon-dashboard"></i>
  						<span>HOME</span>
  					</a>
  				</li>
  				
  				<?php 
	  				if($view == "profile")
	  				{
		  				print "<li class='active'>";
	  				}
	  				else
	  				{
		  				print "<li>";
	  				}	
  				?>
  					<a href="index.php?view=profile">
  						<i class="icon-user"></i>
  						<span>Profile</span>
  					</a>
  				</li>
  				
  				<?php 
	  				if($view == "campaign")
	  				{
		  				print "<li class='active'>";
	  				}
	  				else
	  				{
		  				print "<li>";
	  				}	
  				?>
  					<a href="index.php?view=campaign">
  						<i class="icon-flag-alt"></i>
  						<span>Campaigns</span>
  					</a>
  				</li>
  				
  				<?php 
	  				if($view == "project")
	  				{
		  				print "<li class='active'>";
	  				}
	  				else
	  				{
		  				print "<li>";
	  				}	
  				?>
  					<a href="index.php?view=project">
  						<i class="icon-hdd"></i>
  						<span>Projects</span>
  					</a>
  				</li>
				
				<?php
					if( $view == "products")
					{
						print "<li class='active'>";
					}
					else
					{
						print "<li>";
					}
				?>
					<a href="index.php?view=products">
						<i class="icon-gamepad"></i>
						<span>Products</span>
					</a>
				</li>
  				
  			</ul>
  			<!-- END NAV LIST -->

  			<!-- BEGIN SIDEBAR COLLAPSE BUTTON -->
  			<div id="sidebar-collapse" class="visible-desktop">
  				<i class="icon-double-angle-left"></i>
  			</div>
  			<!-- END SIDEBAR COLLAPSE BUTTON -->
  			
  		</div>
  		<!-- END SIDEBAR -->

  		<!-- BEGIN CONTENT -->
  		<div id="main-content">
  			<!-- BEGIN PAGE TITLE -->
  			<div class="page-title">
  				
  					<?php 
	  					
	  					if($view == "")
	  					{
		  					require("./view/home.php");
		  					
	  					}
	  					if($view == "home")
	  					{
		  					require("./view/home.php");
		  					
	  					}
	  					if($view == "profile")
	  					{
		  					require('./view/profile.php');	
	  					}
						if($view == "editprofile")
	  					{
		  					require("./view/editprofile.php");
	  					}
	  					if($view == "project")
	  					{
		  					require("./view/projects.php");
	  					}
						if($view == "editproject")
	  					{
		  					require("./view/editproject.php");
	  					}
	  					if($view == "campaign")
	  					{
		  					require("./view/campaigns.php");
	  					}
						if($view == "editcampaign")
	  					{
		  					require("./view/editcampaign.php");
	  					}
	  					if($view == "editaccount")
	  					{
		  					require("./view/editaccount.php");
	  					}
						if($view == "products")
	  					{
		  					require("./view/products.php");
	  					}
  					?>
  				
  			</div>
  			<!-- END PAGE TITLE -->
  		</div>
  		<!-- END CONTENT -->
  	</div>
  	<!-- END CONTAINER -->

  	<!-- All the javascript -->
  	<!-- Placed at the end of the document so the pages load faster -->

  	<!-- basic scripts -->
  	<script src="./assets/jquery/jquery-1.10.1.min.js"></script>
  	<script src="./assets/bootstrap/bootstrap.min.js"></script>
  	<script src="./assets/nicescroll/jquery.nicescroll.min.js"></script>
  	<script src="./assets/jquery-cookie/jquery.cookie.js"></script>

  	<!--page specific plugin scripts-->
    <script src="./assets/flot/jquery.flot.js"></script>
    
     <!--page specific plugin scripts-->
        <script type="text/javascript" src="./assets/chosen-bootstrap/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="./assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="./assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
         <script type="text/javascript" src="./assets/chosen-bootstrap/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="./assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="./assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>


  	<!-- flaty scripts -->
  	<script src="assets/js/flaty.js"></script>
  </body>
</html>