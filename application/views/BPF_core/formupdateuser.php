  <div class="main-inner">
    <div class="container">
      <div class="row">
	  			<?php
				foreach($unittobeedited as $val){
					//print_r($val);
					$id=$val->idunit;
					$username = $val->username;
					$namaunit = $val->namaunit;
				}
				?>

			<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-pushpin"></i>
						<h3>UPDATE USER <?php echo strtoupper($namaunit);?></h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						<div class="account-container register">
	
	<div class="content clearfix">
		
		<form action="#" id='formupdateuser'>
		
			
			<div class="login-fields">
				
				<div class="field">
					<label for="firstname">Username:</label>
					<input type="text" id="firstname" name="user" value="<?php echo $username;?>" placeholder="<?php echo $username;?>" class="login"/>
					<input type="hidden" id="idunittobeedited" name="idunittobeedited" value="<?php echo $id;?>" />
				</div> <!-- /field -->
				
				<!--div class="field">
					<label for="email">Old Password:</label>
					<input type="password" id="oldpassword" name="oldpassword" value="" placeholder="Old Password" class="login"/>
				</div--> 
				
				<div class="field">
					<label for="password">New Password:</label>
					<input type="password" id="newpassword" name="newpassword" value="" placeholder="Password" class="login"/>
				</div> <!-- /field -->
				
				<!--div class="field">
					<label for="confirm_password">Confirm New Password:</label>
					<input type="password" id="cnewpassword" name="confirmpassword" value="" placeholder="Confirm Password" class="login"/>
				</div-->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
									
				<button class="button btn btn-primary btn-large" id='doupdateuser' type='button'>Update</button>
				<button class="button btn btn-danger btn-large" id='cancelupdateuser' type='button'>Cancel</button>
				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
				
		    </div> <!-- /spa12 -->

			</div>
		</div>
	</div>