<link rel="stylesheet" type="text/css" href="../assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<link rel="stylesheet" type="text/css" href="../assets/jquery-tags-input/jquery.tagsinput.css" />
<?php	
	//$assigned = getAllUsersToProjects();
	//print"<pre>";print_r($assigned);print "</pre>";
?>
	
<script>
	function updateProjectUsers()
	{
		//returns the project id
		var project_id = document.getElementById("project_id").value;
		
		alert(project_id);
		//change users assign to project according to the project selected
		
	}
</script>

<h1><i class="icon-hdd"></i>Projects</h1>

<div class="row-fluid">
	<div class="span12">
		<div class="box box-black">
			<div class="box-title">
				<h3>Add Project</h3>
				<div class="box-tool">
                    <a data-action="collapse" href="#"><i class="icon-plus"></i></a>
                </div>
			</div>
			<div class="box-content" style="display:none;">
				<form action="./controller/addproject.php" enctype="multipart/form-data" class="form-horizontal form-bordered form-row-stripped" method="post">
				<div class="control-group">
					<label class="control-label">Project Picture</label>
					<div class="controls">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="fileupload-new thumbnail" style ="width: 200px; height: 150px;">
								<img src="../../project_pic/project_default.png">
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
                    <label for="textfield5" class="control-label">Project Name</label>
                    <div class="controls">
                        <input type="text" name="projectName" id="textfield5" placeholder="Project Name" class="input-xlarge">
					</div>
                </div>
                
                <div class="control-group last">
	                <label for="textarea5" class="control-label">Description</label>
	                <div class="controls">
	                    <textarea name="description" id="textarea5" rows="5" class="input-block-level"></textarea>
	                </div>
	            </div>
                <div class="form-actions">
                   <button type="submit" class="btn btn-primary"><i class="icon-plus"></i> Add</button>
                </div>
				</form>
			</div>	
		</div>
	</div>
</div>

<div class="row-fluid">
	<!-- Add Users -->
	<div class="span8">
		<div class="box box-black">
			<div class="box-title">
				<h3>Assign and Remove Users to Projects</h3>
				<div class="box-tool">
                    <a data-action="collapse" href="#"><i class="icon-plus"></i></a>
                </div>
			</div>
			<div class="box-content" style="display:none;">
				<form action="./controller/assign.php" class="form-horizontal form-bordered form-row-stripped" method="post">
					<div class="control-group">
						<label class="control-label">Project Select</label>
						<div class="controls">
							<select class="input-large" tabindex="1" name="project_id" id="project_id" onchange="updateProjectUsers()">
							<?php
								$projects = getAllProjects();
								
								for( $i = 0; $i < sizeOf($projects); $i++)
								{	
									print "<option value='".$projects[$i][id]."'>".$projects[$i][name]."</option>";
								}
							?>
							</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Available Users</label>
						<div class="controls">
							<select class="input-large" tableindex="1" name="user_id">
							<?php
								$users = getAllProfiles();
								
								for( $i = 0; $i < sizeOf($users); $i++)
								{
									print "<option value='".$users[$i][id]."'>".$users[$i][first_name]." ".$users[$i][last_name]."</option>";
								}
							?>
							</select>
						</div>
					</div>
					
					<div class="control-group last">
						<label class="control-label">Testing!</label>
						<div class="controls">
							<input id="tag-input-1" class="tags" type="text" value="Jing,Pinak" style="display: none;">
							<div id="tag-input-1_tagsinput" class="tagsinput" style="width: 240px; height: 100px;">
								<span class="tag">
									<span>Jing Leong  </span>
									<a href="#" title="Removing tag">x</a>
								</span>
								<div class="tags_clear"></div>
							</div>
						</div>
					</div>
					
					<div class="form-actions">
						<button class="btn btn-primary" type="submit"><i class="icon-ok"></i> Assign</button>
					</div>
				</form>
			</div>	
		</div>
	</div>
	
	<!-- Assigned Project Users -->
	<div class="span4">
		<div class="box box-black">
			<div class="box-title">
				<h3>Assigned Users</h3>
				<div class="box-tool">
                    <a data-action="collapse" href="#"><i class="icon-plus"></i></a>
                </div>
			</div>
			<div class="box-content" style="display:none;">
			
				<?php
					//get all users assigned to this project
					//$projectUserProfiles = getProjectUsersByProjectID( );
				?>
				
				<!--example -->
				<!--
				<div class="box">
					<div class="box-title">
						<h3>User1</h3>
						<div class="box-tool">
							<a class="btn btn-danger" href="#">
								<i class="icon-remove"></i>
							</a>
						</div>
					</div>
				</div>
				-->
				<!-- example -->
			</div>
		</div>
	</div>
</div>


<div class="row-fluid">
	<div class ='span12'>
		<div class="box box-black">
			<div class="box-title">
				<h3>Active Projects</h3>
				<div class="box-tool">
					<a href='#' data-action='collapse'><i class='icon-chevron-up'></i></a>
				</div>
			</div>
			<div class="box-content" style="display:block;">
			
			<?php
				$projects = getActiveProjects();
				for( $i = 0; $i < sizeOf($projects); $i++ )
				{
					if($i%3 == 0)
					{	
						//new row, create a row-fluid
						print "<div class = 'row-fluid'>";
					}
					
					//box, box title and box tools
					print "<div class='span4'>";
					print "<div class='box box-black'>";
					
					//display picture of project and information
					print "<div class='box-title'><h3>". $projects[$i][name]."</h3></div>";
					print "<img src='".$projects[$i][pic_dir]."' style='margin-left:120px; width:100px; height:100px;'>";
					print "<div class='box-content'><p>". $projects[$i][discriptions]."</p>";
					
					//form and description
					$projectID = $projects[$i][id]; //set project ID to be passed to edit page
					print "<form action='./controller/deleteproject.php' class='form-horizontal form-bordered form-row-stripped' method='post'>";
					
					//add hidden tag
					print "<input type='hidden' name='project_id' value = '".$projects[$i][id]."'/>";
					
					//edit and delete button
					print "<a href='./index.php?view=editproject&id=$projectID' class='btn btn-block btn-primary btn-large'><i class='icon-edit'></i> Edit</a>";
					print "<button type='submit' class='btn btn-block btn-danger btn-large'><i class='icon-remove'></i> Delete</button></form>";
					print "</div>"; //content close
					print "</div>"; //box close
					print "</div>"; //span close
					
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
</div>

<!--basic scripts-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/jquery/jquery-1.10.1.min.js"><\/script>')</script>
<script src="../assets/nicescroll/jquery.nicescroll.min.js"></script>
<script src="../assets/jquery-cookie/jquery.cookie.js"></script>

<!--page specific plugin scripts-->
<script src="../assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

<!--page specific plugin scripts-->
<script type="text/javascript" src="./assets/chosen-bootstrap/chosen.jquery.min.js"></script>
<script type="text/javascript" src="./assets/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="./assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="./assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
<!--<script type="text/javascript" src="./assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>-->
<script type="text/javascript" src="./assets/jquery-ui/jquery-ui.min.js"></script>
