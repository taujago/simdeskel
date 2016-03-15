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
 	<h2> BUKU INVENTARIS <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <br /><br />
 
<table class="laporan" width="100%">
	<thead>
		<tr>
				<th rowspan="2"   width="5" sortable="true"><strong>No</strong> </th> 
 				<th rowspan="2"   width="100" sortable="true"><strong>Tanggal</strong> </th>
				<th rowspan="2"  width="300" sortable="true"><strong>Barang / Jasa </strong> </th>
				<th colspan="5"   width="200" sortable="true"><strong> Asal Barang / Bangunan </strong> </th>
				<th colspan="2"  width="200" sortable="true"><strong>Kondisi Barang / Bangunan </strong> </th>
				<th colspan="3"  width="200" sortable="true"><strong>Penghapusan </strong> </th>
				<th colspan="2"  width="200" sortable="true"><strong>Kondisi Barang / Bangunan akhir tahun </strong> </th>
				<th rowspan="2"  width="300" sortable="true"><strong> Keterangan </strong> </th>
			</tr>
			<tr>	
		 
				<th width="100" sortable="true"><strong>Beli sendiri </strong></th>
				<th width="100" sortable="true"><strong>Pemerintah</strong></th>
				<th width="100" sortable="true"><strong>Provinsi</strong></th>
				<th width="100" sortable="true"><strong>Kab / Kota </strong></th>
				<th width="100" sortable="true"><strong>Sumbangan</strong></th>
				<th width="100" sortable="true"><strong>Baik </strong></th>
				<th width="100" sortable="true"><strong>Rusak </strong></th>
				<th width="100" sortable="true"><strong>Dijual </strong></th>
				<th width="100" sortable="true"><strong>Disumbangkan</strong></th>
				<th width="100" sortable="true"><strong>Tanggal</strong></th>
				<th width="100" sortable="true"><strong>Baik </strong></th>
				<th width="100" sortable="true"><strong>Rusak </strong></th>
			</tr>
			<tr>	
		 
				<th width="100" sortable="true"><strong>1</strong></th>
				<th width="100" sortable="true"><strong>2</strong></th>
				<th width="100" sortable="true"><strong>3</strong></th>
				<th width="100" sortable="true"><strong>4 </strong></th>
				<th width="100" sortable="true"><strong>5</strong></th>
				<th width="100" sortable="true"><strong>6</strong></th>
				<th width="100" sortable="true"><strong>7</strong></th>
				<th width="100" sortable="true"><strong>8</strong></th>
				<th width="100" sortable="true"><strong>9</strong></th>
				<th width="100" sortable="true"><strong>10</strong></th>
				<th width="100" sortable="true"><strong>11</strong></th>
				<th width="100" sortable="true"><strong>12</strong></th>
				<th width="100" sortable="true"><strong>13</strong></th>
				<th width="100" sortable="true"><strong>14</strong></th>
				<th width="100" sortable="true"><strong>15</strong></th>
				<th width="100" sortable="true"><strong>16</strong></th>
			</tr>
	</thead>
	<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo flipdate($data->tanggal); ?></td>
		<td><?php echo $data->barang ?></td>
		<td><?php echo $data->asal_sendiri; ?></td>
		<td><?php echo $data->asal_pemerintah; ?></td>
		<td><?php echo $data->asal_provinsi; ?></td>
		<td><?php echo $data->asal_pemda; ?></td>
		<td><?php echo $data->asal_sumbangan; ?></td>
		<td><?php echo $data->kondisi_baik; ?></td>
		<td><?php echo $data->kondisi_rusak; ?></td>

		<td><?php echo $data->hapus_dijual; ?></td>
		<td><?php echo $data->hapus_disumbangkan; ?></td>
		<td><?php echo flipdate($data->hapus_tanggal); ?></td>

		<td><?php echo $data->kondisi_akhir_tahun_baik; ?></td>
		<td><?php echo $data->kondisi_akhir_tahun_rusak; ?></td>
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