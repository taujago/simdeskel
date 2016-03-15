<div id="dlg" class="easyui-dialog" style="width:600px;height:300px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Rekening Bank Perusahaan</div>
		<form id="fm" method="post" novalidate>
			
			 <table>
			 	<tr><td>Nama Bank </td><td><input type="text" name="nama_bank" id="nama_bank" size="30" /></td></tr>
			 	<tr><td>Nomor Rekening  </td><td><input type="text" name="no_rekening" id="no_rekening" size="30" /></td></tr>
			 	<tr><td>Atas Nama </td><td><input type="text" name="atas_nama" id="atas_nama" size="30" /></td></tr>
			 	<tr><td>Kantor Cabang </td><td><input type="text" name="kantor_cabang" id="kantor_cabang" size="30" />
			 		<input type="hidden" name="id_bank" id="id_bank" />	
			 	</td></tr>
			 </table>
			 
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 
	