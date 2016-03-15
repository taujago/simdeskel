<div id="detail" style="min-height: 500px;" >
	 <div id="detail-head">
	 	<?php 
	 	$desa2 = $this->cm->data_desa();
	 	echo $title; ?>
	 </div>

    <div id="tt" class="easyui-tabs" style="width:1215px;height:auto">  
        <div title="BIODATA" style="padding:20px;">  
           
        
            
            <div style="padding:5px;">

	 	<a class="easyui-linkbutton"  iconCls="icon-back" href="<?php echo site_url("operator_penduduk"); ?>" > Kembali </a>
			<br />
			<center>
	 				<img class="foto" src="<?php echo base_url()."/foto/".$foto; ?>" />
	 				<h2> <?php echo $nama; ?> <br />
	 				<?php echo $nik; ?> </h2>
	 		</center>
	 	<fieldset>
	 		<legend><strong>Biodata Penduduk</strong> </legend>
	 		
	 	<table>
	 		<tr>
	 			<td width="200px">Nomor KK  </td><td>: <?php echo $this->am->no_kk($id_penduduk); ?></td>
	 		</tr>
	 		<tr>
	 			<td width="200px">NIK  </td><td>: <?php echo $nik; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Nama  </td><td>: <?php echo $nama; ?></td>
	 		</tr>
	 		<tr>
	 			<td >Jenis kelamin </td><td>: <?php echo $jk; ?></td>
	 		</tr>
	 		<tr>
	 			<td >Tempat lahir  </td><td>: <?php echo $tmp_lahir; ?></td>
	 		</tr>
	 		<tr>
	 			<td >Tanggal lahir  </td><td>: <?php echo $tgl_lahir; ?></td>
	 		</tr>	 
	 		<tr>
	 			<td > Umur  </td><td>: <?php echo $umur; ?> Tahun </td>
	 		</tr>
	 		<tr>
	 			<td > Golongan darah  </td><td>: <?php echo $golongan_darah; ?></td>
	 		</tr>
	 		<tr>
	 			<td > Warga negara  </td><td>: <?php echo $warga_negara; ?></td>
	 		</tr>
	 		<tr>
	 			<td > Agama  </td><td>: <?php echo $agama; ?></td>
	 		</tr>	
	 		<tr>
	 			<td > Pekerjaan  </td><td>: <?php echo $pekerjaan; ?></td>
	 		</tr>
	 		<tr>
	 			<td > Status kawin  </td><td>: <?php 
	 			$arr_status_kawin = $this->cm->arr_status_kawin;
	 			echo $arr_status_kawin[$status_kawin]; ?></td>
	 		</tr>
	 		<tr>
	 			<td > Pendidikan  </td><td>: <?php echo $pendidikan; ?></td>
	 		</tr>
	 		<tr>
	 			<td > Status Kependudukan  </td><td>: <?php 
	 			$arr_status_kependudukan = $this->cm->arr_status_kependudukan;
	 			echo $arr_status_kependudukan[$status_kependudukan]; ?></td>
	 		</tr>
	 		<tr>
	 			<td > Suku  </td><td>: <?php echo $suku; ?></td>

	 		</tr>
	 		<tr>
	 			<td > Keturunan  </td><td>: <?php echo $keturunan; ?></td>
	 			
	 		</tr>

	<!-- 		<tr>
	 			<td >Tanggal Lahir  </td><td>: <?php echo $tgl_lahir; ?></td>
	 		</tr>			  -->

	 	</table>

	 	</fieldset>
	 	<fieldset>
	 			<legend><strong>Alamat / Domisili</strong></legend>
	 			<table>
	 				<tr>
	 					<td width="200"> Alamat </td><td>: <?php echo  "$alamat" ?> </td>
	 				</tr>
	 				<tr>
	 					<td> RT / RW </td><td>: <?php echo "$rt / $rw" ?> </td>
	 				</tr>
	 				<tr>
	 					<td width="200"> Dusun </td><td>: <?php echo "$dusun" ?> </td>
	 				</tr>
	 				<tr>
	 					<td width="200"> <?php echo  $desa2->bentuk_lembaga; ?> </td><td>: <?php echo "$desa" ?> </td>	 					
	 				</tr>
	 				<tr>
	 					<td width="200"> Kecamatan </td><td>: <?php echo "$kecamatan" ?> </td>	 					
	 				</tr>
	 				<tr>
	 					<td width="200"> Kab. / Kota </td><td>: <?php echo "$kota" ?> </td>	 					
	 				</tr>
	 				<tr>
	 					<td width="200"> Provinsi </td><td>: <?php echo "$provinsi" ?> </td>	 					
	 				</tr>

	 			</table>
	 	</fieldset>

	 	<?php 
	 		if($status_kependudukan == "2") { // pendatang  
	 	?>
	 	<fieldset>
	 			<legend><strong>Alamat sebelummya (Pendatang) </strong></legend>
	 			<table>
	 				<tr>
	 					<td width="200"> Alamat </td><td>: <?php echo  "$alamat_sebelumnya" ?> </td>
	 				</tr>
	 				<tr>
	 					<td> RT / RW </td><td>: <?php echo "$rt_sebelumnya / $rw_sebelumnya" ?> </td>
	 				</tr>
	 		 
	 				<tr>
	 					<td width="200"> Desa </td><td>: <?php echo "$desa_sebelumnya" ?> </td>	 					
	 				</tr>
	 				<tr>
	 					<td width="200"> Kecamatan </td><td>: <?php echo "$kecamatan_sebelumnya" ?> </td>	 					
	 				</tr>
	 				<tr>
	 					<td width="200"> Kab. / Kota </td><td>: <?php echo "$kota_sebelumnya" ?> </td>	 					
	 				</tr>
	 				<tr>
	 					<td width="200"> Provinsi </td><td>: <?php echo "$provinsi_sebelumnya" ?> </td>	 					
	 				</tr>

	 			</table>
	 	</fieldset>

	 	<?php 
	 		}  // end of pendatang 
	 	
	 	if($status_kependudukan == "1") {
	 	?><fieldset>
	 			<legend><strong>Keterangan penduduk sementara </strong></legend>
	 			<table>
	 				<tr>
	 					<td width="200"> Maksud  </td><td>: <?php echo  "$sementara_maksud" ?> </td>
	 				</tr>
	 				<tr>
	 					<td width="200"> Nama penduduk yang dituju  </td><td>: <?php echo  "$sementara_nama" ?> </td>
	 				</tr>
	 			</table>
	 		</fieldset>
	 	<?php 

	 	}
	 	?>

	 	<fieldset>
	 			<legend><strong>Data orangtua</strong></legend>
	 			<table>
	 				<tr>
	 					<td width="200"> NIK Bapak  </td><td>: <?php echo  "$nik_ayah" ?> </td>
	 				</tr>
	 				<tr>
	 					<td> Nama Bapak  </td><td>: <?php echo  "$nama_ayah" ?> </td>
	 				</tr>
	 				<tr>
	 					<td> NIK Ibu </td><td>: <?php echo  "$nik_ibu" ?> </td>
	 				</tr>
	 				<tr>
	 					<td> Nama Ibu  </td><td>: <?php echo  "$nama_ibu" ?> </td>
	 				</tr>
	 			</table>
	 		</fieldset>
	 </div>
            
            
        </div>  
        <div title="DATA TAMBAHAN" data-options="closable:false" style="overflow:auto;padding:20px;">  
            <?php 
			$data['id'] = "tanaman_pangan";
			$this->load->view("profil/penduduk_detail_tambahan"); 
			$this->load->view("profil/toolbar",$data); 
			?>
        </div>  
        <div title="PERTANIAN TANAMAN PANGAN" data-options="closable:false" style="padding:20px;">  
            <?php $this->load->view("profil/penduduk_tanaman_pangan"); ?>
        </div>  
        
        <div title="HASIL PERKEBUNAN" data-options="closable:false" style="padding:20px;">  
             <?php $this->load->view("profil/penduduk_hasil_perkebunan"); ?>
        </div>
        
        <div title="HASIL HUTAN" data-options="closable:false" style="padding:20px;">  
            <?php $this->load->view("profil/penduduk_hasil_hutan"); ?>
        </div>
        
        <div title="PETERNAKAN" data-options="closable:false" style="padding:20px;">  
            <?php $this->load->view("profil/penduduk_peternakan"); ?>
        </div>
        
        <div title="PERIKANAN" data-options="closable:false" style="padding:20px;">  
            <?php $this->load->view("profil/penduduk_perikanan"); ?>
        </div>
        
         <div title="BAHAN GALIAN" data-options="closable:false" style="padding:20px;">  
            <?php $this->load->view("profil/penduduk_bahan_galian"); ?>
        </div>
        
          <div title="SUMBER AIR DAN AIR MINUM" data-options="closable:false" style="padding:20px;">  
            <?php $this->load->view("profil/penduduk_sumber_air"); ?>
        </div>
        
         <div title="KELEMBAGAAN" data-options="closable:false" style="padding:20px;">  
           <?php $this->load->view("profil/penduduk_kelembagaan"); ?>
        </div>
        
       
        <div title="LEMBAGA POLITIK" data-options="closable:false" style="padding:20px;">  
           <?php $this->load->view("profil/penduduk_lembaga_politik"); ?>
        </div>
        
         <div title="LEMBAGA EKONOMI DAN PENDIDIKAN" data-options="closable:false" style="padding:20px;">  
         	<?php $this->load->view("profil/penduduk_ekonomi_pendidikan"); ?>
        </div>
        <div title="ASET KELUARGA" data-options="closable:false" style="padding:20px;">  
           <?php $this->load->view("profil/penduduk_aset_keluarga"); ?>
        </div>
         <div title="KESEHATAN" data-options="closable:false" style="padding:20px;">  
           <?php $this->load->view("profil/penduduk_kesehatan"); ?>
        </div>
        <div title="KERUKUNAN DAN KEJAHATAN" data-options="closable:false" style="padding:20px;">  
           <?php $this->load->view("profil/penduduk_kejahatan"); ?>
        </div>
        <div title="PAJAK DAN KESEJAHTERAAN KELUARGA" data-options="closable:false" style="padding:20px;">  
           <?php $this->load->view("profil/penduduk_kesejahteraan"); ?>
        </div>
    </div>  




	 
</div>
 