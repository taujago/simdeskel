<div id="dlg" class="easyui-dialog" style="width:900px;height:600px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="title">Data Inventaris </div>
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
		 		<legend><b>Data Inventaris</b></legend>
			 <table>
				
				 	 		 
			 	<tr>
			 		<td width="200px;" > Barang / Bangunan </td> 
			 		<td> : <input size="40" type="text" name="barang" id="barang" /></td></td>
			 	</tr>
			 	<tr>
			 		<td width="200px;" > Tanggal</td> 
			 		<td> : <input type="text" name="tanggal" id="tanggal" /></td></td>
			 	</tr>
			 		<tr>
			 		<td > Keterangan   </td> 
			 		<td> : <textarea name="keterangan" id="keterangan"></textarea></td></td>
			 	</tr>
			 </table>
			</fieldset>
			<fieldset>
				<legend>Asal Barang / Bangunan</legend>
				<table>
			 	<tr>
			 		<td  width="200px;" > Beli sendiri </td> 
			 		<td> : <input size="5" type="text" name="asal_sendiri" id="asal_sendiri" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Bantuan Pemerintah </td> 
			 		<td> : <input size="5" type="text" name="asal_pemerintah" id="asal_pemerintah" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Bantuan Provinsi </td> 
			 		<td> : <input size="5" type="text" name="asal_provinsi" id="asal_provinsi" /></td></td>
			 	</tr>
			 	 	<tr>
			 		<td > Bantuan Pemkab / Pemda </td> 
			 		<td> : <input size="5" type="text" name="asal_pemda" id="asal_pemda" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Sumbangan </td> 
			 		<td> : <input size="5" type="text" name="asal_sumbangan" id="asal_sumbangan" /></td></td>
			 	</tr> </table>
			</fieldset> 
		<fieldset>
			<legend>Kondisi Barang / bangunan </legend>
		<table>
		 	<tr>
			 		<td  width="200px;" > Baik  </td> 
			 		<td> : <input size="5"   type="text" name="kondisi_baik" id="kondisi_baik" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Rusak  </td> 
			 		<td> : <input size="5"   type="text" name="kondisi_rusak" id="kondisi_rusak" /></td></td>
			 	</tr>
		 </table>
		</fieldset>		 
		
<fieldset>
			<legend>Penghapusan Barang / bangunan </legend>
		<table>
		 	<tr>
			 		<td  width="200px;" > Dijual  </td> 
			 		<td> : <input  size="5"  type="text" name="hapus_dijual" id="hapus_dijual" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Disumbangkan  </td> 
			 		<td> : <input size="5"   type="text" name="hapus_disumbangkan" id="hapus_disumbangkan" /></textarea></td></td>
			 	</tr>
		<tr>
			 		<td > Tanggal   </td> 
			 		<td> : <input    type="text" name="hapus_tanggal" id="hapus_tanggal" /></td></td>
			 	</tr>
		 </table>
		</fieldset>		
<fieldset>
			<legend>Kondisi akhir tahun </legend>
		<table>
		 	<tr>
			 		<td  width="200px;" > Baik  </td> 
			 		<td> : <input size="5"  type="text" name="kondisi_akhir_tahun_baik" id="kondisi_akhir_tahun_baik" /></td></td>
			 	</tr>
			 	<tr>
			 		<td > Rusak  </td> 
			 		<td> : <input size="5"  type="text" name="kondisi_akhir_tahun_rusak" id="kondisi_akhir_tahun_rusak" /></td></td>
			 	</tr>
			
		 </table>
		</fieldset>	
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 