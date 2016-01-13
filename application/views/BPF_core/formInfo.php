  <div class="main-inner">
    <div class="container">
      <div class="row">
	  
			<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-pushpin"></i>
						<h3>Broadcasting Information</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					  <ul class="infoform_layout">
						
						<li>
						  <div class='message_wrap'> <span class='arrow'></span>
							<div class='info'> <a class='name'>Waktu Broadcast</a></div>
							<div class='text' id='timeMsg'>
								
							</div>
						  </div>
						</li>
						<li>
						  <div class='message_wrap'> <span class='arrow'></span>
							<div class='info'> <a class='name'>Topik</a></div>
							<div class='text'>
								<input type="text" NAME="" id="topik" class='span10' value="">
							</div>
						  </div>
						</li>
						<li>
						  <div class='message_wrap'> <span class='arrow'></span>
							<div class='info'> <a class='name'>Informasi</a></div>
							<div class='text'>
								<TEXTAREA NAME="" ROWS="" COLS="" class='span10' id='informasi'></TEXTAREA>
							</div>
						  </div>
						</li>
						<li>
						  <div class='message_wrap'> <span class='arrow'></span>
							<div class='info'> <a class='name'>Batas Waktu Tampil</a></div>
							<div class='text' width='100%'>
							  <div class="input-append date" id="dp3" data-date="" data-date-format="yyyy-mm-dd">
								<input class="span2" size="16" type="text" value="" style='float:left;' id='bataswaktu'>
								<span class="add-on" style='float:left;'><i class="icon-calendar"></i></span><button class="btn btn-primary" id='broadcasting'>Broadcast</button>&nbsp;&nbsp;&nbsp;&nbsp;
							  </div>
							 </div><br><button class="btn btn-danger" id='cancelbroadcasting'><i class="icon-step-backward "></i> Kembali</button>
						    </div>
						</li>
						<li>
						  <div class='message_wrap'> <span class='arrow'></span>
							<div class='info'> <a class='name'></a></div>
							<div class='text'>
								
							</div>
						  </div>
						</li>

					  </ul>
					</div>
						
				</div> <!-- /widget -->	
				
		    </div> <!-- /spa12 -->

			</div>
		</div>
	</div>
	<script>
			var liveClock = function(servertime) {
            var currDateTime = new Date();
            var addLeadingZero = function(s) {
                return (s<10)?('0'+s):s;    
            };
            var formattedDate = function(date) {
                var h = date.getHours(), hour = (h<1)?(h+1):((h>12)?(h-12):h), a = (h<12)?'am':'pm';
                return "<div class='faq-icon'><div class='faq-number' style='float:left; background-color:#3366FF;' id='tglx'>"+date.getDate()+"</div>"+"<div class='faq-number' style='float:left; background-color:#3333FF;' id='blnx'>"+(date.getMonth()+1)+"</div>"+"<div class='faq-number' style='float:left; background-color:#3300FF;' id='thnx'>"+date.getFullYear().toString().substr(2,2)+"</div>"+"<div class='faq-number' style='float:left;' id='jamx'>"+hour+"</div>"+"<div class='faq-number' style='float:left;' id='minx'>"+addLeadingZero(date.getMinutes())+"</div>"+"<div class='faq-number' style='float:left;' id='secx'>"+addLeadingZero(date.getSeconds())+"</div>"+"<div class='faq-number' style='float:left; background-color:red;'>"+a+"</div></div>";    
            };
            var setDateTime = function() {
                currDateTime.setSeconds(currDateTime.getSeconds()+1);
                $('#timeMsg').html(formattedDate(currDateTime));
                return false;    
            };
            var everySec = setInterval(setDateTime, 1000);
        };
	liveClock();
	</script>