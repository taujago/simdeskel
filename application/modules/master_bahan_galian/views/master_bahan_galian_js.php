<script type="text/javascript">
var mode;

$(document).keypress(function(e){
if(e.which == 13 && mode == "baru"){
		simpan();
		return false;
		}
});
$(".easyui-linkbutton").click(function(){
						$("#bahan_galian").focus();
						});
var url;

function baru(){
			mode = "baru";
			$('#dlg').dialog('open').dialog('setTitle','Tambah Data Produksi Bahan Galian');
			$('#fm').form('clear');
			url = '<?php echo site_url("$controller/save") ?>';  
}


function edit() {
	mode = "baru";
	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
	$('#dlg').dialog('open').dialog('setTitle','Edit Data Produksi Bahan Galian'); 
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
				arr[i] = row[i].id_bahan_galian;
				console.log(row[i].id_bahan_galian);
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
				/*onSubmit: function(){
					//return $(this).form('validate');
					//return false;
				},*/
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
			return false;
		}


</script>