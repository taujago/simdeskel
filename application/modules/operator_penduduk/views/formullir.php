
<!--  ADD NEW SECTION  -->
<div class="form-container" id="dialog-form" title="Tambah data penduduk" style="display:none">
	<p class="validateTips"></p>

	<form id="frm" action="" enctype="multipart/form-data">
	<fieldset>
	<legend>Biodata</legend>

		<table border="0" width="100%" > 
		<tr><td width="200px">NIK   </td>
		<td>: <input type="text" name="nik" id="nik" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td >Nama   </td>
		<td>: <input size="40" type="text" name="nama" id="nama" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td>Tempat Lahir   </td>
		<td>: <input type="text" name="tmp_lahir" id="tmp_lahir" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td>Tanggal Lahir   </td>
		<td>: <input type="text" name="tgl_lahir" id="tgl_lahir" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td>Jenis Kelamin   </td>
		<td>: <?php echo form_dropdown("jk",$arr_jk,'','id="jk"');?></td></tr>
		
		<tr><td>Golongan Darah   </td>
		<td>: <?php echo form_dropdown("golongan_darah",$arr_golongan_darah,'','id="golongan_darah"');?></td></tr>
		<tr><td >Kewarganegaraan   </td>
		<td>: <?php echo form_dropdown("warga_negara",$arr_warga_negara,'','id="warga_negara"');?></td></tr>
		<tr><td>Agama   </td>
		<td>: <?php echo form_dropdown("id_agama",$arr_agama,'','id="id_agama"');?></td></tr>
		<tr><td >Pekerjaan   </td>
		<td>:  <input type="text" name="pekerjaan" id="pekerjaan" class="text ui-widget-content ui-corner-all"  />
			<input type="hidden" name="id_pekerjaan" id="id_pekerjaan" class="text ui-widget-content ui-corner-all"  />
		 </td></tr>
		<tr><td >Status perkawinan   </td>
		<td>: <?php echo form_dropdown("status_kawin",$arr_status_kawin,'','id="status_kawin"');?></td></tr>
		<tr><td>Cacat fisik   </td>
		<td>: <input type="text" name="cacat_fisik" id="cacat_fisik" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td >Pendidikan   </td>
		<td>: <?php echo form_dropdown("id_pendidikan",$arr_pendidikan,'','id="id_pendidikan"');?></td></tr>
		<tr><td >Foto   </td>
		<td>: <input type="file" name="foto" id="foto" > </td></tr>
		
		</table>
		</fieldset>

<fieldset><legend>Biodata Orangtua</legend>
<b>PERHATIAN : </b> <br /> 
Kosongkan bagian ini jika data orangtua akan diambil dari kartu keluarga. <br />
Silahkan isi data kartu keluarga setelah mengisi biodata ini  <hr />
<table border="0" width="100%" > 
<tr><td   width="200px">NIK Ayah  </td>
		<td>: <input type="text" name="nik_ayah" id="nik_ayah" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
<tr><td   width="200px">Nama Ayah  </td>
		<td>: <input type="text" name="nama_ayah" id="nama_ayah" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
		
<tr><td   width="200px">NIK Ibu</td>
		<td>: <input type="text" name="nik_ibu" id="nik_ibu" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
		
<tr><td   width="200px">Nama Ibu</td>
		<td>: <input type="text" name="nama_ibu" id="nama_ibu" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
</table>
</fieldset>
		
		
		<fieldset>
		<legend>Alamat Sekarang </legend>
		<table border="0" width="100%" > 
		<tr><td width="200px">Alamat   </td>
		<td>:  <textarea name="alamat" id="alamat" class="text ui-widget-content ui-corner-all" ></textarea> </td></tr>
		
		<tr><td>Dusun  </td>
		<td>: <input type="text" name="dusun" id="dusun" class="text ui-widget-content ui-corner-all"  />
		<input type="hidden" name="id_dusun" id="id_dusun" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
		
		
		<tr><td>RT/RW   </td>
		<td>: <input size="5" type="text" name="rt" id="rt" class="text ui-widget-content ui-corner-all"  />
		<input size="5" type="text" name="rw" id="rw" class="text ui-widget-content ui-corner-all"  /></td></tr>
		</table>
		
		</fieldset>
		
		
		<fieldset>
		<legend>Alamat Sebelumnya </legend>
		<table border="0" width="100%" > 
		<tr><td width="200px">Alamat   </td>
		<td>:  <textarea name="alamat_sebelumnya" id="alamat_sebelumnya" class="text ui-widget-content ui-corner-all" ></textarea> </td></tr>
		
		<tr><td >Provinsi  </td>
		<td>: <?php 
		$js='onchange="get_dropdownkabupaten();" id="id_provinsi"';
		echo form_dropdown("id_provinsi",$arr_provinsi,'',$js); ?></td></tr>
		<tr><td >Kabupaten  </td>
		<td>: 
			<select name="id_kabupaten" id="id_kabupaten" onchange="get_dropdownkota()">
			<option value="x">- Kabupaten - </option>
			</select>
		</td></tr>
		
		
		<tr><td >Kecamatan  </td>
		<td>: 
			<select name="id_kota" id="id_kota">
			
			</select> 
			
			<input type="hidden" id="id_kota2" name="id_kota2" />
		</td></tr>
		
		<tr><td>Desa  </td>
		<td>: <input type="text" name="desa_sebelumnya" id="desa_sebelumnya" class="text ui-widget-content ui-corner-all"  />
		<input type="hidden" name="id_desa_sebelumnya" id="id_desa_sebelumnya" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
				
		
		
		<tr><td>Dusun  </td>
		<td>: 
		<input type="text" name="dusun_sebelumnya" id="dusun_sebelumnya" class="text ui-widget-content ui-corner-all"  />
		<input type="hidden" name="id_dusun_sebelumnya" id="id_dusun_sebelumnya" class="text ui-widget-content ui-corner-all"  />
		
		</td></tr>
		
		<tr><td>RT/RW   </td>
		<td>: <input size="5" type="text" name="rt_sebelumnya" id="rt_sebelumnya" class="text ui-widget-content ui-corner-all"  />
		<input size="5" type="text" name="rw_sebelumnya" id="rw_sebelumnya" class="text ui-widget-content ui-corner-all"  /></td></tr>
		</table>
		
		</fieldset>
		
		
		<fieldset>
		<legend>Kepemilikan dokumen</legend>
		<table border="0" width="100%" > 
		
		<tr><td width="200px">Nomor Passport  </td>
		<td>: <input type="text" name=no_paspor id="no_paspor" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Tanggal Passport  </td>
		<td>: <input type="text" name="tgl_paspor_akhir" id="tgl_paspor_akhir" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Nomor Akta Laihr  </td>
		<td>: <input type="text" name="no_akta_lahir" id="no_akta_lahir" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Nomor Akta Nikah  </td>
		<td>: <input type="text" name="no_akta_nikah" id="no_akta_nikah" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Tanggal Akta Nikah  </td>
		<td>: <input type="text" name="tgl_akta_nikah" id="tgl_akta_nikah" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Nomor Akta Cerai</td>
		<td>: <input type="text" name="no_akta_cerai" id="no_akta_cerai" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Tanggal Akta Cerai  </td>
		<td>: <input type="text" name="tgl_akta_cerai" id="tgl_akta_cerai" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		</table>
		</fieldset>

		
	
	</form>
</div>
<!-- END OF ADD NEW SECTION -->


<!--  EDIT SECTION ================================================================================================================================== -->
<div class="form-container" id="dialog-form-edit" title="Edit data penduduk" style="display:none">
	<p class="validateTips"></p>

	<form id="frm-edit" action="" enctype="multipart/form-data">
	<fieldset>
	<legend>Biodata</legend>

		<table border="0" width="100%" > 
		<tr><td width="200px">NIK   </td>
		<td>: <input readonly="readonly" type="text" name="nik" id="nik_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td >Nama   </td>
		<td>: <input size="40" type="text" name="nama" id="nama_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td>Tempat Lahir   </td>
		<td>: <input type="text" name="tmp_lahir" id="tmp_lahir_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td>Tanggal Lahir   </td>
		<td>: <input type="text" name="tgl_lahir" id="tgl_lahir_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td>Jenis Kelamin   </td>
		<td>: <?php echo form_dropdown("jk",$arr_jk,'','id="jk_edit"');?></td></tr>
		
		<tr><td>Golongan Darah   </td>
		<td>: <?php echo form_dropdown("golongan_darah",$arr_golongan_darah,'','id="golongan_darah_edit"');?></td></tr>
		<tr><td >Kewarganegaraan   </td>
		<td>: <?php echo form_dropdown("warga_negara",$arr_warga_negara,'','id="warga_negara_edit"');?></td></tr>
		<tr><td ">Agama   </td>
		<td>: <?php echo form_dropdown("id_agama",$arr_agama,'','id="id_agama_edit"');?></td></tr>
		<tr><td >Pekerjaan   </td>
		<td>:  <input type="text" name="pekerjaan" id="pekerjaan_edit" class="text ui-widget-content ui-corner-all"  />
			<input type="hidden" name="id_pekerjaan" id="id_pekerjaan_edit" class="text ui-widget-content ui-corner-all"  />
		 </td></tr>
		<tr><td >Status perkawinan   </td>
		<td>: <?php echo form_dropdown("status_kawin",$arr_status_kawin,'','id="status_kawin_edit"');?></td></tr>
		<tr><td>Cacat fisik   </td>
		<td>: <input type="text" name="cacat_fisik" id="cacat_fisik_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td >Pendidikan   </td>
		<td>: <?php echo form_dropdown("id_pendidikan",$arr_pendidikan,'','id="id_pendidikan_edit"');?></td></tr>
		<tr><td >Foto   </td>
		<td>: <input type="file" name="foto" id="foto_edit" > </td></tr>
		
		</table>
		</fieldset>

<fieldset><legend>Biodata Orangtua</legend>

<b>PERHATIAN : </b> <br /> 
Kosongkan bagian ini jika data orangtua akan diambil dari kartu keluarga. <br />
Silahkan isi data kartu keluarga setelah mengisi biodata ini  <hr />
<table border="0" width="100%" > 
<tr><td   width="200px">NIK Ayah  </td>
		<td>: <input type="text" name="nik_ayah" id="nik_ayah_edit" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
<tr><td   width="200px">Nama Ayah  </td>
		<td>: <input type="text" name="nama_ayah" id="nama_ayah_edit" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
		
<tr><td   width="200px">NIK Ibu</td>
		<td>: <input type="text" name="nik_ibu" id="nik_ibu_edit" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
		
<tr><td   width="200px">Nama Ibu</td>
		<td>: <input type="text" name="nama_ibu" id="nama_ibu_edit" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
</table>
</fieldset>
		
		
		<fieldset>
		<legend>Alamat Sekarang </legend>
		<table border="0" width="100%" > 
		<tr><td width="200px">Alamat   </td>
		<td>:  <textarea name="alamat" id="alamat_edit" class="text ui-widget-content ui-corner-all" ></textarea> </td></tr>
		
		<tr><td>Dusun  </td>
		<td>: <input type="text" name="dusun" id="dusun_edit" class="text ui-widget-content ui-corner-all"  />
		<input type="hidden" name="id_dusun" id="id_dusun_edit" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
		
		
		<tr><td>RT/RW   </td>
		<td>: <input size="5" type="text" name="rt" id="rt_edit" class="text ui-widget-content ui-corner-all"  />
		<input size="5" type="text" name="rw" id="rw_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		</table>
		
		</fieldset>
		
		
		<fieldset>
		<legend>Alamat Sebelumnya </legend>
		<table border="0" width="100%" > 
		<tr><td width="200px">Alamat   </td>
		<td>:  <textarea name="alamat_sebelumnya" id="alamat_sebelumnya_edit" class="text ui-widget-content ui-corner-all" ></textarea> </td></tr>
		
		<tr><td >Provinsi  </td>
		<td>: <?php 
		$js='onchange="get_dropdownkabupaten_edit();" id="id_provinsi_edit"';
		echo form_dropdown("id_provinsi",$arr_provinsi,'',$js); ?></td></tr>
		<tr><td >Kabupaten  </td>
		<td>: 
			<select name="id_kabupaten" id="id_kabupaten_edit" onchange="get_dropdownkota_edit()">
			<option value="x">- Kabupaten - </option>
			</select>
		</td></tr>
		
		
		<tr><td >Kecamatan  </td>
		<td>: 
			<select name="id_kota" id="id_kota_edit">
			
			</select> 
			
			
		</td></tr>
		
		<tr><td>Desa  </td>
		<td>: <input type="text" name="desa_sebelumnya" id="desa_sebelumnya_edit" class="text ui-widget-content ui-corner-all"  />
		<input type="hidden" name="id_desa_sebelumnya" id="id_desa_sebelumnya_edit" class="text ui-widget-content ui-corner-all"  />
		</td></tr>
				
		
		
		<tr><td>Dusun  </td>
		<td>: 
		<input type="text" name="dusun_sebelumnya" id="dusun_sebelumnya_edit" class="text ui-widget-content ui-corner-all"  />
		<input type="hidden" name="id_dusun_sebelumnya" id="id_dusun_sebelumnya_edit" class="text ui-widget-content ui-corner-all"  />
		
		</td></tr>
		
		<tr><td>RT/RW   </td>
		<td>: <input size="5" type="text" name="rt_sebelumnya" id="rt_sebelumnya_edit" class="text ui-widget-content ui-corner-all"  />
		<input size="5" type="text" name="rw_sebelumnya" id="rw_sebelumnya_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		</table>
		
		</fieldset>
		
		
		<fieldset>
		<legend>Kepemilikan dokumen</legend>
		<table border="0" width="100%" > 
		
		<tr><td width="200px">Nomor Passport  </td>
		<td>: <input type="text" name=no_paspor id="no_paspor_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Tanggal Passport  </td>
		<td>: <input type="text" name="tgl_paspor_akhir" id="tgl_paspor_akhir_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Nomor Akta Laihr  </td>
		<td>: <input type="text" name="no_akta_lahir" id="no_akta_lahir_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Nomor Akta Nikah  </td>
		<td>: <input type="text" name="no_akta_nikah" id="no_akta_nikah_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Tanggal Akta Nikah  </td>
		<td>: <input type="text" name="tgl_akta_nikah" id="tgl_akta_nikah_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Nomor Akta Cerai</td>
		<td>: <input type="text" name="no_akta_cerai" id="no_akta_cerai_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		<tr><td>Tanggal Akta Cerai  </td>
		<td>: <input type="text" name="tgl_akta_cerai" id="tgl_akta_cerai_edit" class="text ui-widget-content ui-corner-all"  /></td></tr>
		
		</table>
		</fieldset>
	</form>
</div>
<!-- END OF EDIT SECTION -->


<div class="form-container" id="dialog-detail" title="Detail data penduduk" style="display:none">
</div>


