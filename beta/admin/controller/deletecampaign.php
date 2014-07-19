<?php
	include("../../lib/lib.php");
	
	$campaign_id = $_REQUEST['campaign_id'];
	
	//delete the project
	deleteCampaign($campaign_id);
		
	//reload page
	header('Location: ../index.php?view=campaign');
?>