<div id="dlg" class="easyui-dialog" style="width:900px;height:600px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Provinsi</div>
		<form id="fm" method="post" novalidate>
		 	<fieldset >
		 		<legend><b>Data Provinsi</b></legend>
			 <table>
			 	<tr>
			 		<td width="200px">Kode Provinsi</td> 
			 		<td> : <input type="text" name="kode_prov" id="kode_prov" /> </td>
			 	</tr>
			 	
			 	<tr>
			 		<td width="200px">Provinsi</td> 
			 		<td> : <input type="text" name="provinsi" id="provinsi" /> </td>
			 	</tr>
 
		 
			 </table>
			 <input type="hidden" name="id" id="id" />
			</fieldset>
		 
		 
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 