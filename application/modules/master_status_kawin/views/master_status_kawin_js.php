<script type="text/javascript">

var mode;
$(document).keypress(function(e){
if(e.which == 13 && mode == "baru"){
		simpan();
		return false;
		}
});
var url;
$(".easyui-linkbutton").click(function(){
						$("#stat").focus();
						});

function edit() {
	mode = "baru";
	var row = $('#tt').datagrid('getSelected');	
	if(row) { 
	$('#dlg').dialog('open').dialog('setTitle','Edit status perkawinan'); 
	$('#fm').form('load',row);			
	url = '<?php echo site_url("$controller/update") ?>';  
	}
	else {
		$.messager.alert('Error','Pilih record yang akan diedit','error');
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