<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>
<style>
  * {
  	font-size:8px;
  }
  .judul {
  	font-size:14px;
	font-weight:bold;
  }
  
  
table.cetak th {
	border : 1px solid #000;
	vertical-align:middle;
	font-weight:bold;
}

table.cetak td {
	/*border-left : 1px solid #000;
	border-right : 1px solid #000;*/
	border:1px solid #000;
	
}
</style>
		</head>

<body>
	<?php 
	$desa2 = $this->cm->data_desa();

	?>
 
<!-- <center>
 	<h2> BUKU INVENTARIS <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>-->
 
  <p style="text-align:center">
 	  <span class="judul"> BUKU INVENTARIS <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 <p   style="font-weight:bold; text-align:right">MODEL A.3</p>
 <br /><br />
 
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
<tr>
<th width="3%" rowspan="2" align="center">No. </th>
<th width="7%" rowspan="2" align="center">JENIS BARANG / BANGUNAN</th>
<th colspan="3" align="center" width="25%">ASAL BARANG / BANGUNAN</th>
<th colspan="2" align="center" width="13%">KEADAAN AWAL TAHUN</th>
<th colspan="4" align="center" width="31%">PENGHAPUSAN</th>
<th colspan="2" align="center" width="12%">KEADAAN AKHIR TAHUN</th>
<th width="9%" rowspan="2" align="center">KET </th>
</tr>
<tr>
  <th width="7%" align="center">DIBELI SENDIRI</th>
  <th width="9%" align="center">PEMERINTAH</th>
  <th width="9%" align="center">SUMBANGAN</th>
  <th width="6%" align="center">BAIK</th>
  <th width="7%" align="center">RUSAK</th>
  <th width="6%" align="center">RUSAK</th>
  <th width="6%" align="center">DIJUAL</th>
  <th width="11%" align="center">DISUMBANGKAN</th>
  <th width="8%" align="center">TANGGAL </th>
  <th width="5%" align="center">BAIK</th>
  <th width="7%" align="center">RUSAK</th>
  </tr>
<tr>
  <th align="center">1</th>
  <th align="center">2</th>
  <th align="center">3</th>
  <th align="center">4</th>
  <th align="center">5</th>
  <th align="center">6</th>
  <th align="center">7</th>
  <th align="center">8</th>
  <th align="center">9</th>
  <th align="center">10</th>
  <th align="center">11</th>
  <th align="center">12</th>
  <th align="center">13</th>
  <th align="center">14</th>
</tr>
</thead>
<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
<tr>
  <td width="3%"><?php echo $i ?></td>
  <td width="7%"><?php echo $data->jenis_inventaris; ?></td>
  <td width="7%"><?php echo $data->asal_sendiri; ?></td>
  <td width="9%"><?php echo $data->asal_pemerintah; ?></td>
  <td width="9%"><?php echo $data->asal_sumbangan; ?></td>
  <td width="6%"><?php echo $data->awal_tahun_baik; ?></td>
  <td width="7%"><?php echo $data->awal_tahun_rusak; ?></td>
  <td width="6%"><?php echo $data->hapus_rusak; ?></td>
  <td width="6%"><?php echo $data->hapus_jual; ?></td>
  <td width="11%"><?php echo $data->hapus_sumbang; ?></td>
  <td width="8%"><?php echo flipdate($data->hapus_tanggal); ?></td>
  <td width="5%"><?php echo $data->akhir_tahun_baik; ?></td>
  <td width="7%"><?php echo $data->akhir_tahun_rusak; ?></td>
  <td width="9%"><?php echo $data->keterangan; ?></td>
</tr>



<?php endforeach; ?>

</table> 
 




<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>