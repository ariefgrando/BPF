  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">



		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>
				<?php
					foreach($kategori as $itemcat){
						echo $itemcat->process_name;
						break;
					}
				?>

			  </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> ID </th>
                    <th> Process_Category</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
				<?php
					foreach($kategori as $itemcat){
				?>
						  <tr>
							<td><?php echo $itemcat->id;?></td>
							<td><?php echo nl2br($itemcat->process_category);?><span id='status-<?php echo str_replace(".","dot",$itemcat->id);?>' style='font-color:#FF0033; font-size:9px; font-style:italic;'></span></td>
							<td class="td-actions">
								<a href="<?php echo base_url()."BPF_corecontrol/BPF_worksheet/getsubcategory/idsubframe/".$itemcat->id;?>" class="btn btn-small btn-success" id='show-<?php echo str_replace(".","dot",$itemcat->id);?>'>Show Child</a>
								<a href="<?php echo base_url()."BPF_corecontrol/BPF_worksheet/formworksheet/id/".$itemcat->id;?>" class="btn btn-info btn-small" id='entry-<?php echo str_replace(".","dot",$itemcat->id);?>'>Entry</a>
								
							</td>
						  </tr>
						
				<?php
					}
				?>
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>




        </div>
		<!-- span12 -->
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 

