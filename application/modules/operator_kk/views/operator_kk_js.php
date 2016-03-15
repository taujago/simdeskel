<script type="text/javascript">
var url;
var no_kk;


$(document).ready(function(){



$("#alamat").focus(function(){
	copy_alamat();
});

$("#sebagai").change(function(){
		console.log($(this).val());
		sebagai = $(this).val();
		if(sebagai == "a") {
			$("#boxanak").show();
			$("#anakke").removeAttr('disabled');
		}
		else {
			$("#boxanak").hide();	
			$("#anakke").attr('disabled','disabled');	
		}

	});

	
	// $('#id_pendudukss').combogrid({
	// 			panelWidth:600,
	// 			url: '<?php echo site_url('general/penduduk_dropdown_desa') ?>',
	// 			idField:'id_penduduk',
	// 			textField:'nama',
	// 			mode:'remote',
	// 			fitColumns:true,
	// 			columns:[[
	// 				//{field:'id_member',title:'ID',width:60},
	// 				{field:'nik',title:'NIK',width:200},
	// 				{field:'nama',title:'Nama Member',width:200},
	// 				{field:'tmp_lahir',title:'Tmp. Lahir',width:100},
	// 				{field:'tgl_lahir',title:'Tgl. lahir',width:100},
	// 				{field:'rt',title:'RT',width:30},
	// 				{field:'rw',title:'RW',width:30},
	// 				{field:'desa',title:'Desa',width:60}
					 
	// 			]]
				
	// 		});

	// $('#id_penduduk_anggota').combogrid({
	// 			panelWidth:600,
	// 			url: '<?php echo site_url('general/penduduk_dropdown_desa') ?>',
	// 			idField:'id_penduduk',
	// 			textField:'nama',
	// 			mode:'remote',
	// 			fitColumns:true,
	// 			columns:[[
	// 				//{field:'id_member',title:'ID',width:60},
	// 				{field:'nik',title:'NIK',width:200},
	// 				{field:'nama',title:'Nama Member',width:200},
	// 				{field:'tmp_lahir',title:'Tmp. Lahir',width:100},
	// 				{field:'tgl_lahir',title:'Tgl. lahir',width:100},
	// 				{field:'rt',title:'RT',width:30},
	// 				{field:'rw',title:'RW',width:30},
	// 				{field:'desa',title:'Desa',width:60}
					 
	// 			]]
				
	// 		});

	 $("#grid_kk").datagrid({
		onClickRow : function (a,b) {
			no_kk = b.no_kk;
			console.log(no_kk);
			console.log(a);
			console.log(b.no_kk);
			  $('#grid_kk_anggota').datagrid('load',{            
           		 no_kk : b.no_kk
        	});    
        	  //$('#grid_pembayaran').attr('title','Data Pembayaran Kredit Faktur '+b.no_faktur)
		}
		});  


});




function baru(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data KK');
			$('#fm').form('clear');
			 $("#no_kk").removeAttr('readonly');
			url = '<?php echo site_url("$controller/save") ?>';  
}


function edit() {

	var row = $('#grid_kk').datagrid('getSelected');	
	if(row) { 
	$('#dlg').dialog('open').dialog('setTitle','Edit Data KK'); 
	$('#fm').form('load',row);
	$("#no_kk").attr('readonly','readonly');
	url = '<?php echo site_url("$controller/update") ?>'; 
		$.ajax({
			url :'<?php echo site_url("lokasi/get_tiger_desa") ?>/'+row.id_kecamatan+'/'+row.id_desa,
			success : function(result){
			$("#id_desa").html('').append(result);
			}
		}); 
	}
	else {
						 
		$.messager.alert('Error','Pilih record yang akan diedit','error');
	}
}

function cetak() {

	var row = $('#grid_kk').datagrid('getSelected');	
	if(row) { 
 	 	window.open('<?php echo site_url("operator_kk/cetak"); ?>/'+row.no_kk);
	}
	else {
						 
		$.messager.alert('Error','Pilih record yang akan dicetak','error');
	}
}

function word() {

	var row = $('#grid_kk').datagrid('getSelected');	
	if(row) { 
 	 	window.open('<?php echo site_url("operator_kk/word"); ?>/'+row.no_kk);
	}
	else {
						 
		$.messager.alert('Error','Pilih record yang akan dicetak','error');
	}
}
function hapus() {
			var row = $('#grid_kk').datagrid('getSelections');
 			var arr = new Array();
			for(var i=0; i < row.length; i++) {
				arr[i] = row[i].no_kk;
				 
			}
			ids = arr.join();
			console.log(ids);
  			if (row){
				$.messager.confirm('Konfirmasi','Anda yakin akan menghapus data ? ',function(r){
					if (r){
						$.post('<?php echo site_url("$controller/hapus") ?>',{ids:ids},function(result){
							
							//return false;
							if (result.success == true){
								 
								$('#grid_kk').datagrid('reload');	// reload the user data
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
						$('#grid_kk').datagrid('reload');	// reload the user data
					}
				}
			});
		}


function cari(){
	      $('#grid_kk').datagrid('load',{                         
         	search_nama : $('#search_nama').val(),                     
           	search_no_kk : $('#search_no_kk').val(),
              
        });  
}


function reset_search() {
	$('#search_nama').val('');
	  $('#search_no_kk').val('');
	cari();
}


////////////// begin of anggota 
function tambah_anggota(){

	var row = $('#grid_kk').datagrid('getSelected');	
	if(row) {
			$('#dlg_anggota').dialog('open').dialog('setTitle','Tambah Data Anggota KK');
			$('#fm_anggota').form('clear');
			
			$("#no_kk_anggota").val(row.no_kk);

			url = '<?php echo site_url("$controller/save_anggota") ?>';  
	}
	else {
							 
			$.messager.alert('Error','Pilih KK','error');
		}
				
	}

function edit_anggota() {
    
	var row = $('#grid_kk_anggota').datagrid('getSelected');	
	if(row) { 
	$('#dlg_anggota').dialog('open').dialog('setTitle','Edit Data Anggota KK'); 
	//$('#fm_anggota').form('load',row);
	url = '<?php echo site_url("$controller/update_anggota") ?>'; 
	$("#no_kk_anggota").val(row.no_kk);
	$("#id_penduduk_anggota").val(row.nik);
	$("#sebagai").val(row.sebagai).attr('selected','selected');
	$("#id_kk").val(row.id_kk).attr('selected','selected');
	if(row.sebagai == 'a') {
		$("#boxanak").show();
		$("#anakke").val(row.anakke).attr('selected','selected');
		$("#anakke").removeAttr('disabled');
	}
	}
	else {
						 
		$.messager.alert('Error','Pilih record yang akan diedit','error');
	}
}

function simpan_anggota(){
			$('#fm_anggota').form('submit',{
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
						$('#dlg_anggota').dialog('close');		// close the dialog
						$('#grid_kk_anggota').datagrid('reload');	// reload the user data
					}
				}
			});
		}

function hapus_anggota() {
			var row = $('#grid_kk_anggota').datagrid('getSelections');
			console.log(row);
 			var arr = new Array();
			for(var i=0; i < row.length; i++) {
				arr[i] = row[i].id_kk;
				 
			}
			ids = arr.join();
			console.log(ids);
  			if (row){
				$.messager.confirm('Konfirmasi','Anda yakin akan menghapus data ? ',function(r){
					if (r){
						$.post('<?php echo site_url("$controller/hapus_anggota") ?>',{ids:ids},function(result){
							
							//return false;
							if (result.success == true){
								 
								$('#grid_kk_anggota').datagrid('reload');	// reload the user data
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



function copy_alamat(){
	$.ajax({
		url : '<?php echo site_url("operator_kk/copy_alamat") ?>',
		data : { nik : $("#nik").val()  },
		type : 'post',
		dataType : 'json',
		success : function(obj) {
			$("#alamat").val(obj.alamat);
			$("#rt").val(obj.rt);
			$("#rw").val(obj.rw);
			$("#dusun").val(obj.dusun);
			// $("#id_dusun").val(obj.id_dusun).attr('selected','selected');
		}

	});
}

function generate(){

	a = confirm('Apakah anda yakin akan meregenerate data KK ? ');
	if(a)
	{ 
		$(".modal").show();
		$.ajax({
			url : '<?php echo site_url("operator_kk/generate"); ?>',
			dataType : 'json', 
			success : function(obj) {
				$(".modal").hide();
				$.messager.alert('Informasi',obj.pesan,'info');
			}
		});
	}
}
</script>