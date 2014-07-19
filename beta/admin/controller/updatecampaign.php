<?php
	include("../../lib/lib.php");
	$campaignObj =  array(
		'id'			=> $_REQUEST['campaign_id'],
		'name' 			=> $_REQUEST['campaign_name'],
		'url' 			=> $_REQUEST['campaign_url'],
		'status' 		=> $_REQUEST['status'],
	);
	
	if(!empty($campaignObj['name']) )
	{
		if( !empty($campaignObj['url']) )
		{	
			updateCampaign($campaignObj);
			header('Location: ../index.php?view=campaign');
		}
		else
		{
			header('Location: ../index.php?view=campaign');
		}
	}
	else
	{
		header('Location: ../index.php?view=campaign');
	}
?>