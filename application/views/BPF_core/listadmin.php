  <div class="main-inner">
    <div class="container">
      <div class="row">
	  
			<div class="span12">
	      		
				<div class="widget">
					<div class="widget-header"> 
						<i class="icon-bookmark"></i>
						<h3><span id='headerlistadmin'>LIST USER AKTIF</span></h3>
					</div>
				</div>
				<!-- /widget -->

				<div class="widget" id='submenudashboardadmin'>
					<div class="widget-content">

								<div class="widget widget-table action-table">
									<!-- /widget-header -->
									<div class="widget-content">
									  <table class="table table-striped table-bordered">
										<thead>
										  <tr>
											<th> ID </th>
											<th> User</th>
											<th> Unit</th>
											<th class="td-actions"> Action</th>
										  </tr>
										</thead>
										<tbody id='a_user'>
										  
										  <?php
											$count=0;
											foreach($listuser as $value){
												$count++;
												echo "<tr>";
												echo "<td>".$value->idunit."</td>";
												echo "<td>".$value->username."</td>";
												echo "<td>".$value->namaunit."</td>";
												echo "<td><a href='".base_url()."BPF_corecontrol/BPF_admin/formedituser/idUnit/".$value->idunit."' class='btn btn-danger btn-small'><i class='btn-icon-only icon-pencil'></i></a></td>";
												echo "</tr>";
											}
										  ?>
										
										</tbody>
									  </table>
									</div>
									<!-- /widget-content --> 
								</div>

					</div>

				</div>


						
			</div>
					<!-- /widget-content --> 
		</div>
				<!-- /widget -->

				<!-- div class="widget">
					<div class="widget-header"> 
						<i class="icon-bookmark"></i>
						<h3><span id='reportworksheet'></span></h3>
					</div>
					<div class="widget-content" id='reportplace'>
						
					</div>
				</div-->

				
		    </div> 
			<!-- /spa12 -->

		</div>
</div>