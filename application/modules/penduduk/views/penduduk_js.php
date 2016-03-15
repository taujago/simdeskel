<script type="text/javascript">
var url;

$(document).ready(function(){
	$('#tgl_lahir').datebox({  
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
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data Penduduk');
			$('#fm').form('clear');
			 
			url = '<?php echo site_url("$controller/save") ?>';  
}


function edit() {
	$('#fm').form('clear');
	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
	$('#dlg').dialog('open').dialog('setTitle','Edit Data Penduduk'); 
	$('#fm').form('load',row);
	url = '<?php echo site_url("$controller/update") ?>'; 
		$.ajax({
			url :'<?php echo site_url("lokasi/get_tiger_desa") ?>/'+row.id_kecamatan+'/'+row.id_desa,
			success : function(result){
			$("#id_desa").html('').append(result);
							}
		}); 


		// yang sebelumnya 
						$.ajax({
							url :'<?php echo site_url("lokasi/get_tiger_kota") ?>/'+row.id_provinsi_sebelumnya+'/'+row.id_kota_sebelumnya,
							success : function(result){
								$("#id_kota_sebelumnya").html('').append(result);
							}
						});

						$.ajax({
							url :'<?php echo site_url("lokasi/get_tiger_kecamatan") ?>/'+row.id_kota_sebelumnya+'/'+row.id_kecamatan_sebelumnya,
							success : function(result){
								$("#id_kecamatan_sebelumnya").html('').append(result);
							}
						});

						$.ajax({
							url :'<?php echo site_url("lokasi/get_tiger_desa") ?>/'+row.id_kecamatan_sebelumnya+'/'+row.id_desa_sebelumnya,
							success : function(result){
								$("#id_desa_sebelumnya").html('').append(result);
							}
						});


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
	      $('#tt').datagrid('load',{                         
         	search_nama : $('#search_nama').val(),                     
           	search_id_desa : $('#search_id_desa').val(),
           	search_id_kecamatan :  $("#search_id_kecamatan").val()
             
        });  
}


function reset_search() {
	$('#search_nama').val('');
	$('#search_id_desa').val('x').attr('selected','selected');
    $("#search_id_kecamatan").val('x').attr('selected','selected');
	cari();
}
</script>