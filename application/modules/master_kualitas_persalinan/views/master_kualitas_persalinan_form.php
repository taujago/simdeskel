<div id="dlg" class="easyui-dialog" style="width:600px;height:200px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_kualitas_persalinan" id="id_kualitas_persalinan" />
		 	<fieldset >
			 <table>
				<tr>
			 		<td width="200px">Kualitas Persalinan </td> 
			 		<td> : <?php echo form_dropdown("kualitas_cat", $this->dm->arr_kategori(),'','id="kualitas_cat"'); ?></td>
			 	</tr>		
				<tr>
			 		<td width="200px">Kualitas Persalinan </td> 
			 		<td> : <input size="40" type="text" name="kualitas_persalinan" id="kualitas_persalinan" /></td>
			 	</tr>		 		 
			 	 
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 