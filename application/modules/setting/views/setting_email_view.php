<div id="detail" style="min-height: 500px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 
	 <div style="margin: 10 20px; border:1px solid #99BBE8; padding: 5px;" >
	 	 
		<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="simpan_referensi()" >Simpan</a>
		<br />
		 
	 </div>
		
	 	<form id="fm" method="post" novalidate>
	 		<fieldset> <legend>Email</legend>
	 		<table class="referensi">
	 			
	 			<tr>
	 				<td width="200px;">No Reply Email </td>
	 				<td><input size="30" type="text" name="email_noreply" id="email_noreply" 

	 				 value="<?php echo $email_noreply ?>"	/> <br/ >
	 				 email ini akan menjadi sender setiap pengiriman email kepada user.
	 				</td>
	 			</tr>
	 			<tr>
	 				<td>Nama Pengirim Email </td>
	 				<td><input size="30"  type="text" name="email_pengirim" id="email_pengirim"
	 					 value="<?php echo $email_pengirim ?>"	/>
	 					 <br />
	 					 Email ini akan menjadi nama pengirim 
	 					</td>
	 			</tr>
	 			<tr>
	 				<td valign="top">Email Administrator </td>
	 				<td><input size="60"  type="text" name="email_admin" id="email_admin"
	 					 value="<?php echo $email_admin ?>"	/> <Br /> 
	 					 Email ini akan menjadi email yang akan menerima setiap adanya aktivitas user sperti registrasi, pembayaran dan lain - lain.
	 					 (eq: john@doe.com, istrimuda@yahlo.com) </td>
	 			</tr>
	 			
	 		</table>
	 		</fieldset>
	 	  
		 
		</form>
	 
	 		
	 	</div>
 
</div>

<style type="text/css">
.referensi {
	border-collapse: collapse;

}
.referensi td {
	border-bottom: solid 1px #ccc;
}
</style>

<script type="text/javascript">

function simpan_referensi(){
			$('#fm').form('submit',{
				url: '<?php echo site_url("setting/simpan_referensi") ?>',
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					//var result = eval('('+result+')');
					console.log(result);
					//return false; 
					result = result.replace(/\s+/g, " ");
					obj = $.parseJSON(result);
					console.log(obj.pesan);
					if (obj.success == true ){
						$.messager.alert( 'Informasi',obj.pesan);
					} else {
						$.messager.alert('Error',obj.pesan);
						 
					}
				}
			});
		}
</script>