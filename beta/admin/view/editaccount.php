<div class="row-fluid">
    <div class="span12">	
		<div class="box box-black">
			<div class="box-title">
				<h3> 
					<i class="icon-gear"></i>
					Account Settings 
				</h3>
			</div>
			<div class="box-content">
					<form action="./controller/updateaccount.php" class="form-horizontal" method="post">
						<div class="control-group">
							<label class="control-label">Current Password</label>
							<div class="controls">	
								<?php 
									print "<input type='hidden' name='user_id' value='".$user[0][id]."'/>";
								?>
								<input type='password' value='' 'name='current_password' class='span6'/>
							</div>
						</div>
						<div class="control-group">
                            <label class="control-label">New Password</label>
                            <div class="controls">
								<input type='password' value='' 'name='new_password' class='span6'/>
                            </div>
                        </div>
						<div class="control-group">
                            <label class="control-label">Retype New Password</label>
                            <div class="controls">
                                <input type='password' value='' 'name='retype_new_password' class='span6'/>
                            </div>
                        </div>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

