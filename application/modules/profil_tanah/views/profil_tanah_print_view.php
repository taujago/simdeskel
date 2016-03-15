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
 	<h2> BUKU DATA TANAH  <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <br /><br />
 
<table class="laporan" width="100%">
	<thead>
		<tr>
			<th rowspan="3">NO. </th>
			<th rowspan="3">ASAL TANAH MILIK <?php echo $desa2->bentuk_lembaga ?> </th>
			<th rowspan="3"> NOMOR SERTIFIKAT / BUKU LETTER C </Th>	
			<th rowspan="3">LUAS </Th>	
			<th rowspan="3">KELAS </Th>	
			<th colspan="5">PEROLEHAN TKD </Th>
			<th colspan="5">JENIS TKD </Th>
			<th colspan="2">PATOK BATAS </Th>	
			<th colspan="2">PAPAN NAMA </Th>		
			<th rowspan="3">LOKASI</Th>	
			<th rowspan="3">PERUNTUKAN</Th>	
			 

		</tr>

		<tr>
			<th rowspan="2">ASLI MILIK <?php echo $desa2->bentuk_lembaga ?></tH>
			<th colspan="3">BANTUAN</tH>
			<th rowspan="2">LAIN - LAIN </tH>
			<th rowspan="2">SAWAH </tH>
			<th rowspan="2">TEGAL </tH>
			<th rowspan="2">KEBUN </tH>
			<th rowspan="2">TAMBAK / KOLAM </tH>
			<th rowspan="2">TANAH KERING / DARAT </tH>
			<th rowspan="2">ADA </tH>
			<th rowspan="2">TIDAK ADA </tH>
			<th rowspan="2">ADA </tH>
			<th rowspan="2">TIDAK ADA  </tH>

		</tr>
		<tr>
			<th>PEMERINTAH</TH>
				<TH>PROVINSI </TH>
				<TH>KAB / KOT </TH>
		</tr>


		<tr>
			<?php 
			for ($i=1; $i<=21; $i++ ) {
			echo "<th>$i</th>";
			} ?>
		</tr>
	</thead>
	<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $data->asal ?></td>
		<td><?php echo $data->no_sertifikat ?></td>
		<td><?php echo $data->luas ?></td>
		<td><?php echo $data->kelas ?></td>
 		<td><?php echo $data->asli ?></td>
		<td><?php echo $data->pemerintah ?></td>
		<td><?php echo $data->provinsi ?></td>
		<td><?php echo $data->kota ?></td>		  
		<td><?php echo $data->lain ?></td>	
		<td><?php echo $data->sawah ?></td>		  
		<td><?php echo $data->tegal ?></td>	
		<td><?php echo $data->kebun ?></td>		  
		<td><?php echo $data->tambak ?></td>	
		<td><?php echo $data->tanah ?></td>		  
		<td><?php echo $data->patok_ada ?></td>	
		<td><?php echo $data->patok_tidak_ada ?></td>		  
		<td><?php echo $data->papan_nama_ada ?></td>	
		<td><?php echo $data->papan_nama_tidak_ada ?></td>		  
		<td><?php echo $data->lokasi ?></td>	
		<td><?php echo $data->peruntukan ?></td>	
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