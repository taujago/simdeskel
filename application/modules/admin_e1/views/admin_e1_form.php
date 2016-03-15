<div id="dlg" class="easyui-dialog" style="width:900px;height:600px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data anggota badan permusyawaratan desa</b></legend>
			 <table>
				
				<tr>
			 		<td width="200px">Nama Lengkap  </td> 
			 		<td> : <input type="text" name="nama" id="nama" /></td>
			 	</tr>
				<tr>
			 		<td width="200px">Tanggal datang  </td> 
			 		<td> : <input type="text" name="tanggal" id="tanggal" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td>Jenis kelamin </td> 
			 		<td> : <input type="text" name="jenis_kelamin" id="jenis_kelamin" /></td></td>
			 	</tr>
			 	<tr>
			 		<td>Tempat lahir </td> 
			 		<td> : <input type="text" name="tempat_lahir" id="tempat_lahir" /></td></td>
			 	</tr>
			 	<tr>
			 		<td>Tanggal lahir </td> 
			 		<td> : <input type="text" name="tanggal_lahir" id="tanggal_lahir" /></td></td>
			 	</tr>
			 	<tr>
			 		<td >Agama </td> 
			 		<td> : <input type="text" name="agama" id="agama" /></td></td>
			 	</tr>
			 	 	<tr>
			 		<td > Jabatan </td> 
			 		<td> : <input type="text" name="jabatan" id="jabatan" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Pendidikan terakhir </td> 
			 		<td> : <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Tanggal pengangkatan  </td> 
			 		<td> : <input type="text" name="tanggal_pengangkatan" id="tanggal_pengangkatan" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Nomor pengangkatan  </td> 
			 		<td> : <input name="nomor_pengangkatan" id="nomor_pengangkatan"/></td></td>
			 	</tr>
				<tr>
			 		<td > Tanggal pemberhentian  </td> 
			 		<td> : <input type="text" name="tanggal_pemberhentian" id="tanggal_pemberhentian" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Nomor pemberhentian  </td> 
			 		<td> : <input name="nomor_pemberhentian" id="nomor_pemberhentian"/></td></td>
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
	 