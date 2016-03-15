<div id="detail" style="min-height: 500px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 
 
	 	<form id="fm" method="post" novalidate>
	 		<fieldset> <legend>Kabupaten / Kota</legend>
	 		<table class="referensi">
	 			
	 			<tr>
	 				<td width="200px;">Provinsi </td>
	 				<td>  : <?php echo form_dropdown("id_provinsi",$arr_provinsi,'','id="id_provinsi" onchange="get_kota(this,\'#id_kota\')"') ?> </td>
	 			</tr>
	 			<tr>
	 				<td>Kabupaten / Kota  </td>
	 				<td> : <?php echo form_dropdown("id_kota",array(),'','id="id_kota" onchange="get_kecamatan(this,\'#id_kecamatan\')"') ?></td>
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

$(document).ready(function(){
	$("#id_provinsi").val('<?php echo $id_provinsi ?>').attr('selected','selected');
	$.ajax({
		url :'<?php echo site_url("lokasi/get_tiger_kota/$id_provinsi/$id_kota") ?>',
		success : function(result){
		$("#id_kota").html('').append(result);
		}
	});
});

function simpan(){
			$('#fm').form('submit',{
				url: '<?php echo site_url("setting/save_lokasi") ?>',
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