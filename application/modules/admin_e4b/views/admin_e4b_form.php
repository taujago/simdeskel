<div id="dlg" class="easyui-dialog" style="width:900px;height:430px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data keputusan BPD</b></legend>
			 <table>
				<tr>
			 		<td width="200px">Tanggal pengiriman </td> 
			 		<td> : <input type="text" name="tanggal" id="tanggal" /></td>
			 	</tr>
				<tr>
			 		<td width="200px">Tanggal surat  </td> 
			 		<td> : <input type="text" name="tanggal_surat" id="tanggal_surat" /></td>
			 	</tr>
				<tr>
			 		<td width="200px">Nomor surat  </td> 
			 		<td> : <input type="text" name="no_surat" id="no_surat" /></td>
			 	</tr>
				<tr>
			 		<td>Tujuan surat </td> 
			 		<td> : <input type="text" name="tujuan" id="tujuan" /></td></td>
			 	</tr>
			 	<tr>
			 		<td>Isi singkat surat </td> 
			 		<td> : <textarea name="isi" id="isi"></textarea></td></td>
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
	 