<div id="dlg" class="easyui-dialog" style="width:600px;height:400px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_partai_politik" id="id_partai_politik" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Partai Politik </td> 
			 		<td> : <input size="40" type="text" name="partai_politik" id="partai_politik" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Jumlah partai politik lokal</td> 
			 		<td> : <input size="40" type="text" name="lokal" id="lokal" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Jumlah partai politik nasional</td> 
			 		<td> : <input size="40" type="text" name="nasional" id="nasional" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Jumlah pemilih pada pemilu terakhir (orang)</td> 
			 		<td> : <input size="40" type="text" name="pemilih" id="pemilih" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Alamat sekretariat </td> 
			 		<td> : <input size="40" type="text" name="alamat" id="alamat" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Dasar hukum pembentukan </td> 
			 		<td> : <input size="40" type="text" name="hukum" id="hukum" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Ruang lingkup kegiatan (Jenis) </td> 
			 		<td> : <input size="40" type="text" name="jenis" id="jenis" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Ruang lingkup kegiatan (Yakni) </td> 
			 		<td> : <input size="40" type="text" name="yakni" id="yakni" /></td>
			 	</tr>	
                 <tr>
			 		<td width="200px">Organisasi underbow </td> 
			 		<td> : <input size="40" type="text" name="underbow" id="underbow" /></td>
			 	</tr>		 		 
			 	 
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 