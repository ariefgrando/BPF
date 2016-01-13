  <div class="main-inner" ng-app="Wall">
    <div class="container">
      <div class="row" ng-controller="WallController">
	  
			<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-pushpin"></i>
						<h3>Informasi</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						<ol class="faq-list">
							
							<?php
									echo"<li id='faq-1'>";
										echo "<div class='faq-icon'><div class='faq-number'>1</div></div>";
											echo "<div class='faq-text'><h4><a href='".base_url()."BPF_corecontrol/BPF_admin_menu/showFormInfo' class='unit'>Upload Informasi ke Halaman Depan User</a></h4></div>";
									echo "</li>";
									echo"<li id='faq-1'>";
										echo "<div class='faq-icon'><div class='faq-number'>2</div></div>";
											echo "<div class='faq-text'><h4><a href='' class='unit' ng-click=\"loadGroups()\" >Daftar Informasi yang Berhasil di-Upload</a></h4></div>";
									echo "</li>";							
							?>
							
						</ol>
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
				
		    </div> <!-- /spa12 -->


			<div class="span12">

				<div class="widget">
					<div class="widget-content">
						<table class="table table-bordered table-hover table-condensed">
							<tr style="font-weight: bold">
								<td style="width:auto">ID</td>
								<td style="width:auto">Topik</td>
								<td style="width:auto">Informasi</td>
								<td style="width:auto">Expired</td>
								<td style="width:auto">Waktu Upload</td>
							</tr>
							<tr ng-repeat="iteminfo in group">
								<td>	
										{{ iteminfo.id || 'not set' }}
								</td>
								<td>
									<span editable-textarea="iteminfo.topik" e-rows="7" e-cols="40" e-name="topik" e-form="rowform" e-required>	
										{{ iteminfo.topik }}
									</span>
								</td>	
								<td>	
									<span editable-textarea="iteminfo.pesan" e-rows="7" e-cols="140" e-name="pesan" e-form="rowform" e-required>
										{{ iteminfo.pesan }}
									</span>
								</td>
								<td>	
									<span editable-text="iteminfo.type" e-name="type" e-form="rowform" e-required>
										{{ iteminfo.type || 'not set' }}
									</span>
								</td>
								<td>	
										{{ iteminfo.waktu || 'not set' }}
								</td>
								<td>

									<form editable-form name="rowform" onbeforesave="saveUser($data, iteminfo.id)" ng-show="rowform.$visible" class="form-buttons form-inline">
									  <button type="submit" ng-disabled="rowform.$waiting" class="btn btn-primary">
										<i class="icon-save"></i>
									  </button>
									  <button type="button" ng-disabled="rowform.$waiting" ng-click="rowform.$cancel()" class="btn btn-default">
										<i class="icon-undo"></i>
									  </button>
									</form>									
									
									<div class="buttons" ng-show="!rowform.$visible">
									  <button class="btn btn-primary" ng-click="rowform.$show()"><i class="icon-edit"></i></button>
									  <button class="btn btn-danger" ng-really-message="Anda yakin ingin menghapus data ini ?" ng-really-click="removeUser($index, iteminfo.id)"><i class="icon-remove-sign"></i></button>
									</div>							
								</td>
							</tr>
						</table>
					</div>
				</div>
		    </div> <!-- /spa12 -->




			</div>
		</div>
	</div>