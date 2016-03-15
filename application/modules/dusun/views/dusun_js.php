<script type="text/javascript">

$(document).ready(function(){
	$("#id_desa").change(function(){
		$("#id").val($(this).val()+'.');
		$("#id").focus();
	});
});

var url;

function baru(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data Dusun');
			$('#fm').form('clear');
			 
			url = '<?php echo site_url("$controller/save") ?>';  
}


function edit() {

	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
	$('#dlg').dialog('open').dialog('setTitle','Edit Data Dusun'); 
	$('#fm').form('load',row);

						$.ajax({
							url :'<?php echo site_url("lokasi/get_tiger_kota") ?>/'+row.id_provinsi+'/'+row.id_kota,
							success : function(result){
								$("#id_kota").html('').append(result);
							}
						});

						$.ajax({
							url :'<?php echo site_url("lokasi/get_tiger_kecamatan") ?>/'+row.id_kota+'/'+row.id_kecamatan,
							success : function(result){
								$("#id_kecamatan").html('').append(result);
							}
						});
	url = '<?php echo site_url("$controller/update") ?>';  
	}
	else {
		$.messager.alert('Error','Pilih record yang akan diedit','error');
	}
}


function hapus() {
			var row = $('#tt').datagrid('getSelections');
 			var arr = new Array();
			for(var i=0; i < row.length; i++) {
				arr[i] = row[i].id;
				console.log(row[i].id);
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
	      	search_id_desa : $('#search_id_desa').val(), 
         	search_id_kecamatan : $('#search_id_kecamatan').val(),  
         	search_dusun : $('#search_dusun').val(),                     
           	
             
        });  
}


function reset_search() {
	$("#search_id_desa").val('x').attr('selected','selected');
	$('#search_id_kecamatan').val('x').attr('selected','selected');
 	$("#search_dusun").val('');
	cari();
}
</script>