<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GreenFire Technologies</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Landlr" name="description">
        <meta content="playlab" name="author">
         
        <!-- Bootstrap  -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Font Awesome  -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- Revolution Responsive jQuery Slider -->
        <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
        <!-- Landlr Style -->
        <link href="css/colors.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet"> 
        
        <!-- Favicon and touch icons  -->
        <link href="ico/apple-touch-icon-144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
        <link href="ico/apple-touch-icon-114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
        <link href="ico/apple-touch-icon-72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
        <link href="ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon-precomposed">
                
        <link href="ico/favicon.png" rel="shortcut icon">
               
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        
        
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
      	<script src="js/html5shiv.js"></script>
    	<![endif]-->
    	<?php 
    		include("./lib/lib.php");
    		
    		$team = getAllProfiles();
    		
    		$team = sanitizeProfiles($team);
    		
    		$projects = getAllProjects();
    		$projects = sanitizeProfiles($projects);
    		
    		$products = getAllProducts();
    		$products = sanitizeProfiles($products);
    		
    		$campaigns = getAllCampaigns();
    		$campaigns = sanitizeProfiles($campaigns);
    	?>
    	
    	
    </head>
    <body class="page-turquoise">
    
    	<div id="back">

		</div>
    			
		<!-- Navigation -->
		<header>
			<div class="navbar navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container">
						<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="brand" href="#"><i class="icon-fire"></i> GreenFire</a>
						<div class="nav-collapse collapse">
							<ul class="nav pull-right">
								<li><a href="#row1">Home</a></li>
								<li><a href="#row2">Team</a></li>
								<li><a href="#row3">Projects</a></li>
								<li><a href="#row4">Products</a></li>
								<li><a href="#row5">Campaigns</a></li>
								<li><a href="#row6">Donations</a></li>
								<li><a href="#row7">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div><!-- .navbar -->
		</header>
		
		<!-- Home -->
		<section class="wrapper home">
			<a class="anchor" id="row1"></a>
			<div class="container">
				<div class="row">
					<div class="span12 text-center">
						<hgroup class="main-title black">
							<h2 class="text-center">Green Fire is a software company</h2>
							<h3 class="text-center">At Green Fire we don't believe that the full potential of Open Source Software has been utilized yet,
							and we think this generation of developers will be the one to do it</h3>
						</hgroup>
						<a href="#row4"class="btn btn-large btn-tomato uppercase">See our Products</a>
						<a href="#row2"class="btn btn-large btn-transparent uppercase">Learn more</a>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Team -->
		<section class="wrapper bg-turquoise colored">
			<a class="anchor" id="row2"></a>
			<div class="container-fluid">
				<div class="row">
					<div class="span9 offset2 text-center">
						
							<h2 class="text-center">At Green Fire we are constantly trying to challenge technology </h2>
							<h3 class="text-center">We've seen technology not only for what it is, but what it could be or rather what it should be</h3>
						
					</div>
				</div>
			</div>	
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12 text-center">
						<?php 
							for($i=0;$i<sizeof($team);$i++)
							{
								if($i%4 == 0)
								{	
									//new row, create a row-fluid
									print "<div class = 'row-fluid'>";
								}
								
								print "<div class='box span3'>";
								
								print "<img width='100px' height='100px' class='img-circle boxcircle' src='".$team[$i]['pic_dir']."'>";
								
								print "<ul class='unstyled'>";
								
									print "<li><h4>".$team[$i]['position']."</h4></li>";
									print "<li>".$team[$i]['last_name'].",".$team[$i]['first_name']."</li>";
									print "<li>". $team[$i]['about'] ."</li>";
								print "</ul>"; //close list
								
								print "</div>"; //close span
								
								if( ($i+1)%4 == 0 || $i == sizeOf($team) )
								{
									//close row-fluid
									print "</div>";
								}
							}
						?>
					</div>			
				</div>
			</div>
		</section>
		
		
		<section class="wrapper bg-turquoise colored">
			<a class="anchor" id="row3"></a>
			<div class="container">
				<div class="row">
					<div class="span12 text-center">
						<hgroup class="main-title black">
							<h2 class="text-center">Here are some solutions we are currently pursuing</h2>
						</hgroup>
					</div>
				</div>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12 text-center">
				
						<?php 
						
							//print "<pre>";print_r($projects);print "</pre>";
							
							for($i=0;$i<sizeof($projects);$i++)
							{
								if($i%3 == 0)
								{	
									//new row, create a row-fluid
									print "<div class = 'row-fluid'>";
								}
								print "<div class='span4'>";
								print "<div class='box'>";
								print "<img width='50px' height='50px' class='img-circle boxcircle' src='".$projects[$i]['pic_dir']."'>";

								print "<ul class='unstyled'>";
									
										print "<li><h4>".$projects[$i]['name']."</h4></li>";
										print "<li><p>".$projects[$i]['discriptions']."<p></li>";
										print "</ul>";
									
								print "</div>"; //close box
								print "</div>"; //close span
								
								if( ($i+1)%3 == 0 || $i == sizeOf($projects) )
								{
									//close row-fluid
									print "</div>";
								}
							}
						?>
						
					</div>
				</div>
			</div>
			
			
			
		</section>
		
		
		<section class="wrapper bg-turquoise colored">
			<a class="anchor" id="row4"></a>
			<div class="container">
				<div class="row">
					<div class="span12 text-center">
						<hgroup class="main-title black">
							<h2 class="text-center">Here are some of our published solutions</h2>
						</hgroup>
					</div>
				</div>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12 text-center">
						<?php 
							if($i%3 == 0)
							{	
								//new row, create a row-fluid
								print "<div class = 'row-fluid'>";
							}
							
							//print "<pre>";print_r($products);print "</pre>";
							for($i=0;$i<sizeof($products);$i++)
							{
								
								print "<div class='box span3'>";
								print "<img width='50px' height='50px' class='img-circle boxcircle' src='".$products[$i]['pic_dir']."'>";

								print "<ul class='unstyled'>";
									
										print "<li><h4>".$products[$i]['name']."</h4></li>";
										print "<li><h4>$".$products[$i]['price']."</h4></li>";
										print "<li><p>".$products[$i]['discriptions']."<p></li>";
										print "</ul>";
									
								print "</div>";
								
								if( ($i+1)%4 == 0 || $i == sizeOf($team) )
								{
									//close row-fluid
									print "</div>";
								}
							}
							
						?>
						
					</div>
				</div>
			</div>
			
		</section>
		
		<section class="wrapper bg-turquoise colored">
			<a class="anchor" id="row5"></a>
			<div class="container">
				<div class="row">
					<div class="span12 text-center">
						<hgroup class="main-title black">
							<h2 class="text-center">GreenFire is currently a startup.</h2>
							<h3 class="text-center">If you like our solutions, please join the cause. Here are some of your current Campaigns.</h3>
						</hgroup>
					</div>
				</div>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12 text-center">
				
						<?php 
						
							//print "<pre>";print_r($campaigns);print "</pre>";
							
							for($i=0;$i<sizeof($campaigns);$i++)
							{
								if($i%3 == 0)
								{	
									//new row, create a row-fluid
									print "<div class = 'row-fluid'>";
								}
								print "<div class='box span3'>";
								print "<img width='50px' height='50px' class='img-circle boxcircle' src='".$campaigns[$i]['pic_dir']."'>";

								print "<ul class='unstyled'>";
									
										print "<li><h4>".$campaigns[$i]['name']."</h4></li>";
										print "<li><h4><a href='".$campaigns[$i]['url']."'>".$campaigns[$i]['source']."</a></h4></li>";
										print "<li><p>".$campaigns[$i]['discriptions']."<p></li>";
										print "</ul>";
									
								print "</div>";
								
								if( ($i+1)%4 == 0 || $i == sizeOf($team) )
								{
									//close row-fluid
									print "</div>";
								}
							}
							
						?>
						
					</div>
				</div>
			</div>
			
			
		</section>
		
		<section class="wrapper bg-turquoise colored">
			<a class="anchor" id="row6"></a>
			<div class="container">
				<div class="row">
					<div class="span12 text-center">
						<hgroup class="main-title black">
							<h2 class="text-center">Every bit helps. </h2>
							<h3 class="text-center">Thank you for your consideration.</h3>
						</hgroup>
					</div>
				</div>
			</div>
			
				<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12 text-center">
						
						<div class=" box span3 offset1">
							<ul class='unstyled'>
								<li>Coinbase</li>
								<li>
								
									<a class="coinbase-button" data-code="1c6abd6d4a0a7bc46f058dc53c6f8fa8" data-button-style="custom_large" href="https://coinbase.com/checkouts/1c6abd6d4a0a7bc46f058dc53c6f8fa8">Donate Bitcoins</a><script src="https://coinbase.com/assets/button.js" type="text/javascript"></script>
								
								</li>
							</ul>
						</div>
											
						<div class="box span3 offset1">
							<ul class='unstyled'>
								<li>Paypal</li>
								<li>
								
									<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
										<input type="hidden" name="cmd" value="_s-xclick">
										<input type="hidden" name="hosted_button_id" value="4VGZ269GAFCH6">
										<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
										<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
									</form>

								
								</li>
							</ul>
						</div>
											
						<div class="span3 offset1">
							<ul class='unstyled'>
							</ul>
						</div>
						
						
					</div>
				</div>
			</div>
		</section>
			
		<section class="wrapper bg-turquoise colored">
			<a class="anchor" id="row7"></a>
			<div class="container">
				<div class="row">
					<div class="span12 text-center">
						<hgroup class="main-title black">
							<h1 class="text-center">Contact us Or Connect with us:</h1>
						</hgroup>
					</div>
				</div>
			</div>
			
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12 text-center">
						
						<div class="span5 offset4 text-center">
														
								<ul class="nav nav-pills text-center">
									<li><a href="mailto:accounts@greenfiretech.com"> <h2 class="text-center"> <i class="icon-envelope"></i></h2></a></li>
									<li><a href="#"> <h2 class="text-center"> <i class="fa fa-facebook-square"></i> </h2></a></li>
									<li><a href="#"> <h2 class="text-center"> <i class="fa fa-twitter-square"></i></h2></i></a></li>
									<li><a href="#"> <h2 class="text-center"> <i class="fa fa-linkedin-square"></i></h2></i></a></li>
									<li><a href="#"> <h2 class="text-center"> <i class="fa fa-youtube"></i></h2></i></a></li>
									<li><a href="#"> <h2 class="text-center"> <i class="fa fa-github-square"></i></h2></i></a></li>
								</ul>
							
						</div>
					</div>
				</div>
			</div>
					
		</section>
    
		<script type="text/javascript" src="js/jquery.js"></script>
	    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
	    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	    <!-- Revolution Responsive jQuery Slider -->
	    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>
	    <script type="text/javascript" src="js/custom.js"></script>
    
    </body>
</html>