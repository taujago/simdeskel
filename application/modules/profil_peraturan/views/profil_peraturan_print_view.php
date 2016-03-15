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
 	<h2> BUKU PERATURAN <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <br /><br />
 
<table class="laporan" width="100%">
	<thead>
		<tr>
			<th>No. </th>
			<th colspan="2">SURAT</th>
			<th rowspan="2">TENTANG </Th>
			<th rowspan="2">URAIAN SINGKAT </Th>
			<th colspan="2">PERSETUJUAN BPD </Th>	
			<th colspan="2"> DILAPORKAN </Th>
		</tr>
		<tr>
		  <th>&nbsp;</th>
		  <th>NOMOR</th>
		  <th>TANGGAL</th>
		  <th>NOMOR</Th>
		  <th>TANGAL</Th>
		  <th>NOMOR</Th>
		  <th>TANGGAL</Th>
	  </tr>
		<tr>
			<th>1</th>
			<th>2</th>
			<th>3</th>
			<th>4</Th>
			<th>5</Th>
			<th>6</Th>	
			<th>7</Th>
			<th>8</Th>
			<th>9</Th>		

		</tr>
	</thead>
	<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $data->nomor ?></td>
		<td><?php echo flipdate($data->tanggal) ?></td>
		<td><?php echo $data->tentang; ?></td>
		<td><?php echo $data->uraian; ?></td>
		<td><?php echo $data->persetujuan_bpd_no ?></td>
		<td><?php echo flipdate($data->persetujuan_bpd_tgl) ?></td>
		<td><?php echo $data->dilaporkan_no ?></td>
		<td><?php echo flipdate($data->dilaporkan_tgl) ?></td>
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