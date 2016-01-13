var fs = require('fs');
var url = require('url') ;



var proxy = require('http').createServer(function (req, res) {
  callback(res);

  res.writeHead(200, {'Content-Type': 'text/plain'});
  res.end('okay');


}).listen(3000);


var mysql = require('mysql');
var TEST_DATABASE = 'rasci';
var TEST_TABLE = 'jabatan';
var client = mysql.createConnection({
  host:'10.16.107.77',
  user: 'root',
  password: 'dbsdm123',
});

client.connect();

client.query('USE '+TEST_DATABASE);

// function to get proces_framework
var get_unit = function(data, callback) {
  client.query("select * from master_unit where idunit = ?" ,[data], function(err, results, fields) {
    // callback 
	if (err) {
		console.log("ERROR: " + err.message);
		throw err;
    }
    callback(results);
  });
}

// function to get proces_framework
var get_framework = function(callback) {
  client.query("select * from process_framework", function(err, results, fields) {
    // callback 
	if (err) {
		console.log("ERROR: " + err.message);
		throw err;
    }
    callback(results);
  });
}

// function to get kelompok unit
var get_kelompokunit = function(callback) {
  client.query("select * from kelompok_unit", function(err, results, fields) {
    // callback 
	if (err) {
		console.log("ERROR: " + err.message);
		throw err;
    }
    callback(results);
  });
}

// function to get process_group 
// Check if it has been fulfilled
var get_process_group = function(data, callback) {
	var count = 0;
	//var count = data.split("/").length;
	var count = data.split('.').length-1;

	//console.log("NILAI COUNT DATA TANPA TITIK  "+ count + "############################## XXXXXXXXXXXXXXXXXXX" + count);

	if(count<1){

	  client.query("select id from process_group where master_id = ?",[data], function(err, results, fields) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}
		callback(results);
	  });

	}else if(count==1){

	  client.query("select id from process where sub_master_id = ?",[data], function(err, results, fields) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}
		callback(results);
	  });

	}else if(count==2){

	  client.query("select id from activity where sub_sub_master_id = ?",[data], function(err, results, fields) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}
		callback(results);
	  });

	}
}

// function to get process_group 
// Check if it has been fulfilled
var get_category_done = function(data, callback) {
	  client.query("select id from category where framework_id = ?",[data], function(err, results, fields) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}
		callback(results);
	  });
}

// function to get worksheet
var get_worksheet = function(data, callback) {
  client.query("select count(*) as itemchecked from worksheet where id_activity = ? and unit = ?", [data.id, data.unit], function(err, results, fields) {
    // callback 
	if (err) {
		console.log("ERROR: " + err.message);
		throw err;
    }
    callback(results);
  });
}

// Check if activity has been submitted
var get_worksheet_particular = function(data, callback) {
  client.query("select * from worksheet where id_activity = ? and unit = ?", [data.id, data.idunit], function(err, results, fields) {
    // callback 
	if (err) {
		console.log("ERROR: " + err.message);
		throw err;
    }
    callback(results);
  });
}

/* get log
var get_list_log = function(callback) {
  client.query("select * from log order by id desc", function(err, results, fields) {
    // callback 
	if (err) {
		console.log("ERROR: " + err.message);
		throw err;
    }
    callback(results);
  });
}
*/

// function to insert worksheet
var insertworksheet = function(data, callback) {
	//console.log("Hasil fungsi get worksheet : "+ get_worksheet(data));
	//if(get_worksheet(data)<1){

		get_worksheet(data, function(result) {
			if(result[0].itemchecked<1){
			
				 client.query("insert into worksheet (id_activity, input, output, pi, stk, aplikasi, responsible, approval, support, consult, informed, unit, log) values (?,?,?,?,?,?,?,?,?,?,?,?,?)", [data.id, data.input, data.output, data.pi, data.stk, data.aplikasi, data.responsible, data.approval, data.support, data.consult, data.informed, data.unit, data.log], function(err, info) {
					// callback 
					if (err) {
						console.log("ERROR: " + err.message);
						throw err;
					}

					if(data.status){
						callback('Activity number '+data.id+' has been successfully updated');
					}else{
						callback('Activity number '+data.id+' has been successfully submitted');
					}
				});
			
			}else{
				callback('Activity number '+data.id+' has been submitted before ! Process aborted !');
			}
		});

}

// function insert wall data
var walldata = function(data, callback) {
	var type='';	
	if(data.bataswaktu==null || data.bataswaktu==""){
		type='9999-12-31';
	}else{
		type=data.bataswaktu;
	}

	var waktuupload = data.tgl+"/"+data.bln+"/"+data.thn+" "+data.jam+":"+data.menit+":"+data.detik;

	 client.query("insert into info_admin (topik, pesan, type, waktu) values (?,?,?,?)", [data.topik, data.informasi, type, waktuupload], function(err, info) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}else{

			var successData = {
			  topik: data.topik,
			  informasi: data.informasi,
			  jenis: type,
			  waktuUpload: waktuupload
			};

			 
				callback(successData);
		}
		
	});
}

// function update informasi di wall
var updateinformasiwall = function(info, callback) {
	client.query("UPDATE info_admin SET topik = ?, pesan = ?, type = ? WHERE id = ?", [info.meta.topik, info.meta.pesan, info.meta.type, info.key], function(err, sysinfo) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}

		callback("Data berhasil di-update !");
	});
}

// function delete informasi di wall
var deleteinformasiwall = function(info, callback) {
	client.query("DELETE FROM info_admin WHERE id = ?", [info], function(err, sysinfo) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}

		callback("Data berhasil di-hapus !");
	});
}

// function to insert log
var insert_log = function(data, callback) {
	 client.query("insert into log (topik, message, waktu) values (?,?,?)", [data.topik, data.unit+" "+data.message, data.tanggal+"/"+data.bulan+"/"+data.tahun+" "+data.time], function(err, info) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}

		callback(true);
	});
}

//delete activity
var updateworksheet_del = function(data, callback) {
  client.query("delete from worksheet where id_activity = ? and unit = ?", [data.id, data.unit], function(err, results, fields) {
    // callback 
	if (err) {
		console.log("ERROR: " + err.message);
		throw err;
    }
    callback(true);
  });
}



// START THE ENGINE
var io = require('socket.io').listen(proxy);
var clients = {};
io.sockets.on('connection', function (socket) {

	socket.emit('create');

	socket.on('check_in', function (incoming) {
        clients[incoming.iduser] = socket.id;

		get_unit(incoming.iduser, function(res) {
			io.sockets.socket(clients[0]).emit('connecting_clients', res);
		})
    });

	socket.on('check_out', function (incoming) {
		console.log("USER "+incoming.iduser+" TELAH MENINGGALKAN ROOM");
		io.sockets.socket(clients[0]).emit('BYE', incoming.iduser);
		io.sockets.socket(clients[incoming.iduser]).emit('SEE_YA', incoming.iduser);
		io.sockets.socket(clients[incoming.iduser]).disconnect();
	});


	socket.on('currentURI', function(data) {
		
		//console.log(data);

		var parameter="";
		var keyparam="";
		var idact="";
		var worksheet="";

		var pathArray = data.urlnow.split("/");
		if(pathArray.length>=7){
			for (i = 0; i < pathArray.length; i++) {
			  worksheet = pathArray[4];
			  parameter = pathArray[5];
			  keyparam = pathArray[6];
			  custom_unit = pathArray[7];
			}
		}else if(pathArray.length<7){
			/*
			for (i = 0; i < pathArray.length; i++) {
			  parameter = pathArray[3];
			  controller = pathArray[2];
			  
			}
			//console.log(controller);
			if(controller=='Indeks'){
				socket.disconnect();
				socket.on('check_out', function(data) {
					console.log("BYEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE");
					io.sockets.socket(clients[0]).emit('BYE', data.iduser);
				});
				//io.sockets.socket(clients[0]).emit('connecting_clients', res);
			}
			*/
		}

		//console.log(parameter);
		//console.log(keyparam);
		if(parameter=="idframe"){

			get_category_done(keyparam, function(result) {
				console.log("XXXXXXXXCVB "+result[0].id);
				for (x = 0; x < result.length; x++) {
					idact = result[x].id;
					var datatobesubmit = {
						  id: idact,
						  idunit: data.unit
					};

					get_worksheet_particular(datatobesubmit, function(result_check) {
							if(result_check[0]==undefined){

							}else{
								//console.log(result_check[0].id_activity);
								socket.emit('activity_done', result_check[0].id_activity);
							}
					});
					
				}

			});
			

		}else if(parameter=="idsubframe"){

			get_process_group(keyparam, function(result) {
				//console.log(result.length);
				for (x = 0; x < result.length; x++) {
					idact = result[x].id;
					var datatobesubmit = {
						  id: idact,
						  idunit: data.unit
					};

					get_worksheet_particular(datatobesubmit, function(result_check) {
							if(result_check[0]==undefined){

							}else{
								//console.log(result_check[0].id_activity);
								socket.emit('activity_done', result_check[0].id_activity);
							}
					});
					
				}

			});

		}else if(parameter=="id"){
			if(worksheet=="formworksheet"){
					if(custom_unit!=null){
						var datatobesubmit = {
							  id: keyparam,
							  idunit: custom_unit
						};
					}else{
						var datatobesubmit = {
							  id: keyparam,
							  idunit: data.unit
						};
					}

				get_worksheet_particular(datatobesubmit, function(ret) {
					//console.log(ret);
					socket.emit('show_activity', ret);
				});
			}
		}else if(parameter=="idsubsubframe"){
			get_process_group(keyparam, function(result) {
				
				for (x = 0; x < result.length; x++) {
					idact = result[x].id;
					var datatobesubmit = {
						  id: idact,
						  idunit: data.unit
					};

					get_worksheet_particular(datatobesubmit, function(result_check) {
							if(result_check[0]==undefined){

							}else{
								//console.log(result_check[0].id_activity);
								socket.emit('activity_done', result_check[0].id_activity);
							}
					});
					
				}

			});

		}else if(parameter=="idactivity"){
			//console.log(parameter);
			get_process_group(keyparam, function(result) {
				
				for (x = 0; x < result.length; x++) {
					idact = result[x].id;
					var datatobesubmit = {
						  id: idact,
						  idunit: data.unit
					};

					get_worksheet_particular(datatobesubmit, function(result_check) {
							if(result_check[0]==undefined){

							}else{
								//console.log(result_check[0].id_activity);
								socket.emit('activity_done', result_check[0].id_activity);
							}
					});
					
				}

			});

		}
		
		//else if(parameter=="BPF_welcome"){
		//	var socketid = clients[0];

		//	console.log(clients);
		//	console.log(socketid)
			
		//}
		
		if(worksheet=="checkunit"){
			get_unit(keyparam, function(res) {
				socket.emit('namaunit_untukadmin', res);
			})
		}
    });
	
	// Kategori Utama
	get_framework(function(kategoriutama) {
		socket.emit('framework', kategoriutama);
	});

	// Kategori Utama
	get_kelompokunit(function(kelompokunit) {
		socket.emit('populateunit', kelompokunit);
	});

	// Simpan worksheet
	socket.on('saveworksheet', function(data) {
		insertworksheet(data, function(result) {
			socket.emit('saveworksheet_result', result);
		});
	});

	// get category
	socket.on('getcategory', function(data){

	  client.query("SELECT  c.*, i.status, i.unit FROM  category c left JOIN	worksheet i	ON	c.id = i.id_activity AND i.unit = ?", [data.iduser], function(err, results, fields) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}
		socket.emit('category_from_server', results);
	  });

	});

	// get process group done
	socket.on('getProcessGroup', function(data){

	  client.query("SELECT  o.*, i.status, i.unit FROM  process_group o left JOIN	worksheet i	ON	o.id = i.id_activity AND i.unit = ?", [data.iduser], function(err, results, fields) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}
		socket.emit('process_group_from_server', results);
	  });

	});

	// get process done
	socket.on('getProcess', function(data){

	  client.query("SELECT  o.*, i.status, i.unit FROM  process o left JOIN	worksheet i	ON	o.id = i.id_activity AND i.unit = ?", [data.iduser], function(err, results, fields) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}
		socket.emit('process_from_server', results);
	  });

	});

	// get Activity done
	socket.on('getActivity', function(data){

	  client.query("SELECT  o.*, i.status, i.unit FROM  activity o left JOIN	worksheet i	ON	o.id = i.id_activity AND i.unit = ?", [data.iduser], function(err, results, fields) {
		// callback 
		if (err) {
			console.log("ERROR: " + err.message);
			throw err;
		}
		socket.emit('activity_from_server', results);
	  });

	});

	// broadcast wall
	socket.on('updatewall', function(data){
		walldata(data, function(result){
			socket.broadcast.emit('newwall', result);
		});
	});

	// saveupdateinformasi
	socket.on('saveupdateinformasi', function(info){
		updateinformasiwall(info, function(result){
			io.sockets.socket(clients[0]).emit('updateinforesult', result);
		});
	});

	// deleteinformasi
	socket.on('deleteinformasi', function(id){
		deleteinformasiwall(id, function(result){
			io.sockets.socket(clients[0]).emit('deleteinforesult', result);
		});
	});


	// update worksheet
	socket.on('updateworksheet', function(data) {
		updateworksheet_del(data, function(result) {
			if(result){
				insertworksheet(data, function(result) {
					//socket.emit('updateworksheet_result', result);
					get_unit(data.unit, function(result_to_admin) {

						

						var today = new Date();
						var dd = today.getDate();
						var mm = today.getMonth()+1; //January is 0!
						var yyyy = today.getFullYear();
						var unitname ="";

						if(dd<10) {
							dd='0'+dd
						} 

						if(mm<10) {
							mm='0'+mm
						} 

						var tanggal = dd+'/'+mm+'/'+yyyy;


						for(var z=0; z<result_to_admin.length; z++){
						 unitname = result_to_admin[z].namaunit;
						}



						var datatoadmin = {
						  topik: "Modul WorkSheet",
						  process_result: result,
						  tanggal: dd,
						  bulan: mm,
						  tahun: yyyy,
						  time: today.getHours()+":"+today.getMinutes()+":"+today.getSeconds(),
						  message: "Melakukan update untuk aktivitas no "+data.id,
						  unit: unitname
						};

						
						var datatorequestor = {
						  topik: "Modul WorkSheet",
						  time: today.getHours()+":"+today.getMinutes()+":"+today.getSeconds(),
						  message: "Activity number "+data.id+" has been successfully updated",
						  unit: unitname
						};

						var socketid = clients[0];
						var socketidpengirim = clients[data.unit];

						insert_log(datatoadmin, function(hasil) {

							if(hasil){

								io.sockets.socket(socketid).emit('updateworksheet_send_to_admin', datatoadmin);
								io.sockets.socket(socketidpengirim).emit('updateworksheet_send_to_admin', datatorequestor);

							}

						});

					});
				});
			}
		});
	});

	client.on('close', function(err) {
		if (err) {
			// Oops! Unexpected closing of connection, lets reconnect back.
			connection = mysql.createConnection(connection.config);
		} else {
			console.log('Connection closed normally.');
		}
	});

});


