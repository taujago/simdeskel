<html>
	<head>
		<title>
			Surat Keterangan Lahir
		</title>

<style type="text/css">
* {
	font-family: verdana;
	font-size:  10px;
}
#kolom1 {
	width: 30%px;
	float:left;
	padding: 5px;
}
#kolom2 {
	width: 50%;
	float:left;
	padding: 5px;

}

#kolom3 {
	width: 30%;
	padding: 5px;
	float:left;
}

.label {
	width: 130px;
}
.label2 {
	width: 120px;
}
</style>

		</head>

<body>
	<?php 
	$desa = $this->cm->data_desa();

	?>
<table>
	<tr><td width="30%" valign="top">
Kode: F.2.02 <br />
Pemerintah Kabupaten <?php echo   $desa->kota ?> <br />
Kecamatan  <?php echo   $desa->kecamatan ?>  <br />
 <?php echo   $desa->bentuk_lembaga ?>   <?php echo   $desa->desa ?>  <br />
 <center><h1>ARSIP UNTUK <?php echo strtoupper($desa->bentuk_lembaga) ?> </h1>

<h3>SURAT KETERANGAN KELAHIRAN </h3>
No. :  <?php echo $no_surat; ?>
<br /><br /><br />

Yang bertanda tangan di bawah ini, 

 </center>
 Menerangkan Bahwa : <br />
 <table>
 	<tr><td class="label">Hari </td><td> : <?php echo $this->am->hari(flipdate($tgl_lahir)) ?> </td></tr>
 	<tr><td class="label">Tanggal </td><td> : <?php echo $tgl_lahir ?> </td></tr>
 	<tr><td class="label">Pukul </td><td> : <?php echo $jam_lahir ?> </td></tr>
 	<tr><td class="label">Tempat Kelahiran </td><td> : <?php echo $tmp_lahir ?> </td></tr>
 </table>
<br /><br />
Telah lahir seorang anak <?php echo $this->am->jk($jk); ?> <br />
bernama : <?php echo $nama; ?> <br /> <br /> 

Dari seorang Ibu : <br />
<table>
	<tr><td class="label">Nama </td><td> : <?php echo $ibu_nama; ?> </td>
	<tr><td class="label">NIK </td><td> : <?php echo $ibu_nik; ?> </td>
	<tr><td class="label">Umur </td><td> : <?php echo $this->am->umur($ibu_tgl_lahir); ?> tahun </td>
	<tr><td class="label">Pekerjaan </td><td> : <?php echo $ibu_pekerjaan; ?>  </td>
	<tr><td class="label">Alamat </td><td> : <?php echo $ibu_alamat; ?>  </td>
</table>
<br /><br />
Istri dari  : <br />
<table>
	<tr><td class="label">Nama </td><td> : <?php echo $bapak_nama; ?> </td>
	<tr><td class="label">NIK </td><td> : <?php echo $bapak_nik; ?> </td>
	<tr><td class="label">Umur </td><td> : <?php echo $this->am->umur($bapak_tgl_lahir); ?> tahun </td>
	<tr><td class="label">Pekerjaan </td><td> : <?php echo $bapak_pekerjaan; ?>  </td>
	<tr><td class="label">Alamat </td><td> : <?php echo $bapak_alamat; ?>  </td>
</table>

<br /><br />
<center> Surat keteranga ini dibuat berdasarkan keterangan pelapor </center>
<table>
	<tr><td class="label">Nama </td><td> : <?php echo $pelapor_nama; ?> </td>
	<tr><td class="label">NIK </td><td> : <?php echo $pelapor_nik; ?> </td>
	<tr><td class="label">Umur </td><td> : <?php echo $this->am->umur($pelapor_tgl_lahir); ?> tahun </td>
	<tr><td class="label">Pekerjaan </td><td> : <?php echo $pelapor_pekerjaan; ?>  </td>
	<tr><td class="label">Alamat </td><td> : <?php echo $pelapor_alamat; ?>  </td>
</table>
<br /><br />
<center>
	<?php echo $desa->desa . ", ".flipdate($tanggal) ?> <br />
	 <?php echo $ttd_jabatan ." ". $desa->bentuk_lembaga ?> <br /> <br /><br /><br />
	<?php echo $ttd_nama ?> <br />
</center>


</td>








<td  width="40%" valign="top">
 
 Kode: F.2.02 <br />
Pemerintah Kabupaten <?php echo   $desa->kota ?> <br />
Kecamatan  <?php echo   $desa->kecamatan ?>  <br />
 <?php echo   $desa->bentuk_lembaga ?>   <?php echo   $desa->desa ?>  <br /><br /><br />

 ARSIP UNTUK KECAMATAN / PEREKAM DATA 
 <h1>SURAT KETERANGAN KELAHIRAN </H1>
 <h1>No. :  <?php echo $no_surat; ?></h1>
<table>
	<tr><td class="label">Nama Kepala Keluarga </td><td>  : <?php echo $bapak_nama; ?></td></tr>
	<tr><td class="label">Nomor KK </td><td>: <?php echo $this->am->no_kk($bapak_id_penduduk); ?> </td></tr>
</table>
<br /><br /><br />
BAYI : 
<table>
	<tr><td>1</td><td class="label2">Nama </td><td>: <?php echo $nama ?></td></tr>
	<tr><td>2</td><td class="label2">Jenis kelamin </td><td>: <?php echo $jk ?></td></tr>
	<tr><td>3</td><td class="label2">Tempat dilahirkan </td><td>: <?php echo $tmp_lahir ?></td></tr>
	<tr><td>4</td><td class="label2">Tempat kelahiran </td><td>: <?php echo $tmp_kelahiran ?></td></tr>
	<tr><td>5</td><td class="label2">Hari dan tanggal lahir </td><td>: 
		<?php echo $this->am->hari(flipdate($tgl_lahir)).", ". $tgl_lahir ?></td></tr>
	<tr><td>6</td><td class="label2">Pukul </td><td>: <?php echo $jam_lahir ?></td></tr>
	<tr><td>7</td><td class="label2">Kelahiran ke </td><td>: <?php echo $anak_ke ?></td></tr>
	<tr><td>8</td><td class="label2">Penolong kelahiran </td><td>: <?php echo $penolong_kelahiran ?></td></tr>
	<tr><td>9</td><td class="label2">Berat bayi</td><td>: <?php echo $berat ?> Kg</td></tr>

</table>
<br /><br /> 
IBU : 
<table>
	<tr><td class="label">Nama </td><td> : <?php echo $ibu_nama; ?> </td>
	<tr><td class="label">NIK </td><td> : <?php echo $ibu_nik; ?> </td>
	<tr><td class="label">Umur </td><td> : <?php echo $this->am->umur($ibu_tgl_lahir); ?> tahun </td>
	<tr><td class="label">Pekerjaan </td><td> : <?php echo $ibu_pekerjaan; ?>  </td>
	<tr><td class="label" valign="top">Alamat </td><td> <table>
								<tr><td>a. <?php echo $desa->bentuk_lembaga." ".$ibu_desa ?></td>
									<td>c. Kabupaten / Kota <?php echo $ibu_kota ?> </td></tr>
								<tr><td>b. Kecamatan <?php echo $ibu_kecamatan ?></td>
									<td>d. Provinsi <?php echo $ibu_provinsi ?> </td></tr>
								</table>  </td> </tr>
	<tr><td class="label">Kewarganegaraan</td><td> : <?php echo $ibu_warga_negara ?></td>  </tr>
	<tr><td class="label">Kebangsaan</td><td> : <?php echo $ibu_keturunan ?></td>  </tr>
	<tr><td class="label">Tgl. Pencatatan perkawinan</td><td> : <?php echo flipdate($tgl_pernikahan) ?></td>  </tr>
</table>
<br /><br />
BAPAK : 
<table>
	<tr><td class="label">Nama </td><td> : <?php echo $bapak_nama; ?> </td>
	<tr><td class="label">NIK </td><td> : <?php echo $bapak_nik; ?> </td>
	<tr><td class="label">Umur </td><td> : <?php echo $this->am->umur($bapak_tgl_lahir); ?> tahun </td>
	<tr><td class="label">Pekerjaan </td><td> : <?php echo $bapak_pekerjaan; ?>  </td>
	<tr><td class="label" valign="top">Alamat </td><td> <table>
								<tr><td>a. <?php echo $desa->bentuk_lembaga." ".$bapak_desa ?></td>
									<td>c. Kabupaten / Kota <?php echo $bapak_kota ?> </td></tr>
								<tr><td>b. Kecamatan <?php echo $bapak_kecamatan ?></td>
									<td>d. Provinsi <?php echo $bapak_provinsi ?> </td></tr>
								</table>  </td> </tr>
	<tr><td class="label">Kewarganegaraan</td><td> : <?php echo $bapak_warga_negara ?></td>  </tr>
	<tr><td class="label">Kebangsaan</td><td> : <?php echo $bapak_keturunan ?></td>  </tr>
</table>
<br /><br />
SAKSI I : 
<table>
	<tr><td class="label">NIK </td><td> : <?php echo $saksi1_nik; ?> </td>
	<tr><td class="label">Nama </td><td> : <?php echo $saksi1_nama; ?> </td> 
</table>

<br /><br />
SAKSI II : 
<table>
	<tr><td class="label">NIK </td><td> : <?php echo $saksi2_nik; ?> </td>
	<tr><td class="label">Nama </td><td> : <?php echo $saksi2_nama; ?> </td> 
</table><br /> <br />
<center>
	<?php echo $desa->desa . ", ".flipdate($tanggal) ?> <br />
	 <?php echo $ttd_jabatan ." ". $desa->bentuk_lembaga ?> <br /> <br /><br /><br />
	<?php echo $ttd_nama ?> <br />
</center>


</td>









<td  width="30%" valign="top">
Kode: F.2.02 <br />
Pemerintah Kabupaten <?php echo   $desa->kota ?> <br />
Kecamatan  <?php echo   $desa->kecamatan ?>  <br />
 <?php echo   $desa->bentuk_lembaga ?>   <?php echo   $desa->desa ?>  <br />

<center><h1>ARSIP UNTUK <?php echo strtoupper($desa->bentuk_lembaga) ?> </h1>

<h3>SURAT KETERANGAN KELAHIRAN </h3>
No. : <?php echo $no_surat; ?>
<br /><br /><br />

Yang bertanda tangan di bawah ini, 

 </center>
 Menerangkan Bahwa : <br />
 <table>
 	<tr><td class="label">Hari </td><td> : <?php echo $this->am->hari(flipdate($tgl_lahir)) ?> </td></tr>
 	<tr><td class="label">Tanggal </td><td> : <?php echo $tgl_lahir ?> </td></tr>
 	<tr><td class="label">Pukul </td><td> : <?php echo $jam_lahir ?> </td></tr>
 	<tr><td class="label">Tempat Kelahiran </td><td> : <?php echo $tmp_lahir ?> </td></tr>
 </table>
<br /><br />
Telah lahir seorang anak <?php echo $this->am->jk($jk); ?> <br />
bernama : <?php echo $nama; ?> <br /> <br /> 

Dari seorang Ibu : <br />
<table>
	<tr><td class="label">Nama </td><td> : <?php echo $ibu_nama; ?> </td>
	<tr><td class="label">NIK </td><td> : <?php echo $ibu_nik; ?> </td>
	<tr><td class="label">Umur </td><td> : <?php echo $this->am->umur($ibu_tgl_lahir); ?> tahun </td>
	<tr><td class="label">Pekerjaan </td><td> : <?php echo $ibu_pekerjaan; ?>  </td>
	<tr><td class="label">Alamat </td><td> : <?php echo $ibu_alamat; ?>  </td>
</table>
<br /><br />
Istri dari  : <br />
<table>
	<tr><td class="label">Nama </td><td> : <?php echo $bapak_nama; ?> </td>
	<tr><td class="label">NIK </td><td> : <?php echo $bapak_nik; ?> </td>
	<tr><td class="label">Umur </td><td> : <?php echo $this->am->umur($bapak_tgl_lahir); ?> tahun </td>
	<tr><td class="label">Pekerjaan </td><td> : <?php echo $bapak_pekerjaan; ?>  </td>
	<tr><td class="label">Alamat </td><td> : <?php echo $bapak_alamat; ?>  </td>
</table>

<br /><br />
<center> Surat keteranga ini dibuat berdasarkan keterangan pelapor </center>
<table>
	<tr><td class="label">Nama </td><td> : <?php echo $pelapor_nama; ?> </td>
	<tr><td class="label">NIK </td><td> : <?php echo $pelapor_nik; ?> </td>
	<tr><td class="label">Umur </td><td> : <?php echo $this->am->umur($pelapor_tgl_lahir); ?> tahun </td>
	<tr><td class="label">Pekerjaan </td><td> : <?php echo $pelapor_pekerjaan; ?>  </td>
	<tr><td class="label">Alamat </td><td> : <?php echo $pelapor_alamat; ?>  </td>
</table>
<br /><br />
<center>
	<?php echo $desa->desa . ", ".flipdate($tanggal) ?> <br />
	 <?php echo $ttd_jabatan ." ". $desa->bentuk_lembaga ?> <br /> <br /><br /><br />
	<?php echo $ttd_nama ?> <br />
</center>


</td></tr>
</table>
</body>

</html>