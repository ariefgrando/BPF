  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">



		<div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>
				<?php
					foreach($subsubkategori as $itemcat){
						echo $itemcat->process_group;
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
                    <th> Process_Group</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
				<?php
					foreach($subsubkategori as $itemcat){
				?>
						  <tr>
							<td><?php echo $itemcat->id;?></td>
							<td><?php echo nl2br($itemcat->Process);?><span id='status-<?php echo str_replace(".","dot",$itemcat->id);?>' style='font-color:#FF0033; font-size:9px; font-style:italic;'></span></td>
							<td class="td-actions">
								<a href="<?php echo base_url()."BPF_corecontrol/BPF_worksheet/getactivity/idactivity/".$itemcat->id;?>" class="btn btn-small btn-success">Show Child</a>
								<a href="<?php echo base_url()."BPF_corecontrol/BPF_worksheet/formworksheet/id/".$itemcat->id;?>" class="btn btn-info btn-small" id='entry-<?php echo str_replace(".","dot",$itemcat->id);?>'>Entry</a>
								<!--a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a>
								<a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a-->
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

