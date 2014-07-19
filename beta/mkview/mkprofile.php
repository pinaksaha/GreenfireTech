<?php 
	
	session_start();
	include("../lib/lib.php");
	
	$users = getProfileByUserID($_SESSION['Userid']);	
	
	
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Make Profile</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!--base css styles-->
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/normalize/normalize.css">

    <!--page specific css styles-->
    
      <link rel="stylesheet" type="text/css" href="../assets/chosen-bootstrap/chosen.min.css" />
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" />

    <!--flaty css styles-->
    <link rel="stylesheet" href="../css/flaty.css">
    <link rel="stylesheet" href="../css/flaty-responsive.css">

    <link rel="shortcut icon" href="../img/favicon.png">

    <script src="../assets/modernizr/modernizr-2.6.2.min.js"></script>
</head>

<body>
<!-- BEGIN Content -->
            <div id="main-content">
                <!-- BEGIN Main Content -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i>
                                <?php
	                            	if(!empty($_SESSION['profile_error']))
	                            	{
		                            	print $_SESSION['profile_error'];
	                            	}
	                            	else 
	                            	{
		                            	print "Make A Profile";	
	                            	}
                                ?></h3>
                            </div>
                            <div class="box-content">
                                <form action="../auth/oauth_profile.php" enctype="multipart/form-data" class="form-horizontal" method="post">
                                   <div class="form-wizard" id="form-wizard-1">
                                      <ul class="row-fluid steps">
                                         <li class="span3">
                                            <a href="#tab1-1" data-toggle="tab" class="step active">
                                                <span class="number">1</span>
                                                <span class="desc"><i class="icon-ok"></i> Name</span>   
                                            </a>
                                         </li>
                                         <li class="span3">
                                            <a href="#tab1-2" data-toggle="tab" class="step">
                                                <span class="number">2</span>
                                                <span class="desc"><i class="icon-ok"></i> Profile Picture</span>   
                                            </a>
                                         </li>
                                          <li class="span3">
                                            <a href="#tab1-3" data-toggle="tab" class="step">
                                                <span class="number">3</span>
                                                <span class="desc"><i class="icon-ok"></i> Profile Setup</span>   
                                            </a>
                                         </li>
                                      </ul>
                                      <div class="progress progress-primary progress-striped">
                                         <div class="bar"></div>
                                      </div>
                                      <div class="tab-content">
                                         <div class="tab-pane active" id="tab1-1">
                                            <div class="control-group">
                                                <label for="firstname" class="control-label">First Name</label>
                                                <div class="controls">
                                                    <input type="text" name="firstname" id="firstname" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label for="lastname" class="control-label">Last Name</label>
                                                <div class="controls">
                                                    <input type="text" name="lastname" id="lastname" class="input-xlarge">
                                                </div>
                                            </div>
                                         </div>
                                         <div class="tab-pane" id="tab1-2">
                                          <div class="box-content">
		                               
		                                    <div class="control-group">
                                      <label class="control-label">Image Upload</label>
                                      <div class="controls">
                                         <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                               <img src="../img/profile-default.jpg" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                               <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                               <span class="fileupload-exists">Change</span>
                                               <input type="file" class="default" name="file"/></span>
                                               <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                         </div>
                                        </div>
                                    </div>
                                   		                                
                                         
										  </div>
                                         </div>
                                         <div class="tab-pane" id="tab1-3">
                                            <div class="control-group">
                                                <label for="country" class="control-label">Position</label>
                                                <div class="controls">
                                                    <input type="text" name="position" id="position" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label for="city" class="control-label">E-Mail</label>
                                                <div class="controls">
                                                    <input type="email" name="email" id="email" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group last">
                                                <label for="textarea" class="control-label">About Me</label>
                                                <div class="controls">
                                                    <textarea name="aboutme" id="textarea" rows="15" class="input-block-level"></textarea>
                                                </div>
                                            </div>
                                         </div>
                                         
                                      </div>
                                      <div class="form-actions clearfix">
                                         <a href="javascript:;" class="btn button-previous">
                                            Back 
                                         </a>
                                         <a href="javascript:;" class="btn btn-primary button-next">
                                            Continue
                                         </a>
                                        <a href="" class="btn btn-success button-submit">
                                            <input type="submit"  class="btn btn-success button-submit" value="Submit" />
                                        </a>
                                      </div>
                                   </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
          
                <footer>
                    <p>2013 © Greenfire Technologies</p>
                </footer>

                <a id="btn-scrollup" class="btn btn-circle btn-large" href="#"><i class="icon-chevron-up"></i></a>
            </div>
            <!-- END Content -->
        </div>
        <!-- END Container -->

        <!--basic scripts-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/jquery/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="../assets/bootstrap/bootstrap.min.js"></script>
        <script src="../assets/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="../assets/jquery-cookie/jquery.cookie.js"></script>

        <!--page specific plugin scripts-->
        <script src="../assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
         <!--page specific plugin scripts-->
        <script type="text/javascript" src="../assets/chosen-bootstrap/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

        <!--flaty scripts-->
        <script src="../js/flaty.js"></script>

</body>
</html>