<div id="dlg" class="easyui-dialog" style="width:900px;height:400px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data keputusan BPD</b></legend>
			 <table>
				<tr>
			 		<td width="200px">Tanggal keputusan  </td> 
			 		<td> : <input type="text" name="tanggal_keputusan" id="tanggal_keputusan" /></td>
			 	</tr>
				<tr>
			 		<td width="200px">Nomor keputusan  </td> 
			 		<td> : <input type="text" name="nomor_keputusan" id="nomor_keputusan" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td>Tentang </td> 
			 		<td> : <input type="text" name="tentang" id="tentang" /></td></td>
			 	</tr>
			 	<tr>
			 		<td>Uraian singkat </td> 
			 		<td> : <textarea name="uraian_singkat" id="uraian_singkat" ></textarea></td></td>
			 	</tr>
			 	<tr>
			 		<td>Keterangan </td> 
			 		<td> : <textarea name="ket" id="ket"></textarea></td></td>
			 	</tr>
		 </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 