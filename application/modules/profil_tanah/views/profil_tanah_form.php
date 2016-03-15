<div id="dlg" class="easyui-dialog" style="width:900px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="title">Data Tanah Milik Desa / Kelurahan </div>
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data Tanah</b></legend>
			 <table>
				
				<tr>
			 		<td width="200px">Tanggal  </td> 
			 		<td> : <input  type="text" name="tanggal" id="tanggal" /></td>
			 	</tr>		 		 
			 	<tr>
			 		<td > Asal tanah  </td> 
			 		<td> : <input size="40" type="text" name="asal" id="asal" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > No. Sertifikat  / Persil / Letter C </td> 
			 		<td> : <input type="text" name="no_sertifikat" id="no_sertifikat" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Luas </td> 
			 		<td> : <input size="5" type="text" name="luas" id="luas" />m<sup>2</sup></td></td>
			 	</tr>
			 	<tr>
			 		<td > Kelas </td> 
			 		<td> : <input size="5" type="text" name="kelas" id="kelas" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > TKD diperoleh dari </td> 
			 		<td> : <?php echo form_dropdown("tkd_id",$this->cm->arr_tkd(),'','id="tkd_id"') ?> </td></td>
			 	</tr>
			 	<tr>
			 		<td > TKD diperoleh Tanggal  </td> 
			 		<td> : <input type="text" name="tkd_tgl" id="tkd_tgl" /></td></td>
			 	</tr>
			 	 	<tr>
			 		<td > Jenis TKD</td> 
			 		<td> : <?php echo form_dropdown("tkd_id_jenis",$this->cm->arr_jenis_tkd(),'','id="tkd_id_jenis"') ?> </td></td>
			 	</tr>
			 	<tr>
			 		<td > Patok </td> 
			 		<td> : <?php echo form_dropdown("patok",$this->cm->arr_ada,'','id="patok"') ?>  </td></td>
			 	</tr>
			 	<tr>
			 		<td > Papan Nama  </td> 
			 		<td> : <?php echo form_dropdown("papan_nama",$this->cm->arr_ada,'','id="papan_nama"') ?></td></td>
			 	</tr>
			 	<tr>
			 		<td > Lokasi  </td> 
			 		<td> : <input size="40" type="text" name="lokasi" id="lokasi" /></td></td>
			 	</tr>
				<tr>
			 		<td > Peruntukan  </td> 
			 		<td> : <input size="40" type="text" name="peruntukan" id="peruntukan" /></td></td>
			 	</tr>
			 	 
		 </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 