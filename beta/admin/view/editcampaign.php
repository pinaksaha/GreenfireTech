<h1><i class="icon-flag-alt"></i>Campaigns</h1>

<?php
	print"<pre>";print_r($_REQUEST);print "</pre>"; 
	$campaign_id = $_REQUEST['id'];
	$campaign = getCampaignByID($campaign_id);
	print"<pre>";print_r($campaign);print "</pre>";
?>

<div class="row-fluid">
	<div class="span12">	
		<div class="box box-black">
			<div class="box-title">
				<h3> 
					<i class="icon-file"></i>
					Edit Campaign 
				</h3>
			</div>
			<div class="box-content">
				<form action="./controller/updatecampaign.php" class="form-horizontal" method="post">
					<div class="control-group">
						<label class="control-label">Campaign Name</label>
						<div class="controls">	
							<?php 
								print "<input type='hidden' value='".$campaign_id."' name='campaign_id'/>";
								print "<input type='text' value='".$campaign[0]['name']."'name='campaign_name' class='span6'/>";
							?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Campaign URL</label>
						<div class="controls">
							<?php
								print "<input type='text' value='".$campaign[0]['url']."' name='campaign_url' class='span6'/>";
							?>
						</div>
					</div>
					<div class="control-group last">
						<label class="control-label">Campaign Status</label>
						<div class="controls">
							<?php
								print "<select class='input-large' tableindex='1' name='status'>";
								if( $campaign[0]['status'] =='Open')
								{
									print "<option value='Open' selected>Open</option>";
									print "<option value='Closed'>Closed</option>";
								}
								else
								{
									print "<option value='Open'>Open</option>";
									print "<option value='Closed' selected>Closed</option>";
								}
								print "</select>";
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