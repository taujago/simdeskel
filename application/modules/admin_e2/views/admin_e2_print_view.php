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
 	<h2> BUKU DATA KEPUTUSAN BPD </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>
	<br>
 	<h2> MODEL E.2 </h2>
 </center>
 <br /><br />
 
<table class="laporan" width="100%">
<thead>
<tr>
<th rowspan="2" width="3%">NO</th>
<th colspan="2" width="10%">TANGGAL DAN NOMOR<BR>KEPUTUSAN</th>
<th rowspan="2" width="8%">TENTANG</th>
<th rowspan="2" width="12%">URAIAN SINGKAT</th> 
<th rowspan="2" width="10%">KETERANGAN</th>
</tr>
<tr>
<th width="5%">TANGGAL</th>
<th width="5%">NOMOR</th>
</tr>
<tr>
<th>1</th>
<th>2 </th>
<th>3</th>
<th>4</th>
<th>5</th> 
<th>6</th> 
</tr>
</thead>

<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo flipdate($data->tanggal_keputusan) ?></td>
		<td><?php echo $data->nomor_keputusan; ?></td>
		<td><?php echo $data->tentang; ?></td>
		<td><?php echo $data->uraian_singkat; ?></td>
		<td><?php echo $data->ket; ?></td>
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