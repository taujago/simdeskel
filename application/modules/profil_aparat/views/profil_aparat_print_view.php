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
 	<h2> BUKU DATA APARATUR  <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <br /><br />
 
<table class="laporan" width="100%">
	<thead>
		<tr>
			<th>NO. </th>
			<th>NAMA </th>
			<th>NIAP </Th>	
			<th>NIP </Th>
			<th>JK</Th>
			<th>TMP / TGL LAHIR </Th>
			<th>AGAMA </Th>
			<th>PANGKAT / GOLONGAN </Th>
			<th>JABATAN  </Th>
			<th>PENDIDIKAN TERAKHIR </Th>
			<th>NO. DAN TANGGAL PENGANGKATAN </Th>		
			<th>NO. DAN TANGGAL PEMBERHENTIAN </Th>	
			<th>KETERANGAN</Th>		

		</tr>
		<tr>
			<th>1</th>
			<th>2</th>
			<th>3 </Th>
			<th>4</Th>	
			<th>5</Th>
			<th>6</Th>	
			<th>7</th>
			<th>8</th>
			<th>9 </Th>
			<th>10</Th>	
			<th>11</Th>
			<th>12</Th>		
			<th>13</Th>		

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
		<td><?php echo $data->niap ?></td>
		<td><?php echo $data->nip ?></td>
		<td><?php echo $data->jk ?></td>
		<td><?php echo $data->tmp_lahir. " ".flipdate($data->tgl_lahir); ?></td>
		<td><?php echo $data->agama ?></td>
		<td><?php echo $data->pangkat ?></td>
		<td><?php echo $data->jabatan ?></td>
		<td><?php echo $data->pendidikan ?></td>		 
		<td><?php echo "No. : ".$data->pengangkatan_no. "<Br />Tgl :  ".flipdate($data->pengangkatan_tgl) ?></td>
		<td><?php echo "No. : ".$data->berhenti_no. "<br /> Tgl :".flipdate($data->berhenti_tgl) ?></td>
		<td><?php echo $data->keterangan ?></td>	
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
	<!-- <tr>
		<td align="center">    <?php echo strtoupper($desa2->bentuk_lembaga) . " ".$desa2->desa; ?>
		</td>
		<TD align="center">
			  
		</TD>
		
	</tr> -->
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