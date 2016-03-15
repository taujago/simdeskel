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
 	<h2> BUKU KEPUTUSAN <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <br /><br />
 
<table class="laporan" width="100%">
	<thead>
		<tr>
		  <th>&nbsp;</th>
		  <th colspan="2">NOMOR DAN TANGGAL PERATURAN <?php echo strtoupper($desa2->bentuk_lembaga) ?></th>
		  <th>&nbsp;</Th>
		  <th>&nbsp;</Th>
		  <th colspan="2">NOMOR DAN TANGGAL DILAPORKAN </Th>
		  <th>&nbsp;</Th>
	  </tr>
		<tr>
			<th>No. </th>
			<th>NOMOR</th>
			<th>TANGGAL</th>
			<th>TENTANG </Th>
			<th>URAIAN SINGKAT </Th>
			<th>NOMOR</Th>	
 			<th>TANGGAL</Th>	
 			<th>KETERANGAN</Th>		

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

		</tr>
	</thead>
	<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php $data->nomor ?></td>
		<td><?php echo flipdate($data->tanggal) ?></td>
		<td><?php echo $data->tentang; ?></td>
		<td><?php echo $data->uraian; ?></td>
		<td><?php echo $data->dilaporkan_no ?></td>
 		<td><?php echo  flipdate($data->dilaporkan_tgl) ?></td>
		<td><?php echo $data->keterangan; ?></td>
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