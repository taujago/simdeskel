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
 	<h2> BUKU DATA INDUK PENDUDUK <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <p   style="font-weight:bold; text-align:right">MODEL B.1</p>
 <br /><br />
<table width="100%" border="0" class="laporan">
   <tr>
     <th rowspan="2" scope="col">NO.</th>
     <th rowspan="2" scope="col">NAMA LENGKAP</th>
     <th rowspan="2" scope="col">JK</th>
     <th rowspan="2" scope="col">STATUS PERKAWINAN</th>
     <th colspan="2" scope="col">TTL</th>
     <th rowspan="2" scope="col">AGAMA</th>
     <th rowspan="2" scope="col">PENDIDIKAN TERAKHIR</th>
     <th rowspan="2" scope="col">PEKERJAAN</th>
     <th rowspan="2" scope="col">DAPAT MEMBACA HURUF</th>
     <th rowspan="2" scope="col">KEWARGANEGARAAN</th>
     <th rowspan="2" scope="col">ALAMAT </th>
     <th rowspan="2" scope="col">KEDUKAN DALAM KELUARGA</th>
     <th rowspan="2" scope="col">NO. KTP</th>
     <th rowspan="2" scope="col">NO. KSK</th>
     <th rowspan="2" scope="col">KET</th>
   </tr>
   <tr>
     <th>TEMPAT LAHIR</th>
     <th>TANGGAL LAHIR</th>
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
     <th>16</th>
   </tr>
   <?php 
   $arr_status_kawin = $this->cm->arr_status_kawin;
   $arr_baca_tulis = $this->cm->arr_baca_tulis;
   $i=0;
   foreach($record->result() as $row) : 
   $i++;
   ?>
   <tr>
     <td><?php echo $i; ?></td>
     <td><?php echo $row->nama; ?></td>
     <td><?php echo $row->jk; ?></td>
     <td><?php echo $arr_status_kawin[$row->status_kawin]; ?></td>
     <td><?php echo $row->tmp_lahir; ?></td>
     <td><?php echo  $row->tgl_lahir ; ?></td>
     <td><?php echo $row->agama; ?></td>
     <td><?php echo $row->pendidikan; ?></td>
     <td><?php echo $row->pekerjaan; ?></td>
     <td><?php echo $arr_baca_tulis[$row->baca_tulis]; ?></td>
     <td><?php echo $row->warga_negara; ?></td>
     <td><?php echo $row->alamat; ?></td>
     <td><?php echo @$this->dm->kedudukan_keluarga($row->id_penduduk); ?></td>
     <td><?php echo $row->nik; ?></td>
     <td><?php echo $row->no_kk; ?></td>
     <td>&nbsp;</td>
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