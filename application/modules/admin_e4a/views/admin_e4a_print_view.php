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
 	<h2> BUKU DATA AGENDA BPD </h2>
 	<h2> MODEL E.4.a </h2>
 </center>
 <br /><br />
 
<table class="laporan" width="100%">
<thead>
<tr>
<th rowspan="3" width="3%">No.</th>
<th rowspan="3" width="10%">TANGGAL</th>
<th colspan="4" width="40%">SURAT MASUK</th>
<th colspan="3" width="30%">SURAT KELUAR</th>
<th rowspan="3" width="10%">KET</th>
</tr>
<tr>
<th colspan="2" width="20%">SURAT</th>
<th rowspan="2" width="10%">PENGIRIM</th> 
<th rowspan="2" width="10%">ISI<BR>SINGKAT</th>
<th rowspan="2" width="10%">ISI<BR>SINGKAT</th>
<th rowspan="2" width="10%">TANGGAL<BR>PENGIRIMAN</th>
<th rowspan="2" width="10%">TUJUAN</th>
</tr>
<tr>
<th width="10%">NOMOR</th>
<th width="10%">TANGGAL</th>
</tr>
<tr>
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
<th>5</th> 
<th>6</th> 
<th>7 </th>
<th>8</th> 
<th>9</th> 
<th>10</th>
</tr>
</thead>

<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo flipdate($data->tanggal) ?></td>
		<td><?php echo $data->nomor_surat_masuk; ?></td>
		<td><?php echo flipdate($data->tanggal_surat_masuk); ?></td>
		<td><?php echo $data->pengirim_surat_masuk ?></td>
		<td><?php echo $data->isi_surat_masuk ?></td>
		<td><?php echo $data->isi_surat_keluar ?></td>
		<td><?php echo flipdate($data->tanggal_surat_keluar) ?></td>
        <td><?php echo $data->tujuan ?> </td>
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