<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.md5.js" ?>" ></script>
<script type="text/javascript">

function resetpassword(){
	//alert('test');

	 

			$('#frm').form('submit',{
				url: '<?php echo site_url("member_login/resetpassword"); ?>',				 
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
						 $.messager.show({
							title: 'Informasi',
							msg: obj.pesan
						});

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
	
		<div id="loginbox" style="width:600px; margin:50px auto;  border:1px solid #99BBE8; padding:10px" >
			<form id="frm" method="post" >
				<table>
					<tr>
						<td>Masukkan Email </td>
						<td> : <input size="30" type="text" name="email"  id="email"/>
					 <input type="button" value="Reset Password" onclick="return resetpassword();" />

					</td></tr>
					

				</table>
				 
			</form>
			</div>
		</div>	 

</div>