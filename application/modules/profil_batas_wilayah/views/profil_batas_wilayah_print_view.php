<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css">


		</head>

<body>
	<?php 
	$desa2 = $this->cm->data_desa();

	?>

<!-- <div id="wrap" style="width:1024; margin:0px auto" >  -->
<div id="logo">
<img src="<?php echo base_url()."assets/images/$desa2->logo" ?>" width="100" height="128" />
</div>

<div id="header">
			<center>
			<h1> PEMERINTAH <?php echo strtoupper($desa2->kota); ?> </h1>
			<h1> KECAMATAN <?php echo strtoupper($desa2->kecamatan); ?> </h1>
			<h1> <?php echo strtoupper($desa2->bentuk_lembaga. " ".$desa2->desa); ?> </h1>
			<h3><?php echo $desa2->alamat . " " . $desa2->kodepos ?></h3>
			</center>	
	</div>
<div style="clear:both;"><hr /> </div>

<!-- <table border="0" width="100%">
	<tr>
		<td valign="top" align="right"> <img src="<?php echo base_url()."assets/images/$desa2->logo" ?>" width="100" height="128" /> </td>
		<td valign="top" width="70%">
			<center>
			<h1> PEMERINTAH <?php echo strtoupper($desa2->kota); ?> </h1>
			<h1> KECAMATAN <?php echo strtoupper($desa2->kecamatan); ?> </h1>
			<h1> <?php echo strtoupper($desa2->bentuk_lembaga. " ".$desa2->kecamatan); ?> </h1>
			<h3><?php echo $desa2->alamat . " " . $desa2->kodepos ?></h3>
			</center>

		</td>
	</tr>
	<tr><td colspan="2"><hr/></td></tr>
</table> -->

<br />
<br />
<br />
<center>
		<span id="judulsurat">SURAT KETERANGAN KELAKUAN BAIK</span><br />
     	<span id="nomor_surat"> No : <?php echo $no_surat ?> </span>
<br /><br /><br /> </center>

<p>Yang bertandatanga di bawah ini menerangkan bahwa : </p>
<div style="margin-left:100px;">
		<table>
			<tr><td class="label">Nama </td><td>: <?php echo $nama; ?> </td></tr>
			<tr><td class="label">Tempat, Tgl lahir </td><td>: <?php echo $tmp_lahir . ", ".$tgl_lahir; ?> </td></tr>
			<tr><td class="label">Jenis kelamin </td><td>: <?php echo $jk; ?> </td></tr>
			<tr><td class="label">Agama </td><td>: <?php echo $agama; ?> </td></tr>
			<tr><td class="label">Pekerjaan </td><td>: <?php echo $pekerjaan; ?> </td></tr>
			<tr><td class="label">Alamat </td><td>: <?php echo $alamat. "Rt $rt Rw $rw $dusun "; ?> </td></tr>
			<tr><td class="label">No. KTP / NIK </td><td>: <?php echo $nik; ?> </td></tr>
		</table>
</div>
 
 

<p>
Selanjutnya kami juga mengetahui bahwa orang tersebut diatas benar- benar 
membutuhkan surat keterangan 
kelakuan baik untuk dipakai sebagai pelengkap berkas di dalam pengurusan administrasi.
</p>	
Demikian surat pengantar ini dibuat dan diberikan kepada
 yang bersangkutan untuk dipergunakan sebagaimana mestinya.	</p>

 

<table width="100%" border=0 >
 
<tr><td aligh="center" valign="top" width="50%"> 
	<center>
	Mengetahui <br />
	Camat <?php echo $desa2->kecamatan ?> <br /><br /><br /><br /> 
	<?php echo $desa2->nama_camat; ?>
	</center>
</td>
	<td aligh="center" valign="top" width="50%"> 
	<center>	 
		<?php echo $desa2->desa.", ".flipdate($tanggal); ?><br />		 
		<?php echo $ttd_jabatan." ".$desa2->bentuk_lembaga ?>  <br /><br /><br /><br />
		
		<?php echo $ttd_nama ?>
	</center></td>	
</tr>

<tr>
	<td><br /><br />
	</td>
	<td><br /><br />
	</td>
</tr>
<tr>
	<td>
	<center>
	DANRAMIL <?php echo strtoupper($desa2->kota) ?> 
	<br /><br /><br /><br /> <br />
	( _______________________________ )<br />
	NRP : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</center>
	</td>

	<td><center>
	KAPOLSEK <?php echo strtoupper($desa2->kecamatan) ?> 
	<br /><br /><br /><br /> <br />
	( _______________________________ )<br />
	<span style="text-align:left">NRP : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
	</center>
	</td>
</tr>

</table>
<!-- </div> end of wrap -->
</body>

</html>