
        <table id="tt_<?php echo $id ?>" class="easyui-datagrid" style="width:1135px;height:250px"
			url="<?php echo site_url($url)  ?>" title="<?php echo $title1 ?>"  singleSelect="false" toolbar="#tb_<?php echo $id ?>" rownumbers="true" pagination="true">
		<thead>
			<tr>
				<th field='<?php echo $f1 ?>' width='200' sortable='true'><strong><?php echo $l1 ?></strong></th>
<th field='<?php echo $f2 ?>' width='200' sortable='true'><strong><?php echo $l2 ?></strong></th>
<th field='<?php echo $f3 ?>' width='200' sortable='true'><strong><?php echo $l3 ?></strong></th>
<!---->
			</tr>
			
		</thead>
       	</table>
 <script type="text/javascript">
 	$('#tt_<?php echo $id; ?>').datagrid({
		queryParams: {'table':'<?php echo "v_".$table; ?>','default':'<?php echo $default; ?>'}
	});
 </script>
 <div style="display:none" id="tb_<?php echo $id ?>" style="padding:5px;height:auto">
	<div>
    	<a class="easyui-linkbutton"  iconCls="icon-back" href="<?php echo site_url("profil_menu"); ?>" > Kembali </a>
		<br />
		 
	</div>
</div>
<br>
<br>
<br>
<fieldset style="width:1120px">
<br>
        <legend><strong>Kepadatan penduduk </strong></legend>
        <table>
	 	<tr>
	 		<td>Kepadatan penduduk (per km) :</td><td><form id="jumlah" method="post"> <input value="<?php echo $nilai ?>" id="nilai" name="nilai"></form></td><td>&nbsp;&nbsp;&nbsp;<input type="button" value="simpan" id="simpan" name="simpan" onclick="save('profil_sdm_jumlah_2')"></td>
	 	</tr>
        </table>
        <br>
</fieldset>
<script type="text/javascript">
function save(id){
			$('#jumlah').form('submit',{
				url: '<?php echo site_url("profil_sdm_jumlah/simpan") ?>',
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
					}
				}
			});
		}
</script>