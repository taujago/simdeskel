<div id="dlg" class="easyui-dialog" style="width:600px;height:300px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_produksi_hutan" id="id_produksi_hutan" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Produksi Hasil Hutan Milik Keluarga </td> 
			 		<td> : <input size="40" type="text" name="produksi_hutan" id="produksi_hutan" /></td>
              
			 	</tr>		 		 
			 	 <tr>
                  	<td width="200px">Satuan </td> 
			 		<td> : <input size="40" type="text" name="satuan" id="satuan" /></td>
                 </tr>
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 