  <div class="main-inner">
    <div class="container">
      <div class="row">
	  
			<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-pushpin"></i>
						<h3><?php print_r(strtoupper($listunitByGroup[0]->groupname));?></h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						<ol class="faq-list">
							
							<?php
								$num=0;
								foreach($listunitByGroup as $value){
									$num++;
									echo"<li id='faq-".$num."'>";
										echo "<div class='faq-icon'><div class='faq-number'>".$num."</div></div>";
											echo "<div class='faq-text'><h4><a href='".base_url()."BPF_corecontrol/BPF_admin/checkunit/idunit/".$value->idunit."' class='unit'>".$value->namaunit."</a></h4></div>";
									echo "</li>";
								}
							?>
							
							
							
						</ol>
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
				
		    </div> <!-- /spa12 -->

			</div>
		</div>
	</div>