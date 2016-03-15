<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style_laporan.css">


		</head>

<body>
	<?php 
	$desa2 = $this->cm->data_desa();

	?>
 
 <center>
 	<h2> BUKU DATA ANGGOTA BADAN PERMUSYAWARATAN DESA</h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>
	<br>
 	<h2> MODEL E.1 </h2>


 </center>
 <br /><br />
 
<table class="laporan" width="100%">
<thead>
<tr>
<th rowspan="2" width="3%">NO</th>
<th rowspan="2" width="8%">NAMA<BR>LENGKAP</th>
<th rowspan="2" width="8%">JENIS<BR>KELAMIN</th>
<th colspan="2" width="16%">TEMPAT & TGL.<BR>LAHIR</th>
<th rowspan="2" width="8%">AGAMA</th> 
<th rowspan="2" width="8%">JABATAN</th>
<th rowspan="2" width="8%">PENDIDIKAN<BR>TERAKAHIR</th>
<th colspan="2" width="16%">KEPUTUSAN<BR>PENGANGKATAN</th>
<th colspan="2" width="16%">KEPUTUSAN<BR>PEMBERHENTIAN</th>
<th rowspan="2" width="8%">KET</th>
</tr>
<tr>
<th width="8%">TEMPAT</th>
<th width="8%">TANGGAL</th>
<th width="8%">TANGGAL</th>
<th width="8%">NOMOR</th>
<th width="8%">TANGGAL</th>
<th width="8%">NOMOR</th>
</tr>
<tr>
<th>1</th>
<th>2 </th>
<th>3</th>
<th>4</th>
<th>5</th> 
<th>6</th> 
<th>7</th>
<th>8</th>
<th>9</th>
<th>10</th> 
<th>11</th> 
<th>12</th>
<th>13</th>
</tr>
</thead>

<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $data->nama ?></td>
		<td><?php echo $data->jenis_kelamin; ?></td>
		<td><?php echo $data->tempat_lahir; ?></td>
		<td><?php echo flipdate($data->tanggal_lahir); ?></td>
		<td><?php echo $data->agama ?>
		<td><?php echo $data->jabatan ?>
		<td><?php echo $data->pendidikan_terakhir ?></td>
		<td><?php echo flipdate($data->tanggal_pengangkatan) ?></td>
        <td><?php echo $data->nomor_pengangkatan ?> </td>
		<td><?php echo flipdate($data->tanggal_pemberhentian) ?></td>
        <td><?php echo $data->nomor_pemberhentian ?> </td>
        <td><?php echo $data->ket ?> </td>
	</tr>
<?php endforeach; ?>

</table> 
 




<br /><br /><br />

<table width="100%">
	<tr>
		<td align="center">MENGETAHUI 
		</td>
		<TD align="center">
			<?php echo date("d-m-Y") ?>
		</TD>
	</tr>
	<tr>
		<td align="center"> KEPALA  <?php echo strtoupper($desa2->bentuk_lembaga) . " ".$desa2->desa; ?>
		</td>
		<TD align="center">
			SEKRETARIS 
		</TD>

	</tr>
	<tr>
		<td align="center">    <?php echo strtoupper($desa2->bentuk_lembaga) . " ".$desa2->desa; ?>
		</td>
		<TD align="center">
			  
		</TD>
		
	</tr>
	<tr>
		<td align="center">  <br /><br /><br />
			<?php echo  $desa2->nama_kepala_desa ?>
		</td>
		<td align="center">		 <br /><br /><br />
		<?php echo  $desa2->nama_sek_desa ?>	
		</td>
		
	</tr>
</table>
<!-- </div> end of wrap -->
</body>

</html>