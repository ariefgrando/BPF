<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Business Process Framework - PT PLN (Persero)</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo base_url();?>public/support_mainpage/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/support_mainpage/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/support_mainpage/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/support_mainpage/css/select2.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/support_mainpage/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/support_mainpage/css/pages/dashboard.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/support_mainpage/css/pages/faq.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/support_mainpage/css/nanoscroller.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/support_mainpage/css/datepicker.css" rel="stylesheet">
<link href="<?php echo base_url();?>public/support_mainpage/css/xeditable.css" rel="stylesheet">
<!-- link href="<?php echo base_url();?>public/support_mainpage/css/dataTables.bootstrap.css" rel="stylesheet" -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Business Process Framework </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">

		
		<?php
		//echo "Nilai session ".$this->session->userdata('admin');
		if($this->session->userdata('admin')=="YES"){
		}else{
		?>
		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-link"></i> Link <b class="caret"></b></a>
            <ul class="dropdown-menu">
				<li><a href="http://10.1.18.41/~simkpnas" target="blank"><i class="icon-list"></i> &nbsp;&nbsp;SIMKPNAS</a></li>
				<li><a href="https://10.10.0.25/portal/" target="blank"><i class="icon-bookmark-empty"></i> &nbsp;&nbsp;Corporate University</a></li>
            </ul>
          </li>
		<?php
		}	
		?>

          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo ucwords(strtolower($this->session->userdata('namaunit')));?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;"><i class="icon-wrench"></i> &nbsp;&nbsp;Account Setting</a></li>
              <!--li><a href="<?php echo base_url();?>BPF_corecontrol/BPF_authcontrol/logout"><i class="icon-off"></i> &nbsp;&nbsp;Log Out</a></li-->
              <li><a href="#" id='disc'><i class="icon-off"></i> &nbsp;&nbsp;Log Out</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
		  <INPUT TYPE="hidden" NAME="idunit" id="idunit" value="<?php echo $this->session->userdata('id');?>">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="<?php echo base_url();?>"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>



		<?php
		//echo "Nilai session ".$this->session->userdata('admin');
		if($this->session->userdata('admin')=="YES"){
		?>
			<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-ol"></i><span>Daftar Unit</span> <b class="caret"></b></a>
			  <?php
				
				echo "<ul class='dropdown-menu' id='listunit'>";
				//foreach($kelompokunit as $itemunit){
				//	echo "<li><a href='test'>".strtoupper($itemunit->groupname)."</a></li>";
				//}
				echo "</ul>";

			  ?>
			</li>
			<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Tools</span> </a> 
				<ul class='dropdown-menu' id='#'>
					<li><a href='<?php echo base_url()?>BPF_corecontrol/BPF_admin/listuser'><i class="shortcut-icon icon-user"></i>&nbsp;&nbsp;&nbsp;Daftar Pengguna</a></li>
					<li><a href=''><i class="shortcut-icon icon-list-alt"></i>&nbsp;&nbsp;&nbsp;Jadwal</a></li>
					<li><a href=''><i class="shortcut-icon icon-comment"></i>&nbsp;&nbsp;&nbsp;Komunikasi</a></li>
					<li><a href='<?php echo base_url();?>BPF_corecontrol/BPF_admin_menu/infoSubMenu'><i class="shortcut-icon icon-info-sign"></i>&nbsp;&nbsp;&nbsp;Informasi</a></li>
					<li><a href='<?php echo base_url();?>BPF_corecontrol/BPF_admin_menu/showFormInfo'><i class="shortcut-icon icon-wrench"></i>&nbsp;&nbsp;&nbsp;System Settings</a></li>
				</ul>
			</li>
		<?php
		}else{
		?>


			<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Kertas Kerja</span> </a> 
			<?php

				//print_r($framework);
				echo "<ul class='dropdown-menu' id='menukategoriutama'>";
				//foreach($framework as $itemproses){
				//	echo "<li><a href='".base_url()."BPF_corecontrol/BPF_worksheet/getcategory/idframe/".$itemproses->id."'>".$itemproses->process_name."</a></li>";
				//}
				echo "</ul>";

			?>
			</li>
			<!-- li><a href="<?php echo base_url()?>BPF_corecontrol/BPF_reporting/getmasterreport"><i class="icon-book"></i><span>Laporan</span> </a></li -->
			<li id='showlaporan'><a href="#"><i class="icon-book"></i><span>Laporan</span> </a></li>
			<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-list-alt"></i><span>Tools</span> </a> 
				<ul class="dropdown-menu">
					<li><a href="#feedback"><i class="icon-comment"></i> &nbsp;&nbsp;Feedback</a></li>
					<li><a href="#team"><i class="icon-user"></i> &nbsp;&nbsp;Bantuan</a></li>
					<li><a href="#footer"><i class="icon-phone"></i> &nbsp;&nbsp;Contacts</a></li>
				</ul>
			</li>
		<?php
		}
		?>


      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->


<div class="main">

<?php echo $body; ?>

</div>
<!-- /main -->




<div class="extra" id='divextra'>
  <div class="extra-inner">
    <div class="container">
      <div class="row">
                    <div class="span3">
                        <h4>
                            PT PLN (Persero)</h4>
                        <ul>
                            <li><a href="javascript:;">Jl. Trunojoyo Blok M I - 135 Jakarta 12160</a></li>
                            <li><a href="javascript:;">Tel. (021) 7261875, 7261122, 7262234, 7251234</a></li>
                            <li><a href="javascript:;">Fax. (021) 7221330, 7397150</a></li>
                            <li><a href="javascript:;">Home page : www.pln.co.id</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Support</h4>
                        <ul>
                            <li><a href="javascript:;">Frequently Asked Questions</a></li>
                            <li><a href="javascript:;">Ask a Question</a></li>
                            <li><a href="javascript:;">Video Tutorial</a></li>
                            <li><a href="javascript:;">Feedback</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Something Legal</h4>
                        <ul>
                            <li><a href="javascript:;">Read License</a></li>
                            <li><a href="javascript:;">Terms of Use</a></li>
                            <li><a href="javascript:;">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <div class="span3">
                        <h4>
                            Knowledge Officer</h4>
                        <ul>
                            <li><a href="http://www.egrappler.com">Mr. A</a></li>
                            <li><a href="http://www.egrappler.com;">Mr. B</a></li>
                            <li><a href="http://www.egrappler.com;">Mr. C</a></li>
                            <li><a href="http://www.egrappler.com;">Mr. D</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /extra-inner --> 
</div>
<!-- /extra -->
<div id="employees">

</div>

<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span9"> &copy; 2014 - PT PLN (Persero)</div>
		<div class="span3">
			<div class="extra2" style='float:right; cursor:pointer;'>
		<a style='color:#fff;' class="" data-toggle="collapse" data-target=".nav-collapse" id='showlegal'><i id='direction'></i></a>
	</div>

		</span>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="http://10.16.107.77:3000/socket.io/socket.io.js"></script>
<script src="<?php echo base_url();?>public/support_mainpage/js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/angular.min.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/xeditable.min.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/ui-bootstrap-tpls.min.js"></script> 
<!-- script src="<?php echo base_url();?>public/support_mainpage/js/jquery.dataTables.min.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/datatable_controller.js"></script --> 
<script src="<?php echo base_url();?>public/support_mainpage/js/jquery.nanoscroller.min.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/jquery.blockUI-min.js"></script>
<script src="<?php echo base_url();?>public/support_mainpage/js/excanvas.min.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/chart.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>public/support_mainpage/js/full-calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>public/support_mainpage/js/select2.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/base.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/socket_related.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/bootstrap-datepicker.js"></script> 

 
<script>     



        $(document).ready(function() {

			//$('#daftaradmin').dataTable();

			$('#dp3').datepicker();

			$("#e9").select2({
				closeOnSelect:false
			});
			$("#e10").select2({
				closeOnSelect:false
			});
			$("#e11").select2({
				closeOnSelect:false
			});
			$("#e12").select2({
				closeOnSelect:false
			});
			$("#e13").select2({
				closeOnSelect:false
			});


			$("#direction").addClass("icon-circle-arrow-up");
			 
			$("#showlegal").click(function(){
				var container = $( "#divextra" );
				//alert(container.is( ":visible" ));
				
				 if (container.is( ":visible" )){
					 $("#divextra").slideToggle("slow");
					$("#direction").removeClass("icon-circle-arrow-down");
					$("#direction").addClass("icon-circle-arrow-up");
				 }else{
					 $("#divextra").slideToggle("slow");
					$("#direction").removeClass("icon-circle-arrow-up");
					$("#direction").addClass("icon-circle-arrow-down");
				 }
			
			});

		});

/*
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event xx',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }
          ]
        });
      });
*/
/*
$(document).ready(function() {
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	var AKSIevent =  window.location.href.split(window.location.pathname)[0]+"/bpf-v2/BPF_corecontrol/BPF_admin/listevents";
	var AKSIADDevent =  window.location.href.split(window.location.pathname)[0]+"/bpf-v2/BPF_corecontrol/BPF_admin/addevents";

	$('#calendar').fullCalendar({
		editable: true,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},   
		//events: "http://localhost/calender/events.php",
		events: AKSIevent,
		// Convert the allDay from string to boolean
		eventRender: function(event, element, view) {   
			if (event.allDay === 'true') {
				event.allDay = true;
			} else {
				event.allDay = false;
			}
		},
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
			var title = prompt('Event Title:');
			var url = prompt('Type Event url, if exits:');
			if (title) {
				start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
				end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
				$.ajax({
					//url: 'http://localhost/calender/add_events.php',
					url: AKSIADDevent,
					data: 'title='+ title+'&start='+ start +'&end='+ end +'&url='+ url ,
					type: "POST",
					success: function(json) {
						alert('Added Successfully');
						location.reload();
					}
				});
				calendar.fullCalendar('renderEvent',
				{
					title: title,
					start: start,
					end: end,
					allDay: allDay
				},
					true 
				);
			}
		calendar.fullCalendar('unselect');
		},

		editable: true,
		eventDrop: function(event, delta) {
			start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
			end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
			$.ajax({
				url: 'http://localhost/calender/update_events.php',
				data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
				type: "POST",
				success: function(json) {
					alert("Updated Successfully");
				}
			});
		},
		eventResize: function(event) {
			start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
			end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
			$.ajax({
				url: 'http://localhost/calender/update_events.php',
				data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
				type: "POST",
				success: function(json) {
					alert("Updated Successfully");
				}
			});
		}   
	});  
});
*/
</script><!-- /Calendar -->
</body>
</html>
