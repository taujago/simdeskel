<div id="dlg" class="easyui-dialog" style="width:900px;height:520px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data agenda BPD</b></legend>
			 <table>
				
				<tr>
			 		<td>Tanggal  </td> 
			 		<td> : <input type="text" name="tanggal" id="tanggal" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td>Nomor surat masuk </td> 
			 		<td> : <input type="text" name="nomor_surat_masuk" id="nomor_surat_masuk" /></td></td>
			 	</tr>
			 	<tr>
			 		<td>Tanggal surat masuk </td> 
			 		<td> : <input type="text" name="tanggal_surat_masuk" id="tanggal_surat_masuk" /></td></td>
			 	</tr>
				<tr>
			 		<td>Pengirim surat masuk </td> 
			 		<td> : <input type="text" name="pengirim_surat_masuk" id="pengirim_surat_masuk" /></td></td>
			 	</tr>
			 	<tr>
			 		<td>Isi singkat surat masuk </td> 
			 		<td> : <textarea name="isi_surat_masuk" id="isi_surat_masuk"></textarea></td></td>
			 	</tr>
			 	<tr>
			 		<td >Isi singkat surat keluar </td> 
			 		<td> : <textarea name="isi_surat_keluar" id="isi_surat_keluar"></textarea></td></td>
			 	</tr>
			 	 	<tr>
			 		<td > Tanggal surat keluar </td> 
			 		<td> : <input type="text" name="tanggal_surat_keluar" id="tanggal_surat_keluar" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Tujuan surat keluar  </td> 
			 		<td> : <input type="text" name="tujuan" id="tujuan" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Keterangan  </td> 
			 		<td> : <textarea name="ket" id="ket"></textarea></td></td>
			 	</tr>
				
		 </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 