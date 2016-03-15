<div id="dlg" class="easyui-dialog" style="width:900px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="title">Data Aparat </div>
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Biodata</b></legend>
			 <table>
				
				<tr>
			 		<td width="200px">NIP  </td> 
			 		<td> : <input size="40" type="text" name="nip" id="nip" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td > NIAP </td> 
			 		<td> : <input type="text" name="niap" id="niap" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Nama </td> 
			 		<td> : <input type="text" name="nama" id="nama" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Jenis Kelamin</td> 
			 		<td> : <?php echo form_dropdown("jk",$this->cm->arr_jk,'','id="jk"') ?> </td></td>
			 	</tr>
			 	<tr>
			 		<td > Tempat Lahir </td> 
			 		<td> : <input type="text" name="tmp_lahir" id="tmp_lahir" /></td></td>
			 	</tr>
			 	 	<tr>
			 		<td > Tanggal Lahir </td> 
			 		<td> : <input type="text" name="tgl_lahir" id="tgl_lahir" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Agama </td> 
			 		<td> : <?php echo form_dropdown("id_agama",$this->cm->arr_agama(),'','id="id_agama"') ?>  </td></td>
			 	</tr>
			 	<tr>
			 		<td > Pendidikan  </td> 
			 		<td> : <?php echo form_dropdown("id_pendidikan",$this->cm->arr_pendidikan(),'','id="id_pendidikan"') ?></td></td>
			 	</tr>
			 	<tr>
			 		<td > Pangkat  </td> 
			 		<td> : <input type="text" name="pangkat" id="pangkat" /></td></td>
			 	</tr>
				<tr>
			 		<td > Jabatan  </td> 
			 		<td> : <input type="text" name="jabatan" id="jabatan" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Tanggal Pengangkatan   </td> 
			 		<td> : <input type="text" name="pengangkatan_tgl" id="pengangkatan_tgl" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Nomor Pengangkatan   </td> 
			 		<td> : <input type="text" name="pengangkatan_no" id="pengangkatan_no" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Tanggal Pemberhentian   </td> 
			 		<td> : <input type="text" name="berhenti_tgl" id="berhenti_tgl" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Nomor Pemberhentian   </td> 
			 		<td> : <input type="text" name="berhenti_no" id="berhenti_no" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Keterangan   </td> 
			 		<td> : <input size="40" type="text" name="keterangan" id="keterangan" /></td></td>
			 	</tr>
		 </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 