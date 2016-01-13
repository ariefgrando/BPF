<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-pencil"></i>
	      				<h3>
							<?php
								foreach($itemisian as $val){
									echo $val->id." ".$val->namaitem;
									$id = $val->id;
								}
							?>
						</h3>
	  				</div> <!-- /widget-header -->
					
					<div style='padding-left:0px;' class="widget-content">
						
						<br>
						
								<form id="formworksheet" class="form-horizontal">
										
										<INPUT TYPE="hidden" NAME="idactivity" value='<?php echo $id;?>' id='idactivity'>
										<INPUT TYPE="hidden" NAME="unit" value='<?php echo $this->session->userdata('id');?>' id='unit'>
										<div class="control-group">											
											<label class="control-label" for="username">Input</label>
											<div class="controls">
												<textarea class='span6' id="<?php echo "input".str_replace(".","dot",$id);?>" name="input<?php echo $id;?>"></textarea>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="firstname">Output</label>
											<div class="controls">
												<textarea class='span6' id="<?php echo "output".str_replace(".","dot",$id);?>" name="output<?php echo $id;?>"></textarea>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="lastname">Perf. Indicator</label>
											<div class="controls">
												<textarea class='span6' id="<?php echo "pi".str_replace(".","dot",$id);?>" name="pi<?php echo $id;?>"></textarea>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="lastname">Sistem Tata Kerja</label>
											<div class="controls">
												<textarea class='span6' id="<?php echo "stk".str_replace(".","dot",$id);?>" name="stk<?php echo $id;?>"></textarea>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="email">Aplikasi Pendukung</label>
											<div class="controls">
												<textarea class='span6' id="<?php echo "aplikasi".str_replace(".","dot",$id);?>" name="app<?php echo $id;?>"></textarea>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<br /><br />

										<div class="control-group">											
											<label class="control-label" for="password1">Responsible (R)</label>
											<div class="controls">
												<div id="s2id_e9" style='display:none;' class="select2-container select2-container-multi populate select2-dropdown-open select2-drop-above span6" name='responsible-ul-<?php echo str_replace(".","dot",$id);?>'>
													<ul style='display:hidden;' class="select2-choices">
														<li class="select2-search-field"></li>
													</ul>
												</div>
												<select id ="e9" class="span6 populate select2-offscreen" name="e9" multiple="" tabindex="-1">
													<?php
														foreach($daftarjabatan as $valjab){
															echo "<option value='".$valjab->id."'>".$valjab->namajab."</option>";
														}
													?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										<div class="control-group">											
											<label class="control-label" for="password1">Approval (A)</label>
											<div class="controls">
												<div id="s2id_e10" style='display:none;' class="select2-container select2-container-multi populate select2-dropdown-open select2-drop-above span6" name='approval-ul-<?php echo str_replace(".","dot",$id);?>'>
													<ul style='display:hidden;' class="select2-choices">
														<li class="select2-search-field"></li>
													</ul>
												</div>
												<select id ="e10" class="span6 populate select2-offscreen" name="e10" multiple="" tabindex="-1">
													<?php
														foreach($daftarjabatan as $valjab){
															echo "<option value='".$valjab->id."'>".$valjab->namajab."</option>";
														}
													?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label" for="password1">Support (S)</label>
											<div class="controls">
												<div id="s2id_e11" style='display:none;' class="select2-container select2-container-multi populate select2-dropdown-open select2-drop-above span6" name='support-ul-<?php echo str_replace(".","dot",$id);?>'>
													<ul style='display:hidden;' class="select2-choices">
														<li class="select2-search-field"></li>
													</ul>
												</div>
												<select id ="e11" class="span6 populate select2-offscreen" name="e11" multiple="" tabindex="-1">
													<?php
														foreach($daftarjabatan as $valjab){
															echo "<option value='".$valjab->id."'>".$valjab->namajab."</option>";
														}
													?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label" for="password1">Consult (C)</label>
											<div class="controls">
												<div id="s2id_e12" style='display:none;' class="select2-container select2-container-multi populate select2-dropdown-open select2-drop-above span6" name='consult-ul-<?php echo str_replace(".","dot",$id);?>'>
													<ul style='display:hidden;' class="select2-choices">
														<li class="select2-search-field"></li>
													</ul>
												</div>
												<select id ="e12" class="span6 populate select2-offscreen" name="e12" multiple="" tabindex="-1">
													<?php
														foreach($daftarjabatan as $valjab){
															echo "<option value='".$valjab->id."'>".$valjab->namajab."</option>";
														}
													?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->

										<div class="control-group">											
											<label class="control-label" for="password1">Informed (I)</label>
											<div class="controls">
												<div id="s2id_e13" style='display:none;' class="select2-container select2-container-multi populate select2-dropdown-open select2-drop-above span6" name='informed-ul-<?php echo str_replace(".","dot",$id);?>'>
													<ul style='display:hidden;' class="select2-choices">
														<li class="select2-search-field"></li>
													</ul>
												</div>
												<select id ="e13" class="span6 populate select2-offscreen" name="e13" multiple="" tabindex="-1">
													<?php
														foreach($daftarjabatan as $valjab){
															echo "<option value='".$valjab->id."'>".$valjab->namajab."</option>";
														}
													?>
												</select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->


										 <br />
										
											
										<div class="form-actions">
											<button type="button" class="btn btn-primary" id='simpanws'>Save</button> 
											<button type="button" style='visibility:hidden' class="btn btn-primary" id='updatews'>Update</button> 
											<button class="btn" id='cancelws'>Back</button>
										</div> <!-- /form-actions -->
								</form>
								
				
						
						
						
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->