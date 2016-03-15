<div id="dlg" class="easyui-dialog" style="width:600px;height:250px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_tanah_perkebunan" id="id_tanah_perkebunan" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Tanah Perkebunan </td> 
			 		<td> : <input size="40" type="text" name="tanah_perkebunan" id="tanah_perkebunan" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Nilai (ha/m&#178;)</td> 
			 		<td> : <input size="40" type="text" name="nilai" id="nilai" /></td>
			 	</tr>		 		 	 
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 