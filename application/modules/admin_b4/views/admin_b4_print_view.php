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
 	<h2> BUKU DATA PENDUDUK SEMENTARA <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <p   style="font-weight:bold; text-align:right">MODEL B.4</p>
 <br /><br />
<table width="100%" border="0" class="laporan">
   <tr>
     <th rowspan="2" scope="col">NO. </th>
     <th rowspan="2" scope="col">NAMA LENGKAP</th>
     <th colspan="2" scope="col">JENIS KELAMIN</th>
     <th rowspan="2" scope="col">NOMOR IDENTITAS</th>
     <th rowspan="2" scope="col">TEMPAT TANGGAL LAHIR / UMUR</th>
     <th rowspan="2" scope="col">PEKERJAAN</th>
     <th colspan="2" scope="col">KEWARGANEGARAAN</th>
     <th rowspan="2" scope="col">DATANG DARI</th>
     <th rowspan="2" scope="col">MAKSUD KEDATANGAN</th>
     <th rowspan="2" scope="col">NAMA DAN ALAMAT YG DIDATANGI</th>
     <th rowspan="2" scope="col">DATANG TANGGAL</th>
     <th rowspan="2" scope="col">PERGI TANGGAL</th>
     <th rowspan="2" scope="col">KET</th>
   </tr>
   <tr>
     <td>LK</td>
     <td>PR</td>
     <th>KEBANGSAAN</th>
     <th>KETURUNAN</th>
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
     <th>15</th>
   </tr>
   <?php $n=0; 
   foreach($record->result() as $row) : 
   $n++;
   ?>
   <tr>
     <td><?php echo $n; ?></td>
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