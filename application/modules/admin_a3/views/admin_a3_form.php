<div id="dlg" class="easyui-dialog" style="width:900px;height:500px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="title">Data Inventaris </div>
		<form id="fm" method="post" novalidate>			 
			<input type="hidden" name="id" id="id" />
		 	<fieldset >
 		  <legend><b>Data Inventaris</b></legend>
			 <table width="714">
				
				<tr>
			 		<td width="194">Jenis Inventaris / Barang</td> 
			 		<td width="508"> : <input size="40" type="text" name="jenis_inventaris" id="jenis_inventaris" /></td>
			 	</tr>		 		 
			 	<tr>
			 	  <td colspan="2" ><strong>Asal Barang</strong></td>
		 	   </tr>
			 	<tr>
			 		<td >Jumlah Dibeli Sendiri</td> 
			 		<td> : <input type="text" name="asal_sendiri" id="asal_sendiri" /></td> 
			 	</tr>
			 	<tr>
			 		<td > Jumlah Bantuan Pemerintah</td> 
			 		<td> : <input type="text" name="asal_pemerintah" id="asal_pemerintah" /></td> 
			 	</tr>
			 	<tr>
			 		<td >Jumlah Sumbangan</td> 
			 		<td> : <input type="text" name="asal_sumbangan" id="asal_sumbangan" /></td> 
			 	</tr>
			 	<tr>
			 	  <td colspan="2" ><strong>Keadaan Awal Tahun </strong></td>
		 	   </tr>
			 	<tr>
			 		<td >Baik</td> 
			 		<td> : <input type="text" name="awal_tahun_baik" id="awal_tahun_baik" /></td> 
			 	</tr>
			 	 	<tr>
			 		<td >Rusak</td> 
			 		<td> : 
			 		  <input type="text" name="awal_tahun_rusak" id="awal_tahun_rusak" /></td> 
			 	</tr>
		 	    <tr>
			 	      <td colspan="2" ><strong>Penghapusan</strong></td>
	 	       </tr>
		 	    <tr>
			 		<td >Jumlah Rusak</td> 
			 		<td> : <input type="text" name="hapus_rusak" id="hapus_rusak" /></td> 
			 	</tr>
			 	<tr>
			 	  <td >Jumlah Dijual</td>
			 	  <td>: 
		 	      <input type="text" name="hapus_jual" id="hapus_jual" /></td>
		 	   </tr>
			 	<tr>
			 	  <td >Jumlah Disumbangkan </td>
			 	  <td>: 
		 	      <input type="text" name="hapus_sumbang" id="hapus_sumbang" /></td>
		 	   </tr>
			 	<tr>
			 	  <td >Tanggal</td>
			 	  <td>: 
		 	      <input type="text" name="hapus_tanggal" id="hapus_tanggal" /></td>
		 	   </tr>
			 	<tr>
			 	  <td colspan="2" ><strong>Keadaan Akhir Tahun</strong></td>
		 	   </tr>
			 	<tr>
			 	  <td >Baik</td>
			 	  <td>: 
		 	      <input type="text" name="akhir_tahun_baik" id="akhir_tahun_baik" /></td>
		 	   </tr>
			 	<tr>
			 	  <td >Rusak</td>
			 	  <td>: 
		 	      <input type="text" name="akhir_tahun_rusak" id="akhir_tahun_rusak" /></td>
		 	   </tr>
			 	<tr>
			 		<td > Keterangan  </td> 
			 		<td> : <input size="40" type="text" name="keterangan" id="keterangan" /></td> 
			 	</tr>
		 </table>
			 
			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 