<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>

 <style>
  * {
  	font-size:6px;
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
 	<h2> BUKU DATA PENDUDUK SEMENTARA <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 -->
 <p style="text-align:center">
    <span class="judul"> BUKU DATA PENDUDUK SEMENTARA  </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 <p   style="font-weight:bold; text-align:right">MODEL B.4   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
 <br /><br />
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
   <tr>
     <th width="3%" rowspan="2" align="center" scope="col">NO. </th>
     <th rowspan="2" align="center" scope="col">NAMA LENGKAP</th>
     <th colspan="2" align="center" scope="col">JENIS KELAMIN</th>
     <th rowspan="2" align="center" scope="col">NOMOR IDENTITAS</th>
     <th rowspan="2" align="center" scope="col">TEMPAT TANGGAL LAHIR / UMUR</th>
     <th rowspan="2" align="center" scope="col">PEKERJAAN</th>
     <th colspan="2" align="center" scope="col">KEWARGANEGARAAN</th>
     <th rowspan="2" align="center" scope="col">DATANG DARI</th>
     <th rowspan="2" align="center" scope="col">MAKSUD KEDATANGAN</th>
     <th rowspan="2" align="center" scope="col">NAMA DAN ALAMAT YG DIDATANGI</th>
     <th rowspan="2" align="center" scope="col">DATANG TANGGAL</th>
     <th rowspan="2" align="center" scope="col">PERGI TANGGAL</th>
     <th rowspan="2" align="center" scope="col">KET</th>
   </tr>
   <tr>
     <th align="center">LK</th>
     <th align="center">PR</th>
     <th align="center">KEBANGSAAN</th>
     <th align="center">KETURUNAN</th>
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
     <th align="center">15</th>
   </tr>
   </thead>
   <?php $n=0; 
   foreach($record->result() as $row) : 
   $n++;
   ?>
   <tr>
     <td width="3%"><?php echo $n; ?></td>
     <td><?php echo $row->nama; ?></td>
     <td><?php echo ($row->jk=="L")?"LK":""; ?></td>
     <td><?php echo	($row->jk=="P")?"PR":""; ?></td>
     <td><?php echo $row->nik; ?></td>
     <td><?php echo $row->tmp_lahir.", ".$row->tgl_lahir.". <br />".$row->umur." Tahun "; ?></td>
     <td><?php echo $row->pekerjaan ?></td>
     <td><?php echo $row->kebangsaan; ?></td>
     <td><?php echo $row->keturunan; ?></td>
     <td><?php echo ""; ?></td>
     <td><?php echo $row->sementara_maksud ?></td>
     <td><?php echo $row->sementara_nama." ".$row->sementara_alamat; ?></td>
     <td><?php echo flipdate($row->regdate); ?></td>
     <td><?php echo ""; ?></td>
     <td><?php echo ""; ?></td>
   </tr>
   <?php endforeach; ?>
</table>
<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>