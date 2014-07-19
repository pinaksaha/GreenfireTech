<h1><i class="icon-hdd"></i>Projects</h1>
<?php
	print"<pre>";print_r($_REQUEST);print "</pre>"; 
	$project_id = $_REQUEST['id'];
	$project = getProjectByProjectID($project_id);
	print"<pre>";print_r($project);print "</pre>";
?>
<div class="row-fluid">
	 <div class="span12">
		<div class="box box-black">
			<div class="box-title">
				<h3> 
					<i class="icon-file"></i>
					Project Settings
				</h3>
			</div>
			<div class="box-content">
				<form action="./controller/updateproject.php" class="form-horizontal" method="post">
					<div class="control-group">
						<label class="control-label">Project Name</label>
						<div class="controls">	
							<?php 
								print "<input type='hidden' value='".$project_id."' name='project_id' />";
								print "<input type='text' value='".$project[0][name]."'name='project_name' class='span6'/>";
							?>
						</div>
					</div>
					<div class="control-group last">
						<label class="control-label">Project Description</label>
						<div class="controls">	
							<?php
								print "<textarea name='project_description' rows='5' class='input-block-level'>".$project[0][discriptions]."</textarea>";
							?>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary"><i class="icon-level-up"></i> Save</button>	
					</div>
				</form>
			</div>
		</div>
	 </div>
</div>

