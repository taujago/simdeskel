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
 <p   style="font-weight:bold; text-align:right">MODEL A.3</p>
 <br /><br />
 
<table class="laporan" width="100%">
<thead>
<tr>
<th width="3%" rowspan="2">No. </th>
<th width="7%" rowspan="2">JENIS BARANG / BANGUNAN</th>
<th colspan="3">ASAL BARANG / BANGUNAN</th>
<th colspan="2">KEADAAN AWAL TAHUN</th>
<th colspan="4">PENGHAPUSAN</th>
<th colspan="2">KEADAAN AKHIR TAHUN</th>
<th width="9%" rowspan="2">KET </th>
</tr>
<tr>
  <th width="7%">DIBELI SENDIRI</th>
  <th width="9%">PEMERINTAH</th>
  <th width="9%">SUMBANGAN</th>
  <th width="6%">BAIK</th>
  <th width="7%">RUSAK</th>
  <th width="6%">RUSAK</th>
  <th width="6%">DIJUAL</th>
  <th width="11%">DISUMBANGKAN</th>
  <th width="8%">TANGGAL </th>
  <th width="5%">BAIK</th>
  <th width="7%">RUSAK</th>
  </tr>
<tr>
  <th>1</th>
  <th>2</th>
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
  <th>14</th>
</tr>
</thead>
<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
<tr>
  <td><?php echo $i ?></td>
  <td><?php echo $data->jenis_inventaris; ?></td>
  <td><?php echo $data->asal_sendiri; ?></td>
  <td><?php echo $data->asal_pemerintah; ?></td>
  <td><?php echo $data->asal_sumbangan; ?></td>
  <td><?php echo $data->awal_tahun_baik; ?></td>
  <td><?php echo $data->awal_tahun_rusak; ?></td>
  <td><?php echo $data->hapus_rusak; ?></td>
  <td><?php echo $data->hapus_jual; ?></td>
  <td><?php echo $data->hapus_sumbang; ?></td>
  <td><?php echo flipdate($data->hapus_tanggal); ?></td>
  <td><?php echo $data->akhir_tahun_baik; ?></td>
  <td><?php echo $data->akhir_tahun_rusak; ?></td>
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