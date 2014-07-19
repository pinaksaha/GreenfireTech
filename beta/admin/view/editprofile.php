<link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<?php
	print"<pre>";print_r($profile);print "</pre>";
	$users_id = $_SESSION['Userid'];
?>

<div class="row-fluid">
    <div class="span12">	
		<div class="box box-black">
			<div class="box-title">
				<h3> 
					<i class="icon-file"></i>
					Profile Settings 
				</h3>
			</div>
			<div class="box-content">	
				<form action="./controller/updateprofile.php" enctype="multipart/form-data" class="form-horizontal" method="post">
					<div class="control-group">
						<label class="control-label">Profile Picture</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style ="width: 200px; height: 150px;">
									<?php
										print "<img src='../../".$profile[0]['pic_dir']."'/>";
									?>
								</div>
								<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
								<div>
									<span class="btn btn-file">
										<span class="fileupload-new">Select image</span>
										<span class="fileupload-exists">Change</span>
										<input class="default" type="file" name="file">
									</span>
									<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">First Name</label>
						<div class="controls">	
							<?php 
								print "<input type='hidden' name='profile_id' value='".$profile[0][id]."'/>";
								print "<input type='text' value='".$profile[0][first_name]."'name='first_name' class='span6'/>";
							?>
						</div>
					</div>
					<div class="control-group">
                        <label class="control-label">Last Name</label>
                        <div class="controls">
							<?php
								print "<input type='text' value='".$profile[0][last_name]."'name='last_name' class='span6' />";
							?>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label">Position</label>
                        <div class="controls">
							<?php
								print "<input type='text' value='".$profile[0][position]."'name='position' class='span6' />";
							?>
                        </div>
                    </div>
					<div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <?php
								print "<input type='text' value='".$profile[0][email]."'name='email' class='span6' />";
							?>
                        </div>
                    </div>
					<div class="control-group last">
						<label class="control-label">About me</label>
						<div class="controls">
							<?php
								$about_me = getAboutMeByProfileID($profile[0][id]);
								print "<textarea name ='about_me' value='".$about_me[0][about]."' rows='5' class = 'input-block-level'>".$about_me[0][about]."</textarea>";
							?>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!--basic scripts-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/jquery/jquery-1.10.1.min.js"><\/script>')</script>
<script src="../assets/nicescroll/jquery.nicescroll.min.js"></script>
<script src="../assets/jquery-cookie/jquery.cookie.js"></script>

<!--page specific plugin scripts-->
<script src="../assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

<!--page specific plugin scripts-->
<script type="text/javascript" src="../assets/chosen-bootstrap/chosen.jquery.min.js"></script>
<script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>