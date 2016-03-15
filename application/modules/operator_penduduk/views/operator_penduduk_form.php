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
		<td>: <?php echo form_dropdown("golongan_darah",$this->cm->arr_tabel("master_gol_darah", "gol", "gol", "gol")  
,'','id="golongan_darah"');?></td></tr>
		<tr><td >Kewarganegaraan   </td>
		<td>: <?php echo form_dropdown("warga_negara",$arr_warga_negara,'','id="warga_negara"');?></td></tr>
		<tr><td>Agama   </td>
		<td>: <?php echo form_dropdown("id_agama",$arr_agama,'','id="id_agama"');?></td></tr>
		<tr><td >Pekerjaan   </td>
		<td>:  <?php echo form_dropdown("id_pekerjaan",$arr_pekerjaan,'','id="id_pekerjaan"');?>
			 
		 </td></tr>
		<tr><td >Status perkawinan   </td>
		<td>: <?php echo form_dropdown("status_kawin",$arr_status_kawin,'','id="status_kawin"');?></td></tr>
		<!-- <tr><td>Cacat fisik   </td>
		<td>: <input type="text" name="cacat_fisik" id="cacat_fisik" class="text ui-widget-content ui-corner-all"  /></td></tr>
		-->
		<tr><td >Pendidikan   </td>
		<td>: <?php echo form_dropdown("id_pendidikan",$arr_pendidikan,'','id="id_pendidikan"');?></td></tr>
		
		<tr><td >Kemampuan Baca Tulis   </td>
		<td>: <?php echo form_dropdown("baca_tulis",$this->cm->arr_baca_tulis,'','id="baca_tulis"');?></td></tr>
		


		
		<tr><td > Hidup / Mati   </td>
		<td>: <?php echo form_dropdown("hidup_mati",$this->cm->arr_status_hidup,'','id="hidup_mati"');?></td></tr>
		
		<tr><td >Foto   </td>
		<td>: <input type="file" name="foto" id="foto" > </td></tr>
		
		<tr><td >Status Kependudukan   </td>
		<td>: <?php
		$arr_status_penduduk = $this->cm->arr_status_kependudukan; 
		unset($arr_status_penduduk[3]);
		echo form_dropdown("status_kependudukan",$arr_status_penduduk,'','id="status_kependudukan"');?></td></tr>
		

		</table>
		</fieldset>

<!-- pendatang section    -->

<fieldset id="sementara">
	<legend>Diisi untuk penduduk sementara</legend>
	<table border="0" width="100%" > 
		<tr>
			<td width="200px">Maksud </td>
			<td><input type="text" name="sementara_maksud" id="sementara_maksud"></td>
		</tr>
		<tr>
			<td>Nama penduduk yang dituju </td>
			<td><input type="text" name="sementara_id_tujuan" id="sementara_id_tujuan"></td>
		</tr>
	</table>
</fieldset>

<!-- 
<fieldset id="pindah">
		
		<legend>Tujuan Pindah. Diisi untuk penduduk yang pindah  </legend>
		<table border="0" width="100%" > 
		<tr><td width="200px">Alamat   </td>
		<td>:  <textarea name="pindah_alamat" id="pindah_alamat" class="text ui-widget-content ui-corner-all" ></textarea> </td></tr>
		
		<tr><td >Provinsi  </td>
		<td>: <?php echo form_dropdown("pindah_id_provinsi",$arr_provinsi,'','id="pindah_id_provinsi" onchange="get_kota(this,\'#pindah_id_kota\',1)"') ?></td></tr>
		<tr><td >Kabupaten  </td>
		<td>: 
			  <?php echo form_dropdown("pindah_id_kota",array(),'','id="pindah_id_kota" onchange="get_kecamatan(this,\'#pindah_id_kecamatan\',1)"') ?>
		</td></tr>
		
		
		<tr><td >Kecamatan  </td>
		<td>: <?php
						    echo form_dropdown('pindah_id_kecamatan',array(),'',
						    'id="pindah_id_kecamatan" onchange="get_desa(this,\'#pindah_id_desa\',1)" ');
						?>			 
		</td></tr>
		
		<tr><td>Desa  </td>
		<td>: <?php
						    	 echo form_dropdown('pindah_id_desa',array('x'=>" - Semua Desa - "),'', 'id="pindah_id_desa"');
						?>
		</td></tr>		
		 
		
		</td></tr>
		
		<tr><td>RT/RW   </td>
		<td>: <input size="5" type="text" name="pindah_rt" id="pindah_rt" class="text ui-widget-content ui-corner-all"  />
		<input size="5" type="text" name="pindah_rw" id="pindah_rw" class="text ui-widget-content ui-corner-all"  /></td></tr>
		</table>
		
		</fieldset>  

 -->

<fieldset id="pendatang">		
		<legend>Alamat Sebelumnya. Diisi untuk penduduk pendatang  </legend>
		<table border="0" width="100%" > 
		<tr>
		  <td width="227">Jenis Kedatangan</td>
		  <td width="717">: <?php 
		  echo form_dropdown("jenis_kedatangan",array("dn"=>"Dalam Negeri","ln"=>"Luar Negeri"),'','id="jenis_kedatangan"' )?></td>
		  </tr>
		<tr class="ln">
		  <td>Asal Negara</td>
		  <td>: 
		    <input name="asal_negara" type="text" id="asal_negara" size="50" /></td>
		  </tr>
		<tr class="dn"><td width="201">Alamat   </td>
		<td>:  <textarea name="alamat_sebelumnya" id="alamat_sebelumnya" class="text ui-widget-content ui-corner-all" ></textarea> </td></tr>
		
		<tr class="dn"><td >Provinsi  </td>
		<td>: <?php echo form_dropdown("id_provinsi_sebelumnya",$arr_provinsi,'','id="id_provinsi" onchange="get_kota(this,\'#id_kota_sebelumnya\',1)"') ?></td></tr>
		<tr class="dn"><td >Kabupaten  </td>
		<td>: 
			  <?php echo form_dropdown("id_kota_sebelumnya",array(),'','id="id_kota_sebelumnya" onchange="get_kecamatan(this,\'#id_kecamatan_sebelumnya\',1)"') ?>
         <span id="btn_add_kabupaten">     
         <a href="javascript:showhide('add_kabupaten','btn_add_kabupaten');" title="Tambahkan baru">
         <img src="<?php echo base_url() ?>/assets/images/add.png" width="16" height="16" /></a> 
         </span>
		<span id="add_kabupaten" style="display:none"> 
        <input id="add_kabupaten_nama" placeholder="Nama Kabupaten Baru" /> 
        <a href="javascript:simpan_kabupaten();" class="simpan">Simpan</a> 
        <a href="javascript:showhide('btn_add_kabupaten','add_kabupaten');" class="batal">Batal</a> 
        </span>
        </td></tr>
		
		
		<tr class="dn"><td >Kecamatan  </td>
		<td>: <?php
						    echo form_dropdown('id_kecamatan_sebelumnya',array(),'',
						    'id="id_kecamatan_sebelumnya" onchange="get_desa(this,\'#id_desa_sebelumnya\',1)" ');
						?>
		 
         <span id="btn_add_kecamatan">     
         <a href="javascript:showhide('add_kecamatan','btn_add_kecamatan');" title="Tambahkan baru">
         <img src="<?php echo base_url() ?>/assets/images/add.png" width="16" height="16" /></a> 
         </span>
		<span id="add_kecamatan" style="display:none"> <input id="add_kecamatan_nama" placeholder="Nama Kecamatan Baru" /> 
        <a href="javascript:simpan_kecamatan();" class="simpan">Simpan</a> 
        <a href="javascript:showhide('btn_add_kecamatan','add_kecamatan');" class="batal">Batal</a> </span>
         
         
         
          </td></tr>
		
		<tr class="dn"><td>Desa  </td>
		<td>: <?php
						    	 echo form_dropdown('id_desa_sebelumnya',array('x'=>" - Semua Desa - "),'', 'id="id_desa_sebelumnya"');
						?>
		 <span id="btn_add_desa">     
         <a href="javascript:showhide('add_desa','btn_add_desa');" title="Tambahkan baru">
         <img src="<?php echo base_url() ?>/assets/images/add.png" width="16" height="16" /></a> 
         </span>
		<span id="add_desa" style="display:none"> <input id="add_desa_nama" placeholder="Nama Desa Baru" /> 
        <a href="javascript:simpan_desa();" class="simpan">Simpan</a> 
        <a href="javascript:showhide('btn_add_desa','add_desa');" class="batal">Batal</a> </span>
          
          </td></tr>		
		 
		
		</td></tr>
		
		<tr class="dn"><td>RT/RW   </td>
		<td>: <input size="5" type="text" name="rt_sebelumnya" id="rt_sebelumnya" class="text ui-widget-content ui-corner-all"  />
		<input size="5" type="text" name="rw_sebelumnya" id="rw_sebelumnya" class="text ui-widget-content ui-corner-all"  /></td></tr>
		</table>
		
		</fieldset>




		<fieldset>
		<legend>Alamat </legend>
		<table border="0" width="100%" > 
		<tr><td width="200px">Alamat   </td>
		<td valign="top">:  <textarea name="alamat" id="alamat" class="text ui-widget-content ui-corner-all" ></textarea> </td></tr>
 	   	<tr><td> <?php echo $this->dusun; ?>  </td><td>: 
 	   	
 	   	    <input type="text" name="dusun" id="dusun" class="text ui-widget-content ui-corner-all"  /></td>
 	   	</tr>
		<tr><td>RT/RW   </td>
		<td>: <input size="5" type="text" name="rt" id="rt" class="text ui-widget-content ui-corner-all"  />
		<input size="5" type="text" name="rw" id="rw" class="text ui-widget-content ui-corner-all"  /></td></tr>
		</table>
		
		</fieldset>


<!-- SUKU DAN KETURUNAN  -->
		<fieldset>
			<legend>Suku dan keturunan </legend>
			<table border="0" width="100%">
				<tr>
					<td width="200px">Suku </td>
					<td>: <input style="width:100px" type="text" name="suku" id="suku" /> </td>
				</tr>
				<tr>
					<td width="200px">Keturunan </td>
					<td>: <input type="text" name="keturunan" id="keturunan" /> </td>
				</tr>
				<tr>
					<td width="200px">Kebangsaan </td>
					<td>: <input type="text" name="kebangsaan" id="kebangsaan" /> </td>
				</tr>
			</table>
		</fieldset>
<!-- end of keturunan --> 
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
		
		



		<!-- 
		
		
		
		
		
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
		 
		 -->
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="simpan()">Save</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')">Cancel</a>
	</div>
	 