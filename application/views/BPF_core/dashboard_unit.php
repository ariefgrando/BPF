  <div class="main-inner">
    <div class="container">
      <div class="row">

		<div class="span12">
			<div class="widget">
				<div class="widget-header"> <i class="icon-info-sign"></i>
				  <h3>Info Admin</h3>
				</div>
				<!-- /widget-header -->
				<div class="widget-content">
				  <ul class="messages_layout" id='infoadminbaru' style='display:table;'>
				  <?php
					$tanggal = date('d-m-Y');
					foreach($infoadmin as $value){

						

						//echo ((strtotime($tanggal)." < ".strtotime($value->type)));
						

						if($value->type=="9999-12-31"){

							echo "<li class='' style='display: table-cell; width: 100%; '>";
							  echo "<div class='message_wrap'> <span class='arrow'></span>";
								echo "<div class='info'> <a class='name'>".$value->topik."</a> <span class='time'>".$value->waktu."</span> &nbsp;&nbsp;";
								
							

								echo "</div>";
								echo "<div class='text'>".$value->pesan."</div>";
							  echo "</div>";
							echo "</li>";

						}else{

							//echo strtotime($tanggal)." < ".strtotime($value->type);

							if (strtotime($value->type) < strtotime($tanggal)){

							}else{

							echo "<li class='' style='display: table-cell; width: 100%; '>";
							  echo "<div class='message_wrap'> <span class='arrow'></span>";
								echo "<div class='info'> <a class='name'>".$value->topik."</a> <span class='time'>".$value->waktu."</span> &nbsp;&nbsp;";
								
								
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='' style='float:right; font-size:11px; font-style:italic;'><i class='icon-pushpin'></i>&nbsp;&nbsp;informasi ini tayang sampai ".$value->type."</span>";
								

								echo "</div>";
								echo "<div class='text'>".$value->pesan."</div>";
							  echo "</div>";
							echo "</li>";

							}

						}

					}
				  ?>
				  </ul>
				</div>
				<!-- /widget-content --> 
			</div>
			<!-- /widget --> 
        </div>

        <div class="span6">
          <!-- div class="widget widget-nopad">

            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Jadwal</h3>
            </div>
            <div class="widget-content">
              <div id='calendar'>

              </div>
            </div>
          </div -->
       </div>
        <!-- /span6 -->





<!--  
<div class="span6">
	<div class="widget">
		<div class="widget-header"> <i class="icon-bookmark"></i>
		  <h3>Live Chat</h3>
		</div>
		<div class="widget-content">
			<ul class="messages_layout">
				<li class="from_user left"> 
					<a href="#" class="avatar">
						<img src="img/message_avatar1.png"/>
					</a>
					<div class="message_wrap"> 
						<span class="arrow"></span>
						<div class="info"> 
							<a class="name">Administrator</a> 
							<span class="time">1 hour ago</span>
							<div class="options_arrow">
								<div class="dropdown pull-right"> 
									<a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> 
										<i class=" icon-caret-down"></i> 
									</a>
									<ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
										<li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
										<!-- li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
										<li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li --><!--
									</ul>
								</div>
							</div>
						</div>
						<div class="text"> Hello, Ini adalah pesan pertama dari Administrator </div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
-->
	
	
	
	</div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 


