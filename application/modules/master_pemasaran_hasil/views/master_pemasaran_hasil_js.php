<script type="text/javascript">
var mode;
$(document).keypress(function(e){
if(e.which == 13 && mode == "baru"){
		simpan();
		return false;
		}
});
$(".easyui-linkbutton").click(function(){
						$("#pemasaran_hasil").focus();
						});
var url;

function baru(){
		mode = "baru";
			$('#dlg').dialog('open').dialog('setTitle','Tambah Pemasaran hasil');
			$('#fm').form('clear');
			url = '<?php echo site_url("$controller/save") ?>';  
}


function edit() {
	mode = "baru";
	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
	$('#dlg').dialog('open').dialog('setTitle','Edit Pemasaran hasil'); 
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
				arr[i] = row[i].id_pemasaran_hasil;
				console.log(row[i].id_pemasaran_hasil);
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
		mode = null;
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