<div id="dlg" class="easyui-dialog" style="width:900px;height:400px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data kegiatan BPD</b></legend>
			 <table>
				<tr>
			 		<td width="200px">Tentang </td> 
			 		<td> : <input type="text" name="tentang" id="tentang" /></td>
			 	</tr>
				<tr>
			 		<td width="200px">Tanggal  </td> 
			 		<td> : <input type="text" name="tanggal" id="tanggal" /></td>
			 	</tr>
				<tr>
			 		<td width="200px">Pelaksana  </td> 
			 		<td> : <input type="text" name="pelaksana" id="pelaksana" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td>Pokok-pokok kegiatan </td> 
			 		<td> : <input type="text" name="pokok" id="pokok" /></td></td>
			 	</tr>
			 	<tr>
			 		<td>Hasil kegiatan </td> 
			 		<td> : <textarea name="hasil" id="hasil" ></textarea></td></td>
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
	 