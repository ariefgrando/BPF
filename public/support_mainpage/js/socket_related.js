
$(document).ready(function() {

	

	String.prototype.nl2br = function()
	{
		return this.replace(/\n/g, "<br />");
	}

	var socket  = io.connect('http://10.16.107.77:3000');
	
	socket.on('create', function (data) {
		socket.emit('check_in', {iduser : $('#idunit').val(), urlnow : window.location.pathname});
	});	

	// Disconnect socket
	socket.on('disconnect',function() {
		socket.emit('check_out', {iduser : $('#idunit').val(), urlnow : window.location.pathname});
	});

	socket.on('BYE',function(data) {
		//alert("User "+data+" has leave the System !");
	});

	socket.on('SEE_YA',function(data) {
		alert("Good Bye !");
		window.location = window.location.protocol + "//" + window.location.host + "/bpf-v2/"+"BPF_corecontrol/BPF_authcontrol/logout"
	});

	// Connecting clients
	socket.on('connecting_clients', function(data) {
		var listunit_connected = "";
		
		var unitname="";
		 $.each(data, function() {
			 unitname = this['namaunit'];
			 listunit_connected+="<li><div class='news-item-detail'><a href='#' class='news-item-title' target='_blank'>"+this['namaunit']+"</a></div></li>";
		 });
		 
		 if($( "#lifec li" ).size()==0){
			$('#lifec').prepend(listunit_connected);
		 }else{
			 var find=0;
			$( "#lifec li" ).each(function(  ) {
				if($(this).text().trim() === unitname.trim()){
					find=0;
					return false;
				}else{
					find++;
				}
			});

			if(find>0){
				$('#lifec').prepend(listunit_connected);
				find=0;
			}
		 }
		 



	});

	// Log Out
	$("#disc").click(function(){
		socket.emit('check_out', {iduser : $('#idunit').val(), urlnow : window.location.pathname});
	});
	
	var lang = '';
	var unit = '';

	socket.emit('currentURI', {urlnow : window.location.pathname, unit: $('#idunit').val()});


	// Menu kategori utama
	socket.on('framework', function (data) {
		  $.each(data, function() {
			  lang += "<li><a href='"+window.location.protocol + "//" + window.location.host + "/bpf-v2/"+"BPF_corecontrol/BPF_worksheet/getcategory/idframe/"+this['id']+"'>"+this['process_name']+"</a></li>";
		  });
		  $("#menukategoriutama").append(lang);
	});


	/* System Log in Admin Dashboard
	socket.on('system_log_to_admin', function(data){

		console.log(data);
			var li="";
		  $.each(data, function() {
			  var waktu = this['waktu'].split(' ');
			  var tgl = this['waktu'].split('/');
			  li += "<li><div class='news-item-date'> <span class='news-item-day'>"+tgl[0]+"/"+tgl[1]+"</span> <span class='news-item-month'>"+waktu[1]+"</span> </div><div class='news-item-detail'> <a href='#' class='news-item-title'>"+this['topik']+"</a><p class='news-item-preview'>"+this['message']+"</p></div></li>";
		  });
		  $("ul.news-items").prepend(li);

	});
	*/

	// Aktivitas yang sudah di entry
	socket.on('activity_done', function (data) {
		$.each(data, function(){
			
			$("#status-"+data.replace(/\./g, "dot")).html("&nbsp;&nbsp;&nbsp;<img src="+ window.location.protocol +"//" + window.location.host + "/bpf-v2/public/support_mainpage/img/icon_done.gif>");

			$("#entry-"+data.replace(/\./g, "dot")).html("update");
		});
	});

	// Lihat hasil Activitas yang sudah di entry
	socket.on('show_activity', function (data) {
		console.log("Nilai data " + data);
		if(data.length==0){
			$("#simpanws").css({"visibility":"visible"});
			$("#updatews").css({"display":"none"});
		}else{
			$("#simpanws").css({"display":"none"});
			$("#updatews").css({"visibility":"visible"});
		}

		$.each(data, function(){
			
			console.log(this['input']);
			$("#input"+this['id_activity'].replace(/\./g, "dot")).text(this['input']);
			$("#output"+this['id_activity'].replace(/\./g, "dot")).text(this['output']);
			$("#pi"+this['id_activity'].replace(/\./g, "dot")).text(this['pi']);
			$("#stk"+this['id_activity'].replace(/\./g, "dot")).text(this['stk']);
			$("#aplikasi"+this['id_activity'].replace(/\./g, "dot")).text(this['aplikasi']);


			// RESPONSIBLE ############################################################################
			var arrRes = this['responsible'].split(',');
			var preload_data = [];
			for(r=0; r<=arrRes.length; r++){
				if(arrRes[r]==undefined){

				}else{
					preload_data.push({
						id : r,
						text : arrRes[r].trim()
					});
				}
			}
			console.log(preload_data);
			$("#e9").select2('data',preload_data);

			// APPROVAL ##############################################################################
			var arrApr = this['approval'].split(',');
			var preload_data_app = [];
			for(r=0; r<=arrApr.length; r++){
				if(arrApr[r]==undefined){

				}else{
					preload_data_app.push({
						id : r,
						text : arrApr[r].trim()
					});
				}
			}
			console.log(preload_data_app);
			$("#e10").select2('data',preload_data_app);

			// SUPPORT ###############################################################################
			var arrSup = this['support'].split(',');
			var preload_data_sup = [];
			for(r=0; r<=arrSup.length; r++){
				if(arrSup[r]==undefined){

				}else{
					preload_data_sup.push({
						id : r,
						text : arrSup[r].trim()
					});
				}
			}
			console.log(preload_data_sup);
			$("#e11").select2('data',preload_data_sup);

			// CONSULT ###############################################################################
			var arrCon = this['consult'].split(',');
			var preload_data_con = [];
			for(r=0; r<=arrCon.length; r++){
				if(arrCon[r]==undefined){

				}else{
					preload_data_con.push({
						id : r,
						text : arrCon[r].trim()
					});
				}
			}
			console.log(preload_data_con);
			$("#e12").select2('data',preload_data_con);

			// INFORMED ###############################################################################
			var arrInf = this['informed'].split(',');
			var preload_data_inf = [];
			for(r=0; r<=arrInf.length; r++){
				if(arrInf[r]==undefined){

				}else{
					preload_data_inf.push({
						id : r,
						text : arrInf[r].trim()
					});
				}
			}
			console.log(preload_data_inf);
			$("#e13").select2('data',preload_data_inf);

		});
	});

	// Kelompok Unit
	socket.on('populateunit', function (data) {
		  $.each(data, function() {
			  unit += "<li><a href='"+window.location.protocol + "//" + window.location.host + "/bpf-v2/"+"BPF_corecontrol/BPF_admin/getdetil_unit/idkelunit/"+this['id']+"'>"+this['groupname'].toUpperCase()+"</a></li>";
		  });
		  $("#listunit").append(unit);
	});
	
	socket.on('namaunit_untukadmin', function (data){
		  $.each(data, function() {
			  $("#namaunituntukdashboardAdmin").html(this['namaunit']);
			  $("#submenudashboardadmin").hide();
		  });
	});

	socket.on('category_from_server', function (data){
			console.log(data);
			var PG_Table=""
			var state="";
			$.each(data, function() {
				if(this['status']!=null){
					state="<a href='"+window.location.protocol + "//"+ window.location.host +"/bpf-v2/BPF_corecontrol/BPF_worksheet/formworksheet/id/"+this['id']+"/"+this['unit']+"' class='btn btn-small btn-success'><i class='btn-icon-only icon-ok'> </i></a>";
				}else{
					state="<a href='javascript:;' class='btn btn-danger btn-small'><i class='btn-icon-only icon-remove'></i></a>";
				}
			  PG_Table+="<tr><td>"+this['id']+"</td><td>"+this['APQC_id']+"</td><td>"+this['process_category'].nl2br()+"</td><td class='td-actions'>"+state+"</td></tr>";
			  
			});
			
			$("#stateofcompleted-category").html("");
			$("#cat_unit").html("");
			
			$("#cat_unit").append(PG_Table);
			$("#stateofcompleted-category").html("&nbsp;&nbsp;Completed "+$("#cat_unit i[class='btn-icon-only icon-ok']").size()+" of "+$("#cat_unit").children().size());
	});

	socket.on('process_group_from_server', function (data){
			console.log(data);
			var PG_Table=""
			var state="";
			$.each(data, function() {
				if(this['status']!=null){
					state="<a href='"+window.location.protocol + "//"+ window.location.host +"/bpf-v2/BPF_corecontrol/BPF_worksheet/formworksheet/id/"+this['id']+"/"+this['unit']+"' class='btn btn-small btn-success'><i class='btn-icon-only icon-ok'> </i></a>";
				}else{
					state="<a href='javascript:;' class='btn btn-danger btn-small'><i class='btn-icon-only icon-remove'></i></a>";
				}
			  PG_Table+="<tr><td>"+this['id']+"</td><td>"+this['APQC_id']+"</td><td>"+this['process_group'].nl2br()+"</td><td class='td-actions'>"+state+"</td></tr>";
			  
			});

			$("#stateofcompleted-category").html("");
			$("#p_group_unit").html("");
			$("#p_group_unit").append(PG_Table);
			$("#stateofcompleted-category").html("&nbsp;&nbsp;Completed "+$("#p_group_unit i[class='btn-icon-only icon-ok']").size()+" of "+$("#p_group_unit").children().size());
	});

	socket.on('process_from_server', function (data){
			console.log(data);
			var PG_Table=""
			var state="";
			$.each(data, function() {
				if(this['status']!=null){
					state="<a href='"+window.location.protocol + "//"+ window.location.host +"/bpf-v2/BPF_corecontrol/BPF_worksheet/formworksheet/id/"+this['id']+"/"+this['unit']+"' class='btn btn-small btn-success'><i class='btn-icon-only icon-ok'> </i></a>";
				}else{
					state="<a href='javascript:;' class='btn btn-danger btn-small'><i class='btn-icon-only icon-remove'></i></a>";
				}
			  PG_Table+="<tr><td>"+this['id']+"</td><td>"+this['APQC_id']+"</td><td>"+this['Process'].nl2br()+"</td><td class='td-actions'>"+state+"</td></tr>";
			  
			});

			$("#stateofcompleted-category").html("");
			$("#p_unit").html("");
			$("#p_unit").append(PG_Table);
			$("#stateofcompleted-category").html("&nbsp;&nbsp;Completed "+$("#p_unit i[class='btn-icon-only icon-ok']").size()+" of "+$("#p_unit").children().size());
	});

	socket.on('activity_from_server', function (data){
			console.log(data);
			var PG_Table=""
			var state="";
			$.each(data, function() {
				if(this['status']!=null){
					state="<a href='"+window.location.protocol + "//"+ window.location.host +"/bpf-v2/BPF_corecontrol/BPF_worksheet/formworksheet/id/"+this['id']+"/"+this['unit']+"' class='btn btn-small btn-success'><i class='btn-icon-only icon-ok'> </i></a>";
				}else{
					state="<a href='javascript:;' class='btn btn-danger btn-small'><i class='btn-icon-only icon-remove'></i></a>";
				}
			  PG_Table+="<tr><td>"+this['id']+"</td><td>"+this['APQC_id']+"</td><td>"+this['activity'].nl2br()+"</td><td class='td-actions'>"+state+"</td></tr>";
			  
			});

			$("#stateofcompleted-category").html("");
			$("#a_unit").html("");
			$("#a_unit").append(PG_Table);
			$("#stateofcompleted-category").html("&nbsp;&nbsp;Completed "+$("#a_unit i[class='btn-icon-only icon-ok']").size()+" of "+$("#a_unit").children().size());
	});

	// Simpan Worksheet
	$("#simpanws").click(function(){
		var idx = $('#idactivity').val().replace(/\./g, "dot");
		var responsibleval="";
		var approvalval="";
		var supportval="";
		var consultval="";
		var informedval="";
		

			// Responsible
			$("div[name='responsible-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						responsibleval +=$(place).html();
					}else{
						responsibleval +=$(place).html()+", ";
					}
				});
			});

			// Approval
			$("div[name='approval-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						approvalval +=$(place).html();
					}else{
						approvalval +=$(place).html()+", ";
					}
				});
			});

			// Support
			$("div[name='support-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						supportval +=$(place).html();
					}else{
						supportval +=$(place).html()+", ";
					}
				});
			});

			// Consult
			$("div[name='consult-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						consultval +=$(place).html();
					}else{
						consultval +=$(place).html()+", ";
					}
				});
			});

			// Informed
			$("div[name='informed-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						informedval +=$(place).html();
					}else{
						informedval +=$(place).html()+", ";
					}
				});
			});

		
		var dNow = new Date();
		
		var data = {
			  id: $('#idactivity').val(),
			  input: $('#input'+idx).val(),
			  output: $('#output'+idx).val(),
			  pi: $('#pi'+idx).val(),
			  stk: $('#stk'+idx).val(),
			  aplikasi: $('#aplikasi'+idx).val(),
			  responsible: responsibleval, 
			  approval: approvalval, 
			  support: supportval, 
			  consult: consultval, 
			  informed: informedval, 
			  unit: $('#unit').val(), 
			  log: (dNow.getMonth()+1) + '/' + dNow.getDate() + '/' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes(),
			  status:false
		};

		console.log(idx);

		socket.emit('saveworksheet', data);
		socket.on('saveworksheet_result', function (data) {
			  alert(data);
			  parent.history.back();
		});
		
	});

	$("#cancelws").click(function(){
		parent.history.back();
        return false;
	});

	$("#cancelupdateuser").click(function(){
		parent.history.back();
        return false;
	});

	$("#doupdateuser").click(function(){
		//alert($("#formupdateuser").serialize());
		if($("#newpassword").val()=="" || $("#newpassword").val()=="Password"){

			alert("Masukkan Password Baru !");

		}else{
			$.ajax({
				type: "POST",
				url: window.location.href.split(window.location.pathname)[0]+"/bpf-v2/BPF_corecontrol/BPF_admin/execupdateuser",
				data: $("#formupdateuser").serialize(),
				async: true,
				success: function(result) 
				{
					if(result=="true"){
						alert("Success !");
						parent.history.back();
					}else{
						alert(result);
					}
				}
			});
		}

	});

	// UPDATE Worksheet
	$("#updatews").click(function(){
		
		var idx = $('#idactivity').val().replace(/\./g, "dot");
		var responsibleval="";
		var approvalval="";
		var supportval="";
		var consultval="";
		var informedval="";
		

			// Responsible
			$("div[name='responsible-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						responsibleval +=$(place).html();
					}else{
						responsibleval +=$(place).html()+", ";
					}
				});
			});

			// Approval
			$("div[name='approval-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						approvalval +=$(place).html();
					}else{
						approvalval +=$(place).html()+", ";
					}
				});
			});

			// Support
			$("div[name='support-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						supportval +=$(place).html();
					}else{
						supportval +=$(place).html()+", ";
					}
				});
			});

			// Consult
			$("div[name='consult-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						consultval +=$(place).html();
					}else{
						consultval +=$(place).html()+", ";
					}
				});
			});

			// Informed
			$("div[name='informed-ul-"+idx+"']").next('div').each(function(i, items_list){
				var jlhitemjabdipilih = $(items_list).find("li[class='select2-search-choice'] div").length;
				$(items_list).find("li[class='select2-search-choice'] div").each(function(j, place){
					if((jlhitemjabdipilih-1)==j){
						informedval +=$(place).html();
					}else{
						informedval +=$(place).html()+", ";
					}
				});
			});

		
		var dNow = new Date();
		
		var data = {
			  id: $('#idactivity').val(),
			  input: $('#input'+idx).val(),
			  output: $('#output'+idx).val(),
			  pi: $('#pi'+idx).val(),
			  stk: $('#stk'+idx).val(),
			  aplikasi: $('#aplikasi'+idx).val(),
			  responsible: responsibleval, 
			  approval: approvalval, 
			  support: supportval, 
			  consult: consultval, 
			  informed: informedval, 
			  unit: $('#unit').val(), 
			  log: (dNow.getMonth()+1) + '/' + dNow.getDate() + '/' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes(),
			  urlnow : window.location.pathname,
			  status:true
		};
		socket.emit('updateworksheet', data);
		
		

	});

	// Send Wall Message
	$("#broadcasting").click(function(){
		var data = {
			  jam: $('#jamx').html(),
			  menit: $('#minx').html(),
			  detik: $('#secx').html(),
			  tgl: $('#tglx').html(),
			  bln: $('#blnx').html(),
			  thn: "20"+$('#thnx').html(),
			  topik: $('#topik').val(), 
			  informasi:$('#informasi').val(),
			  bataswaktu: $('#bataswaktu').val(), 
			  urlnow : window.location.pathname,
			  status:true
		};
		socket.emit('updatewall', data);
		alert("Informasi berhasil di upload !");
	});

	// Cancel Broadcast
	$("#cancelbroadcasting").click(function(){
		parent.history.back();	
	});

	// Send Update Worksheet Log to admin dashboard
	socket.on('updateworksheet_send_to_admin', function (data) {
		if(data.process_result==null){
			alert(data.message);
		}
		var li="";
		li += "<li><div class='news-item-date'> <span class='news-item-day'>"+data.tanggal+"</span> <span class='news-item-month'>"+data.bulan+"</span> </div><div class='news-item-detail'> <a href='#' class='news-item-title'>"+data.topik+"</a><p class='news-item-preview'>"+data.unit+" "+data.message+"</p></div></li>";
		$("ul.news-items").prepend(li);
		console.log(data);
	});

	// Get wall data from admin
	socket.on('newwall', function (data) {
		var stringnewwall="";
		//$.each(data, function() {
			 topik = data.topik;
			 informasi = data.informasi;
			 jenis = data.jenis;
			 waktuupload =data.waktuUpload;
			 stringnewwall+="<li class=''  style='display: table-cell; width: 100%; '>";
			 stringnewwall+="<div class='message_wrap'> <span class='arrow'></span>";
			 stringnewwall+="<div class='info'> <a class='name'>"+topik+"</a> <span class='time'>"+waktuupload+"</span></div>";
			 stringnewwall+="<div class='text'>"+informasi+"</div>";		
			 stringnewwall+="</div>";
			 stringnewwall+="</li>";
		 //});
		 $("#infoadminbaru").append(stringnewwall);
		 
	});

	
	$("#report").click(function(){
		$("#submenudashboardadmin").show('slow');
		var loc = window.location.pathname.split("/");
		socket.emit('getcategory', {iduser : loc[6]});
	});

	$("#maincat").click(function(){
		var loc = window.location.pathname.split("/");
		socket.emit('getcategory', {iduser : loc[6]});
	});

	$("#pg").click(function(){
		var loc = window.location.pathname.split("/");
		socket.emit('getProcessGroup', {iduser : loc[6]});
	});

	$("#proc").click(function(){
		var loc = window.location.pathname.split("/");
		socket.emit('getProcess', {iduser : loc[6]});
	});

	$("#act").click(function(){
		var loc = window.location.pathname.split("/");
		socket.emit('getActivity', {iduser : loc[6]});
	});

	$("#xl").click(function(){
		$.blockUI({ message: "<h4>Generating your report...</h4>" }); 
		var getunit = window.location.pathname.split("/");
		var host =  window.location.href.split(window.location.pathname)[0]+"/bpf-v2/BPF_corecontrol/BPF_admin/generateXLS";
		$.ajax({
			type: "POST",
			url: host,
			data: "idunit="+getunit[6],
			async: true,
			success: function(result) 
			{
				
				var jsonArr = $.parseJSON(result);
				var htmlx="<table>";
				htmlx+="<tr>";
						htmlx+="<td>Kode</td>";
						htmlx+="<td>Kategori</td>";
						htmlx+="<td>Kelompok Proses</td>";
						htmlx+="<td>Proses</td>";
						htmlx+="<td>Aktifitas</td>";
						htmlx+="<td>Input</td>";
						htmlx+="<td>Output</td>";
						htmlx+="<td>Performance Indicator</td>";
						htmlx+="<td>Sistem Tata Kerja</td>";
						htmlx+="<td>Aplikasi Pendukung</td>";
						htmlx+="<td>Responsible</td>";
						htmlx+="<td>Approval</td>";
						htmlx+="<td>Support</td>";
						htmlx+="<td>Consult</td>";
						htmlx+="<td>Informed</td>";
						htmlx+="</tr>";
				$.each(jsonArr, function(i, item) {
					htmlx+="<tr>";
					htmlx+="<td>"+item.APQC_id+"</td>";
					htmlx+="<td colspan='4'>"+item.id+". "+item.process_category+"</td>";
					htmlx+="<td>"+item.input+"</td>";
					htmlx+="<td>"+item.output+"</td>";
					htmlx+="<td>"+item.pi+"</td>";
					htmlx+="<td>"+item.stk+"</td>";
					htmlx+="<td>"+item.aplikasi+"</td>";
					htmlx+="<td>"+item.responsible+"</td>";
					htmlx+="<td>"+item.approval+"</td>";
					htmlx+="<td>"+item.support+"</td>";
					htmlx+="<td>"+item.consult+"</td>";
					htmlx+="<td>"+item.informed+"</td>";
					htmlx+="</tr>";
					$.each(item.process_group, function(i, itemPGroup) {
						htmlx+="<tr>";
						htmlx+="<td>"+itemPGroup.APQC_id+"</td>";
						htmlx+="<td></td>";
						htmlx+="<td colspan='3'>"+itemPGroup.id+". "+itemPGroup.process_group+"</td>";
						htmlx+="<td>"+itemPGroup.input+"</td>";
						htmlx+="<td>"+itemPGroup.output+"</td>";
						htmlx+="<td>"+itemPGroup.pi+"</td>";
						htmlx+="<td>"+itemPGroup.stk+"</td>";
						htmlx+="<td>"+itemPGroup.aplikasi+"</td>";
						htmlx+="<td>"+itemPGroup.responsible+"</td>";
						htmlx+="<td>"+itemPGroup.approval+"</td>";
						htmlx+="<td>"+itemPGroup.support+"</td>";
						htmlx+="<td>"+itemPGroup.consult+"</td>";
						htmlx+="<td>"+itemPGroup.informed+"</td>";
						htmlx+="</tr>";
						$.each(itemPGroup.process, function(i, itemP) {
							htmlx+="<tr>";
							htmlx+="<td>"+itemP.APQC_id+"</td>";
							htmlx+="<td></td>";
							htmlx+="<td></td>";
							htmlx+="<td colspan='2'>"+itemP.id+". "+itemP.Process+"</td>";
							htmlx+="<td>"+itemP.input+"</td>";
							htmlx+="<td>"+itemP.output+"</td>";
							htmlx+="<td>"+itemP.pi+"</td>";
							htmlx+="<td>"+itemP.stk+"</td>";
							htmlx+="<td>"+itemP.aplikasi+"</td>";
							htmlx+="<td>"+itemP.responsible+"</td>";
							htmlx+="<td>"+itemP.approval+"</td>";
							htmlx+="<td>"+itemP.support+"</td>";
							htmlx+="<td>"+itemP.consult+"</td>";
							htmlx+="<td>"+itemP.informed+"</td>";
							htmlx+="</tr>";	
							$.each(itemP.activity, function(i, itemact) {
								htmlx+="<tr>";
								htmlx+="<td>"+itemact.APQC_id+"</td>";
								htmlx+="<td></td>";
								htmlx+="<td></td>";
								htmlx+="<td></td>";
								htmlx+="<td>"+itemact.id+". "+itemact.activity+"</td>";
								htmlx+="<td>"+itemact.input+"</td>";
								htmlx+="<td>"+itemact.output+"</td>";
								htmlx+="<td>"+itemact.pi+"</td>";
								htmlx+="<td>"+itemact.stk+"</td>";
								htmlx+="<td>"+itemact.aplikasi+"</td>";
								htmlx+="<td>"+itemact.responsible+"</td>";
								htmlx+="<td>"+itemact.approval+"</td>";
								htmlx+="<td>"+itemact.support+"</td>";
								htmlx+="<td>"+itemact.consult+"</td>";
								htmlx+="<td>"+itemact.informed+"</td>";
								htmlx+="</tr>";	
							});
						});
					});
				});
				htmlx+="</table>";
				//$("#reportplace").html("");
				//$("#reportplace").html(htmlx);
				var buffer=htmlx;
				$.unblockUI();
				window.open('data:application/vnd.ms-excel,' + encodeURIComponent(buffer));
			}
		});

	});

	// User Report
	$("#showlaporan").click(function(event){
		event.preventDefault();
		$.blockUI({ message: "<h4>Generating your report...</h4>" }); 
		var getunit = window.location.pathname.split("/");
		var host =  window.location.href.split(window.location.pathname)[0]+"/bpf-v2/BPF_corecontrol/BPF_reporting/getmasterreport";
		$.ajax({
			type: "POST",
			url: host,
			data: "idunit="+$("#idunit").val(),
			async: true,
			success: function(result) 
			{
				
				var jsonArr = $.parseJSON(result);
				var htmlx="<table>";
				htmlx+="<tr>";
						htmlx+="<td>Kode</td>";
						htmlx+="<td>Kategori</td>";
						htmlx+="<td>Kelompok Proses</td>";
						htmlx+="<td>Proses</td>";
						htmlx+="<td>Aktifitas</td>";
						htmlx+="<td>Input</td>";
						htmlx+="<td>Output</td>";
						htmlx+="<td>Performance Indicator</td>";
						htmlx+="<td>Sistem Tata Kerja</td>";
						htmlx+="<td>Aplikasi Pendukung</td>";
						htmlx+="<td>Responsible</td>";
						htmlx+="<td>Approval</td>";
						htmlx+="<td>Support</td>";
						htmlx+="<td>Consult</td>";
						htmlx+="<td>Informed</td>";
						htmlx+="</tr>";
				$.each(jsonArr, function(i, item) {
					htmlx+="<tr>";
					htmlx+="<td>"+item.APQC_id+"</td>";
					htmlx+="<td colspan='4'>"+item.id+". "+item.process_category+"</td>";
					htmlx+="<td>"+item.input+"</td>";
					htmlx+="<td>"+item.output+"</td>";
					htmlx+="<td>"+item.pi+"</td>";
					htmlx+="<td>"+item.stk+"</td>";
					htmlx+="<td>"+item.aplikasi+"</td>";
					htmlx+="<td>"+item.responsible+"</td>";
					htmlx+="<td>"+item.approval+"</td>";
					htmlx+="<td>"+item.support+"</td>";
					htmlx+="<td>"+item.consult+"</td>";
					htmlx+="<td>"+item.informed+"</td>";
					htmlx+="</tr>";
					$.each(item.process_group, function(i, itemPGroup) {
						htmlx+="<tr>";
						htmlx+="<td>"+itemPGroup.APQC_id+"</td>";
						htmlx+="<td></td>";
						htmlx+="<td colspan='3'>"+itemPGroup.id+". "+itemPGroup.process_group+"</td>";
						htmlx+="<td>"+itemPGroup.input+"</td>";
						htmlx+="<td>"+itemPGroup.output+"</td>";
						htmlx+="<td>"+itemPGroup.pi+"</td>";
						htmlx+="<td>"+itemPGroup.stk+"</td>";
						htmlx+="<td>"+itemPGroup.aplikasi+"</td>";
						htmlx+="<td>"+itemPGroup.responsible+"</td>";
						htmlx+="<td>"+itemPGroup.approval+"</td>";
						htmlx+="<td>"+itemPGroup.support+"</td>";
						htmlx+="<td>"+itemPGroup.consult+"</td>";
						htmlx+="<td>"+itemPGroup.informed+"</td>";
						htmlx+="</tr>";
						$.each(itemPGroup.process, function(i, itemP) {
							htmlx+="<tr>";
							htmlx+="<td>"+itemP.APQC_id+"</td>";
							htmlx+="<td></td>";
							htmlx+="<td></td>";
							htmlx+="<td colspan='2'>"+itemP.id+". "+itemP.Process+"</td>";
							htmlx+="<td>"+itemP.input+"</td>";
							htmlx+="<td>"+itemP.output+"</td>";
							htmlx+="<td>"+itemP.pi+"</td>";
							htmlx+="<td>"+itemP.stk+"</td>";
							htmlx+="<td>"+itemP.aplikasi+"</td>";
							htmlx+="<td>"+itemP.responsible+"</td>";
							htmlx+="<td>"+itemP.approval+"</td>";
							htmlx+="<td>"+itemP.support+"</td>";
							htmlx+="<td>"+itemP.consult+"</td>";
							htmlx+="<td>"+itemP.informed+"</td>";
							htmlx+="</tr>";	
							$.each(itemP.activity, function(i, itemact) {
								htmlx+="<tr>";
								htmlx+="<td>"+itemact.APQC_id+"</td>";
								htmlx+="<td></td>";
								htmlx+="<td></td>";
								htmlx+="<td></td>";
								htmlx+="<td>"+itemact.id+". "+itemact.activity+"</td>";
								htmlx+="<td>"+itemact.input+"</td>";
								htmlx+="<td>"+itemact.output+"</td>";
								htmlx+="<td>"+itemact.pi+"</td>";
								htmlx+="<td>"+itemact.stk+"</td>";
								htmlx+="<td>"+itemact.aplikasi+"</td>";
								htmlx+="<td>"+itemact.responsible+"</td>";
								htmlx+="<td>"+itemact.approval+"</td>";
								htmlx+="<td>"+itemact.support+"</td>";
								htmlx+="<td>"+itemact.consult+"</td>";
								htmlx+="<td>"+itemact.informed+"</td>";
								htmlx+="</tr>";	
							});
						});
					});
				});
				htmlx+="</table>";
				//$("#reportplace").html("");
				//$("#reportplace").html(htmlx);
				var buffer=htmlx;
				$.unblockUI();
				window.open('data:application/vnd.ms-excel,' + encodeURIComponent(buffer));
			}
		});

	});


	$("#editInfo").click(function(){
		alert($(this).closest("tr").text());
	});







});




	/************************************************ ANGULAR PART *********************************************************/

	function isValidDate(dateString)
	{
		// First check for the pattern
		var regex_date = /^\d{4}\-\d{1,2}\-\d{1,2}$/;

		if(!regex_date.test(dateString))
		{
			return false;
		}

		// Parse the date parts to integers
		var parts   = dateString.split("-");
		var day     = parseInt(parts[2], 10);
		var month   = parseInt(parts[1], 10);
		var year    = parseInt(parts[0], 10);

		var currentDate = new Date();
		var currentYear = currentDate.getFullYear();

		// Check the ranges of month and year
		if(year < currentYear || month == 0 || month > 12)
		{
			return false;
		}

		var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

		// Adjust for leap years
		if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
		{
			monthLength[1] = 29;
		}

		// Check the range of the day
		return day > 0 && day <= monthLength[month - 1];
	}


	var app = angular.module('Wall', ["xeditable", "ui.bootstrap"]);
	var socket  = io.connect('http://10.16.107.77:3000');

	// An AngularJS directive that creates a confirmation dialog for an action
	angular.module('Wall').directive('ngReallyClick', [function() {
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				element.bind('click', function() {
					var message = attrs.ngReallyMessage;
					if (message && confirm(message)) {
						scope.$apply(attrs.ngReallyClick);
					}
				});
			}
		}
	}]);

	app.controller('WallController', function($scope, $http){

		$scope.group = '';
		$scope.loadGroups = function() {
			return $scope.group.length ? null : $http.get(window.location.href.split(window.location.pathname)[0]+"/bpf-v2/BPF_corecontrol/BPF_admin_menu/listInfo").success(function(data) {
			  $scope.group = data;
			});
		};

		$scope.saveUser = function(data, id) {

			//alert(data.topik);

			var error="";

			if(isValidDate(data.type)){
			}else{
				error+="Format tanggal expired salah. Silakan ubah dengan format yyyy-mm-dd !\n";
				//alert("Format tanggal expired salah. Silakan ubah dengan format yyyy-mm-dd !");
			}

			if(data.topik==null){
				error+="Topik masih kosong !\n";
			}

			if(data.pesan==null){
				error+="Informasi yang ingin di-upload masih kosong !\n";
			}

			if(error==""){
				socket.emit('saveupdateinformasi', {meta:data, key:id});
				socket.on('updateinforesult', function (infofromserver) {
					alert(infofromserver);
				});
			}else{
				alert(error);
				return false;
			}

		};

		// remove information
		$scope.removeUser = function(index, id) {
			$scope.group.splice(index, 1);
			socket.emit('deleteinformasi', id);
			socket.on('deleteinforesult', function (infofromserver) {
				alert(infofromserver);
			});
		};

	});



