<div id="dlg" class="easyui-dialog" style="width:900px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
  <form id="fm" method="post" novalidate>			 
<input type="hidden" name="id" id="id" />
		 	<fieldset >
    <legend><b>Data Tanah Di <?php echo strtoupper($desa2->bentuk_lembaga) ?></b>			 </legend>
    <table width="714">
				
<tr>
			 		<td width="279">Nama Pemilik</td> 
			 		<td width="423"> : <input size="40" type="text" name="nama_pemilik" id="nama_pemilik" /></td>
 	  </tr>
				<tr>
				  <td>Luas (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="luas" id="luas" /></td>
			   </tr>
				<tr>
				  <td colspan="2"><strong>Sertifikat </strong></td>
			   </tr>
				<tr>
				  <td>Hak Milik  - SHM  (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="luas_sertifikat_hm" id="luas_sertifikat_hm" /></td>
			   </tr>
				<tr>
				  <td>Hak Guna Bangunan (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="luas_sertifikat_hgb" id="luas_sertifikat_hgb" /></td>
			   </tr>
				<tr>
				  <td>Hak Pakai - HP (Ha) </td>
				  <td>:			      
			      <input size="5" type="text" name="luas_sertifikat_hp" id="luas_sertifikat_hp" /></td>
			   </tr>
				<tr>
				  <td>Hak Guna Usaha - HGU (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="luas_sertifikat_hgu" id="luas_sertifikat_hgu" /></td>
			   </tr>
				<tr>
				  <td>Hak Pengelolaan - HPL (Ha)</td>
				  <td>: 
				    <input size="5" type="text" name="luas_sertifikat_hpl" id="luas_sertifikat_hpl" /></td>
			   </tr>
               <tr>
                  <td colspan="2"><strong>Belum Bersertifikat </strong></td>
      </tr>
               <tr>
				  <td>Milik Adat  - MA (Ha)</td>
				  <td>: 
				    <input size="5" type="text" name="luas_sertifikat_ma" id="luas_sertifikat_ma" /></td>
			   </tr>
               <tr>
				  <td>Verponding Indonesia - VI (Ha)</td>
				  <td>: 
				    <input size="5" type="text" name="luas_sertifikat_vi" id="luas_sertifikat_vi" /></td>
			   </tr>
               <tr>
				  <td>Tanah Negara  - TN (Ha)</td>
				  <td>: 
				    <input size="5" type="text" name="luas_sertifikat_tn" id="luas_sertifikat_tn" /></td>
			   </tr>
				<tr>
				  <td colspan="2"><strong>Luas Penggunaan Lahan Non Pertanian </strong></td>
			   </tr>
				<tr>
				  <td>Perumahan  (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="non_pertanian_perumahan" id="non_pertanian_perumahan" /></td>
			   </tr>
				<tr>
				  <td>Perdagangan (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="non_pertanian_perdagangan" id="non_pertanian_perdagangan" /></td>
			   </tr>
				<tr>
				  <td>Perkantoran  (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="non_pertanian_perkantoran" id="non_pertanian_perkantoran" /></td>
			   </tr>
				<tr>
				  <td>Industri (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="non_pertanian_industri" id="non_pertanian_industri" /></td>
			   </tr>
				<tr>
				  <td>Fasilitas Umu (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="non_pertanian_fasilitas_umum" id="non_pertanian_fasilitas_umum" /></td>
			   </tr>
				<tr>
				  <td colspan="2"><strong>Luas Penggunaan Lahan Pertanian </strong></td>
			   </tr>
				<tr>
				  <td>Sawah  (Ha) </td>
				  <td>: 
			      <input size="5" type="text" name="pertanian_sawah" id="pertanian_sawah" /></td>
			   </tr>
				<tr>
				  <td>Tegalan  (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="pertanian_tegalan" id="pertanian_tegalan" /></td>
			   </tr>
               <tr>
				  <td>Perkebunan  (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="pertanian_perkebunan" id="pertanian_perkebunan" /></td>
			   </tr>
               <tr>
				  <td>Peternakan / Perikanan   (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="pertanian_peternakan" id="pertanian_peternakan" /></td>
			   </tr>
               <tr>
				  <td>Hutan Belukar   (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="pertanian_hutan" id="pertanian_hutan" /></td>
			   </tr>
               <tr>
				  <td>Hutan Lindung   (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="pertanian_hutan_lindung" id="pertanian_hutan_lindung" /></td>
			   </tr>
               <tr>
				  <td>Tanah Kosong   (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="pertanian_tanah_kosong" id="pertanian_tanah_kosong" /></td>
			   </tr>
               <tr>
				  <td>Lain - lainnya   (Ha)</td>
				  <td>: 
			      <input size="5" type="text" name="pertanian_lain" id="pertanian_lain" /></td>
			   </tr>
          </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 