<div id="dlg" class="easyui-dialog" style="width:600px;height:200px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_akseptor_kb" id="id_akseptor_kb" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Akseptor KB </td> 
			 		<td> : <input size="40" type="text" name="akseptor_kb" id="akseptor_kb" /></td>
			 	</tr>		 		 
			 	 
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 