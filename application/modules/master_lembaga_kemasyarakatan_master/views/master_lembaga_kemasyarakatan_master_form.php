<div id="dlg" class="easyui-dialog" style="width:600px;height:400px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<!--<div class="title">Penambahan data hubungan keluarga</div>-->
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id_lembaga_kemasyarakatan_master" id="id_lembaga_kemasyarakatan_master" />
		 	<fieldset >
			 <table>
				
				<tr>
			 		<td width="200px">Lembaga kemasyarakatan </td> 
			 		<td> : <input size="40" type="text" name="lembaga" id="lembaga" /></td>
			 	</tr>
                 <tr>
			 		<td width="200px">Urutan/Order </td> 
			 		<td> : <input size="40" type="text" name="order" id="order" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Jumlah unit organisasi </td> 
			 		<td> : <input size="40" type="text" name="unit" id="unit" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Ada/Tidak ada</td> 
			 		<td> : <?php echo form_dropdown("ket1", array("0"=>"Kosong","1"=>"Ada","2"=>"Tidak ada"),'','id="ket1"'); ?></td>
			 	</tr>
                 <tr>
			 		<td width="200px">Aktif/Tidak aktif</td> 
			 		<td> : <?php echo form_dropdown("ket2", array("0"=>"Kosong","1"=>"Aktif","2"=>"Tidak aktif"),'','id="ket2"'); ?></td>
			 	</tr>
                <tr>
			 		<td width="200px">Dasar hukum pembentukan </td> 
			 		<td> : <input size="40" type="text" name="hukum" id="hukum" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td width="200px">Alamat kantor </td> 
			 		<td> : <input size="40" type="text" name="alamat" id="alamat" /></td>
			 	</tr>
                <tr>
			 		<td width="200px">Ruang lingkup kegiatan (Jenis) </td> 
			 		<td> : <input size="40" type="text" name="jenis" id="jenis" /></td>
			 	</tr>
                 <tr>
			 		<td width="200px">Ruang lingkup kegiatan (Yakni) </td> 
			 		<td> : <input size="40" type="text" name="yakni" id="yakni" /></td>
			 	</tr>
		 </table>
			 
			</fieldset>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 