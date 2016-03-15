<div id="dlg" class="easyui-dialog" style="width:600px;height:200px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_aset_perumahan" id="id_aset_perumahan" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Categori </td> 
			 		<td> : <?php echo form_dropdown("category",  $this->cm->arr_tabel("master_jenis_rumah", "id", "jenis", "jenis") ,'','id="category"'); ?></td>
			 	</tr>		 
                <tr>
			 		<td width="200px">Aset Perumahan </td> 
			 		<td> : <input size="40" type="text" name="aset_perumahan" id="aset_perumahan" /></td>
			 	</tr>		 		 
			 	 
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 