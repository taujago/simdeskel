<div id="dlg" class="easyui-dialog" style="width:600px;height:250px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_batas" id="id_batas" />
		 	<fieldset >
		 		<legend><b>Data pemohon</b></legend>
			 <table>
                <input size="40" type="hidden" name="batas" id="batas" readonly="readonly" />
				<tr>
			 		<td width="200px">Desa/Kelurahan </td> 
			 		<td> : <input size="40" type="text" name="desa" id="desa" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td >Kecamatan</td> 
			 		<td> : <input type="text" name="kecamatan" id="kecamatan" /></td></td>
			 	</tr>
			 	 
		 </table>
			 
			</fieldset>
		   
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 