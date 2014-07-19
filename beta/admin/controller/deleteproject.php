<?php
	include("../../lib/lib.php");
	
	$project_id = $_REQUEST['project_id'];
	
	//delete the project
	deleteProject($project_id);
	
	//reload page
	header('Location: ../index.php?view=project');
?>