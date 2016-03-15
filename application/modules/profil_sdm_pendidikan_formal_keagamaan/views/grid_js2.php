<script type="text/javascript">
function simpan1(id){
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
						location.reload();
					}
				}
			});
		}
</script>