<script type="text/javascript">
var url;
function baru(id){
			var title = $("input#title2."+id).val();
			$('#dlg_' + id).dialog('open').dialog('setTitle','Tambah Data ' + title);
			var idp = $('#id_penduduk').val();
			var tab = $('input#tab.'+id).val();
			$('#fm_' + id).form('clear');
			$('input#id_penduduk').val(idp);
			$('input#tab.'+id).val(tab);
			url = '<?php echo site_url("grid/simpan") ?>';  
}
function edit(id) {
	var title = $("#title2."+id).val();
	var row = $('#tt_' + id).datagrid('getSelected');	
	if(row) { 
	$('#dlg_' + id).dialog('open').dialog('setTitle','Edit Data '); 
	$('#fm_' + id).form('load',row);						 
	url = '<?php echo site_url("grid/update_det") ?>';  
	}
	else {
		$.messager.alert('Error','Pilih record yang akan diedit','error');
	}
}
function hapus(id) {
			var table = $("#table."+id).val();
			var row = $('#tt_' + id).datagrid('getSelections');
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
						$.post('<?php echo site_url("grid/hapus_det") ?>' + "/" + table,{ids:ids},function(result){
							
							//return false;
							if (result.success == true){
								 
								$('#tt_' + id).datagrid('reload');	// reload the user data
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
function simpan(id){
			$('#fm_' + id).form('submit',{
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
						$('#dlg_' + id).dialog('close');		// close the dialog
						$('#tt_' + id).datagrid('reload');	// reload the user data
					}
				}
			});
		}
</script>