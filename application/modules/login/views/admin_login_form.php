<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.md5.js" ?>" ></script>
<script type="text/javascript">

function simpan(){
	//alert('test');

	$("#password2").val($.md5($("#password").val()) );
	$("#password").val('');

			$('#frm').form('submit',{
				url: '<?php echo site_url("login/ceklogin"); ?>',				 
				success: function(result){
					//var result = eval('('+result+')');
					console.log(result);
					//return false; 
					result = result.replace(/\s+/g, " ");
					obj = $.parseJSON(result);
					console.log(obj.pesan);
					if (obj.success == false ){
						$.messager.show({
							title: 'Error',
							msg: obj.pesan
						});
					} else {
						location.href='<?php echo site_url("admin") ?>'

					}
				}
			});
			return false;
		}


</script>
<div id="detail" style="min-height: 300px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	
		<div id="loginbox" style="width:300px; margin:50px auto;  border:1px solid #99BBE8; padding:10px" >
			<form id="frm" method="post" >
				<table>
					<tr>
						<td>ID Member </td>
						<td><input type="text" name="username"  id="username"/>
					</tr>
					<tr>
						<td>Password </td>
						<td><input type="password" name="password" id="password" />
					</tr>
					<tr><td></td><td><input type="button" value="Login" onclick="return simpan();" /></td></tr>
					

				</table>
				<input type="hidden" name="password2" id="password2" />
			</form>
			</div>
		</div>	 

</div>