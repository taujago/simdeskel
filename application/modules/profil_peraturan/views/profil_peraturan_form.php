<div id="dlg" class="easyui-dialog" style="width:900px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="title">Data Peraturan </div>
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data Peraturan</b></legend>
			 <table>
				
				<tr>
			 		<td width="200px">Nomor  </td> 
			 		<td> : <input size="40" type="text" name="nomor" id="nomor" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td > Tanggal </td> 
			 		<td> : <input type="text" name="tanggal" id="tanggal" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Tentang </td> 
			 		<td> : <input type="text" name="tentang" id="tentang" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > No. Persetujuan BPD </td> 
			 		<td> : <input type="text" name="persetujuan_bpd_no" id="persetujuan_bpd_no" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Tanggal Persetujuan BPD </td> 
			 		<td> : <input type="text" name="persetujuan_bpd_tgl" id="persetujuan_bpd_tgl" /></td></td>
			 	</tr>
			 	 	<tr>
			 		<td > Nomor dilaporkan </td> 
			 		<td> : <input type="text" name="dilaporkan_no" id="dilaporkan_no" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Tanggal dilaporkan </td> 
			 		<td> : <input type="text" name="dilaporkan_tgl" id="dilaporkan_tgl" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Keterangan  </td> 
			 		<td> : <input size="40" type="text" name="keterangan" id="keterangan" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Uraian Singkat  </td> 
			 		<td> : <textarea name="uraian" id="uraian"></textarea></td></td>
			 	</tr>
		 </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 