<div id="dlg" class="easyui-dialog" style="width:600px;height:200px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_kedudukan_pajak" id="id_kedudukan_pajak" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Kedudukan Anggota Keluarga sebagai Wajib Pajak dan Retrebusi </td> 
			 		<td> : <input size="40" type="text" name="kedudukan_pajak" id="kedudukan_pajak" /></td>
			 	</tr>		 		 
			 	 
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 