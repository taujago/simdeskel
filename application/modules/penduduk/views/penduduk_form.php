<div id="dlg" class="easyui-dialog" style="width:950px;height:800px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Penduduk</div>
		<form id="fm" method="post" novalidate enctype="multipart/form-data">
			<input type="hidden" name="id_penduduk" id="id_penduduk" />
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
		<td>:  <?php echo form_dropdown("id_pekerjaan",$arr_pekerjaan,'','id="id_pekerjaan"');?>
			 
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
		
		<tr><td>Kecamatan  </td>
		<td>: <?php
						    echo form_dropdown('id_kecamatan',$arr_kecamatan2,'',
						    'id="id_kecamatan" onchange="get_desa(this,\'#id_desa\')" ');
						?>
		</td></tr>
		
		<tr><td>Desa  </td>
		<td>: <?php
						    	 echo form_dropdown('id_desa',array('x'=>" - Semua Desa - "),'', 'id="id_desa"');
						?>
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
		<td>: <?php echo form_dropdown("id_provinsi_sebelumnya",$arr_provinsi,'','id="id_provinsi" onchange="get_kota(this,\'#id_kota_sebelumnya\')"') ?></td></tr>
		<tr><td >Kabupaten  </td>
		<td>: 
			  <?php echo form_dropdown("id_kota_sebelumnya",array(),'','id="id_kota_sebelumnya" onchange="get_kecamatan(this,\'#id_kecamatan_sebelumnya\')"') ?>
		</td></tr>
		
		
		<tr><td >Kecamatan  </td>
		<td>: <?php
						    echo form_dropdown('id_kecamatan_sebelumnya',array(),'',
						    'id="id_kecamatan_sebelumnya" onchange="get_desa(this,\'#id_desa_sebelumnya\')" ');
						?>			 
		</td></tr>
		
		<tr><td>Desa  </td>
		<td>: <?php
						    	 echo form_dropdown('id_desa_sebelumnya',array('x'=>" - Semua Desa - "),'', 'id="id_desa_sebelumnya"');
						?>
		</td></tr>		
		 
		
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
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 