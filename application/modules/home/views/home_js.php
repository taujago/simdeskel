<script type="text/javascript">
	var url;

	function login(){
				$('#dlg').dialog('open').dialog('setTitle','Login Operator');
				$('#fm').form('clear');
				 
				 
	}

	/* function go_login(){
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
		} */

function go_login(){
	//alert('test');

	$("#password2").val($.md5($("#password").val()) );
	$("#password").val('');

			$('#frm').form('submit',{
				url: '<?php echo site_url("op_login/ceklogin"); ?>',				 
				success: function(result){
					//var result = eval('('+result+')');
					console.log(result);
					//return false; 
					result = result.replace(/\s+/g, " ");
					obj = $.parseJSON(result);
					console.log(obj.pesan);
					if (obj.success == false ){
						console.log('heheelleleel'+ obj);
						console.log(obj);
						 alert(obj.pesan);
					} else {
						location.href='<?php echo site_url("operator_area") ?>'

					}
				}
			});
			return false;
		}

</script>