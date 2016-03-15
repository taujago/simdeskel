<div id="dlg" class="easyui-dialog" style="width:900px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
  <form id="fm" method="post" novalidate>			 
<input type="hidden" name="id" id="id" />
		 	<fieldset >
    <legend><b>Data Tanah Milik <?php echo strtoupper($desa2->bentuk_lembaga) ?> / Kas <?php echo strtoupper($desa2->bentuk_lembaga) ?></b></legend>
			 <table width="714">
				
				<tr>
			 		<td width="279">Asal Tanah Milik Desa </td> 
			 		<td width="423"> : <input size="40" type="text" name="asal_tanah" id="asal_tanah" /></td>
			 	</tr>
				<tr>
				  <td>Nomor Sertifikat / Buku Letter C / Persil</td>
				  <td>: 
			      <input size="40" type="text" name="nomor_sertifikat" id="nomor_sertifikat" /></td>
			   </tr>
				<tr>
				  <td>Luas (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="luas" id="luas" /></td>
			   </tr>
				<tr>
				  <td>Kelas </td>
				  <td>: 
			      <input type="text" name="kelas_tanah" id="kelas_tanah" /></td>
			   </tr>
				<tr>
				  <td colspan="2"><strong>Luas Perolehan TKD</strong></td>
			   </tr>
				<tr>
				  <td>Biaya  Desa (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="luas_biaya_desa" id="luas_biaya_desa" /></td>
			   </tr>
				<tr>
				  <td>Bantuan Pemerintah (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="luas_biaya_pemerintah" id="luas_biaya_pemerintah" /></td>
			   </tr>
				<tr>
				  <td>Bantuan Pemerintah Provinsi (Ha) </td>
				  <td>:			      
			      <input size="5" type="text" name="luas_biaya_pemprov" id="luas_biaya_pemprov" /></td>
			   </tr>
				<tr>
				  <td>Bantuan Pemerintah Kabupaten / Kota (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="luas_biaya_pemkab" id="luas_biaya_pemkab" /></td>
			   </tr>
				<tr>
				  <td>Bantuan Lainnya (Ha)</td>
				  <td>: 
				    <input size="5" type="text" name="luas_biaya_lainnya" id="luas_biaya_lainnya" /></td>
			   </tr>
				<tr>
				  <td>Tanggal Perolehan </td>
				  <td>:			      
			      <input type="text" name="tanggal_perolehan" id="tanggal_perolehan" /></td>
			   </tr>
				<tr>
				  <td colspan="2"><strong>Luas Jenis Tanah </strong></td>
			   </tr>
				<tr>
				  <td>Sawah (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="jenis_sawah" id="jenis_sawah" /></td>
			   </tr>
				<tr>
				  <td>Tegalan (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="jenis_tegalan" id="jenis_tegalan" /></td>
			   </tr>
				<tr>
				  <td>Kebun (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="jenis_kebun" id="jenis_kebun" /></td>
			   </tr>
				<tr>
				  <td>Tambak / Kolam (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="jenis_kolam" id="jenis_kolam" /></td>
			   </tr>
				<tr>
				  <td>Tanah Kering (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="jenis_tanah_kering" id="jenis_tanah_kering" /></td>
			   </tr>
				<tr>
				  <td colspan="2"><strong>Patok Tanda Batas </strong></td>
			   </tr>
				<tr>
				  <td>Ada (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="tanda_ada" id="tanda_ada" /></td>
			   </tr>
				<tr>
				  <td>Tidak Ada (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="tanda_tidak_ada" id="tanda_tidak_ada" /></td>
			   </tr>
				<tr>
				  <td colspan="2"><strong>Papan Nama </strong></td>
			   </tr>
				<tr>
				  <td>Ada (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="papan_nama_ada" id="papan_nama_ada" /></td>
			   </tr>
				<tr>
				  <td>Tidak Ada (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="papan_nama_tidak_ada" id="papan_nama_tidak_ada" /></td>
			   </tr>
				<tr>
				  <td>Lokasi</td>
				  <td>: 
			      <input name="lokasi" type="text" id="lokasi" size="60" /></td>
			   </tr>
				<tr>
				  <td>Peruntukan</td>
				  <td>: 
			      <input name="peruntukan" type="text" id="peruntukan" size="60" /></td>
			   </tr>
				<tr>
				  <td>Keterangan</td>
				  <td>: 
			      <input name="keterangan" type="text" id="keterangan" size="60" /></td>
			   </tr>
          </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 