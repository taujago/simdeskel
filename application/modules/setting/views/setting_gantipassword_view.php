<div id="detail" style="min-height: 500px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 
 
	 	<form id="fm" method="post" novalidate>
	 		<fieldset> <legend>Ganti Password</legend>
	 		<table class="referensi">
	 			
	 			<tr>
	 				<td width="200px;">Password Lama </td>
	 				<td>  : <input type="password" name="password_lama" /></td>
	 			</tr>

	 			<tr>
	 				<td width="200px;">Password </td>
	 				<td>  : <input type="password" name="password" /></td>
	 			</tr>

	 			<tr>
	 				<td width="200px;">Password Lagi</td>
	 				<td>  : <input type="password" name="password2" /></td>
	 			</tr>
	 		 
	 			<tr><td></td><td>
	 			<a href="#" class="easyui-linkbutton" iconCls="icon-save"   onclick="simpan()" >Simpan</a>
	 			</td></tr> 
	 			
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
 
function simpan(){
			$('#fm').form('submit',{
				url: '<?php echo site_url("setting/save_gantipassword") ?>',
				onSubmit: function(){
					return $(this).form('validate');
				},
				dataType:'json',
				success: function(result){
					 console.log(result);
					 obj = $.parseJSON(result);
 					if (obj.success == false ){
						$.messager.alert('Error',obj.pesan,'error');
					} else {
						$.messager.alert('Informasi',obj.pesan,'info');
						 
					}
				}
			});
		}

 </script>

 <?php 
$this->load->view("js/global_js");
 ?>