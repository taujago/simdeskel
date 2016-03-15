<div id="dlg" class="easyui-dialog" style="width:600px;height300px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_iklim" id="id_iklim" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Iklim </td> 
			 		<td> : <input size="40" type="text" name="iklim" id="iklim" /></td>
			 	</tr>	
                <tr>
			 		<td width="200px">Nilai </td> 
			 		<td> : <input size="40" type="text" name="nilai" id="nilai" /></td>
			 	</tr>	 		 
			 	<tr>
			 		<td width="200px">Satuan </td> 
			 		<td> : <?php echo form_dropdown("id_satuan", $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan")); ?></td>
			 	</tr>		 
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 