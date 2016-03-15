<script type="text/javascript">
var url;
$(document).ready(function(){

$(".dn, .ln").hide();

$("#jenis_kedatangan").change(function(){
	
	if($(this).val() == "dn") {
		$(".dn").show();
		$(".ln").hide();
	}
	else {
		$(".dn").hide();
		$(".ln").show();
	}
	
});

$('#sementara_id_tujuan').combogrid({
				panelWidth:800,
				url: '<?php echo site_url('general/penduduk_dropdown_desa') ?>',
				idField:'id_penduduk',
				textField:'nama',
				mode:'remote',
				fitColumns:true,
				onSelect : function(a,b) {
					console.log(a);
					console.log(b);	
					$.ajax({
						url:'<?php echo site_url("$controller/json_detail") ?>/'+b.id_penduduk,
						dataType : 'json',
						success : function(result) {
							$("#id_dusun").val(result.id_dusun).attr('selected','selected');
							$("#alamat").val(result.alamat);
							$("#rt").val(result.rt);
							$("#rw").val(result.rw);

						}
					});
				},
				columns:[[
					//{field:'id_member',title:'ID',width:60},
					{field:'nik',title:'NIK',width:200},
					{field:'nama',title:'Nama Member',width:200},
					{field:'tmp_lahir',title:'Tmp. Lahir',width:100},
					{field:'tgl_lahir',title:'Tgl. lahir',width:100},
					{field:'rt',title:'RT',width:30},
					{field:'rw',title:'RW',width:30},
					{field:'desa',title:'Desa',width:60}
					 
				]]
				
});

$('#id_suku,#id_keturunan').combogrid({
				panelWidth:800,
				url: '<?php echo site_url('general/suku_dropdown') ?>',
				idField:'id_suku',
				textField:'suku',
				mode:'remote',
				fitColumns:true,
				columns:[[
					//{field:'id_member',title:'ID',width:60},
					{field:'suku',title:'Suku',width:400}
					 
					 
				]]
				
});

$("#sementara").hide();
$("#pendatang").hide();
$("#pindah").hide();
$("#status_kependudukan").change(function(){
	console.log($(this).val());
	jenis = $(this).val();

	if(jenis=="2") {  // pendatang 
		$("#pendatang").show('fast');
		$("#sementara").hide('fast');
		$("#pindah").hide('fast');
	}
	if(jenis=="1") {  // sementara
		$("#pendatang").hide('fast');
		$("#sementara").show('fast');
		$("#pindah").hide('fast');
	}
	if(jenis=="3"){ // pindah
		$("#pindah").show('fast');
		$("#pendatang").hide('fast');
		$("#sementara").hide('fast');
	}
	if(jenis=="0"){ //. tetap
		$("#pindah").hide('fast');
		$("#pendatang").hide('fast');
		$("#sementara").hide('fast');
	}
});


	$('#tgl_lahir,#regdate').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    }); 

$('#tgl_paspor_akhir').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    });

$('#tgl_akta_nikah').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    });


$('#tgl_akta_cerai').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    });

});




function baru(){
	// $("#pendatang").hide();
	// $("#sementara").hide();
	// 		$('#dlg').dialog('open').dialog('setTitle','Tambah Data Penduduk');
	// 		$('#fm').form('clear');
			 
	// 		url = '<?php echo site_url("$controller/save") ?>';  
	location.href=('<?php echo site_url("operator_penduduk/tambah") ?>');
}


function edit() {
	url = '<?php echo site_url("$controller/update") ?>'; 
	$('#fm').form('clear');
	var row = $('#tt').datagrid('getSelected');	
	delete row.foto;
	if(row) { 
		location.href=('<?php echo site_url("$controller/edit") ?>/'+row.id_penduduk);
	// console.log(row);
	// $('#dlg').dialog('open').dialog('setTitle','Edit Data Penduduk'); 
	// $('#fm').form('load',row);

	// console.log("status kependudukan " + row.status_kependudukan);
	// if(row.status_kependudukan == "2") {
	// 	$("#pendatang").show();
	// 	$("#sementara").hide();
		
	// 	if(row.jenis_kedatangan =="ln"){
	// 		$(".ln").show();
	// 		$(".dn").hide();
	// 	}
	// 	else {
	// 		$(".ln").hide();
	// 		$(".dn").show();
	// 	}
		
	// }
	
	// if(row.status_kependudukan == "0") {
	// 	$("#pendatang").hide();
	// 	$("#sementara").hide();
	// }
	// if(row.status_kependudukan == "1") {
	// 	$("#pendatang").hide();
	// 	$("#sementara").show();
	// }



	// 					$.ajax({
	// 						url :'<?php echo site_url("lokasi/get_tiger_kota") ?>/'+row.id_provinsi_sebelumnya+'/'+row.id_kota_sebelumnya,
	// 						success : function(result){
	// 							$("#id_kota_sebelumnya").html('').append(result);
	// 						}
	// 					});

	// 					$.ajax({
	// 						url :'<?php echo site_url("lokasi/get_tiger_kecamatan") ?>/'+row.id_kota_sebelumnya+'/'+row.id_kecamatan_sebelumnya,
	// 						success : function(result){
	// 							$("#id_kecamatan_sebelumnya").html('').append(result);
	// 						}
	// 					});

	// 					$.ajax({
	// 						url :'<?php echo site_url("lokasi/get_tiger_desa") ?>/'+row.id_kecamatan_sebelumnya+'/'+row.id_desa_sebelumnya,
	// 						success : function(result){
	// 							$("#id_desa_sebelumnya").html('').append(result);
	// 						}
	// 					}); 

	}
	
 
	else {

		$.messager.alert('Error','Pilih record yang akan diedit','error');
	} 
}


function hapus() {
			var row = $('#tt').datagrid('getSelections');
 			var arr = new Array();
			for(var i=0; i < row.length; i++) {
				arr[i] = row[i].id_penduduk;
				console.log(row[i].id_penduduk);
			}
			ids = arr.join();
			console.log(ids);
  			if (row){
				$.messager.confirm('Konfirmasi','Anda yakin akan menghapus data ? ',function(r){
					if (r){
						$.post('<?php echo site_url("$controller/hapus") ?>',{ids:ids},function(result){
							
							//return false;
							if (result.success == true){
								 
								$('#tt').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: obj.pesan
								});
							}
						},'json');
					}
				});
			}
}


function simpan(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				dataType:'json',
				success: function(result){
					 console.log(result);
					 obj = $.parseJSON(result);
					// return false;
					if (obj.success == false ){
						$.messager.alert('Error',obj.pesan,'error');
					} else {
						$.messager.alert('Informasi',obj.pesan,'info');
						$('#dlg').dialog('close');		// close the dialog
						$('#tt').datagrid('reload');	// reload the user data
					}
				}
			});
		}


function cari(){
		console.log($("#search_nik2").val());
	      $('#tt').datagrid('load',{                         
         	search_nama 				: $('#search_nama').val(),
         	search_status_kawin 		: $("#search_status_kawin").val(),
         	search_status_kependudukan 	: $("#search_status_kependudukan").val() ,
         	search_jk 					: $("#search_jk").val(),
         	search_nik 					: $("#search_nik2").val(),
         	search_id_dusun 			: $("#search_id_dusun").val()             
           	             
        });  
}

function reset_search() {
	$('#search_nama').val('');
 	$("#search_status_kawin").val('x').attr('selected','selected');
	$("#search_status_kependudukan").val('x').attr('selected','selected');
	$("#search_jk").val('x').attr('selected','selected');
	$("#search_nik").val('');
	 
	cari();
}
function cetak() {
	 
	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
		window.open('<?php echo site_url("$controller/cetak/") ?>/'+row.id_penduduk);
		//location.href=('<?php echo site_url("$controller/cetak/") ?>/'+row.id_penduduk);
	}
	else 
	{
		$.messager.alert('Error','Pilih Record yang akan dicetak','error');
	}
	 
}


function detail() {
	 
	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
		location.href=('<?php echo site_url("$controller/detail/") ?>/'+row.id_penduduk);
		//location.href=('<?php echo site_url("$controller/cetak/") ?>/'+row.id_penduduk);
	}
	else 
	{
		$.messager.alert('Error','Pilih Record ','error');
	}
	 
}


function showhide(vshow,vhide){
	
	$("#"+vshow).show();
	$("#"+vhide).hide();
}

function simpan_kabupaten(){
	id_provinsi = $("#id_provinsi").val();
	kota = $("#add_kabupaten_nama").val();
	
	console.log("id provinsi "+id_provinsi);
	 
	
	$.ajax({
		   url : '<?php echo site_url("lokasi/simpan_kota"); ?>',
		   data : {id_provinsi:id_provinsi,kota:kota},
		   dataType : 'json',
		   type : 'post',
		   success : function(result) {
		   		if(result.success == true) {
					$.messager.alert('Informasi',result.pesan,'info');
					$("#id_kota_sebelumnya").append(result.html);
					showhide('btn_add_kabupaten','add_kabupaten');
				}
				else {
					$.messager.alert('Error',result.pesan,'error');
				}
		   }
		   });
	
}
 
 
 function simpan_kecamatan(){
	id_kota = $("#id_kota_sebelumnya").val();
	kecamatan = $("#add_kecamatan_nama").val();
	
	//console.log("id provinsi "+id_provinsi);
	 
	
	$.ajax({
		   url : '<?php echo site_url("lokasi/simpan_kecamatan"); ?>',
		   data : {id_kota:id_kota,kecamatan:kecamatan},
		   dataType : 'json',
		   type : 'post',
		   success : function(result) {
		   		if(result.success == true) {
					$.messager.alert('Informasi',result.pesan,'info');
					$("#id_kecamatan_sebelumnya").append(result.html);
					showhide('btn_add_kecamatan','add_kecamatan');
				}
				else {
					$.messager.alert('Error',result.pesan,'error');
				}
		   }
		   });
	
}


function simpan_desa(){
	id_kecamatan = $("#id_kecamatan_sebelumnya").val();
	desa = $("#add_desa_nama").val();
	
	//console.log("id provinsi "+id_provinsi);
	 
	
	$.ajax({
		   url : '<?php echo site_url("lokasi/simpan_desa"); ?>',
		   data : {id_kecamatan:id_kecamatan,desa:desa},
		   dataType : 'json',
		   type : 'post',
		   success : function(result) {
		   		if(result.success == true) {
					$.messager.alert('Informasi',result.pesan,'info');
					$("#id_desa_sebelumnya").append(result.html);
					showhide('btn_add_desa','add_desa');
				}
				else {
					$.messager.alert('Error',result.pesan,'error');
				}
		   }
		   });
	
}

</script>