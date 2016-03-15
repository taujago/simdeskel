<script type="text/javascript">
var url;

function baru(){
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data Tanah Sawah');
			$('#fm').form('clear');
			url = '<?php echo site_url("$controller/save") ?>';  
			$("#tanah_sawah").focus();
}


function edit() {
	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
	$('#dlg').dialog('open').dialog('setTitle','Edit Data Tanah Sawah'); 
	$('#fm').form('load',row);					 
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
				arr[i] = row[i].id_tanah_sawah;
				console.log(row[i].id_tanah_sawah);
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
								$.messager.alert('Error',result.pesan,'error');
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


</script>