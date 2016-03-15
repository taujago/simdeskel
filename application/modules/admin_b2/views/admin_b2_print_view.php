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
 	<h2> BUKU DATA MUTASI PENDUDUK <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <p   style="font-weight:bold; text-align:right">MODEL B.2</p>
 <br /><br />
<table width="100%" border="0" class="laporan">
   <tr>
     <th rowspan="2" scope="col">NO</th>
     <th rowspan="2" scope="col">NAMA LENGKAP</th>
     <th colspan="2" scope="col">TTL</th>
     <th rowspan="2" scope="col">JK</th>
     <th rowspan="2" scope="col">WARGA NEGARA</th>
     <th colspan="4" scope="col">PENAMBAHAN</th>
     <th colspan="4" scope="col">PENGURANGAN</th>
     <th rowspan="2" scope="col">KET</th>
   </tr>
   <tr>
     <th>TEMPAT</th>
     <th>TANGGAL</th>
     <th>DATANG DARI</th>
     <th>TANGGAL</th>
     <th>LAHIR</th>
     <th>TANGGAL</th>
     <th>PINDAH KE</th>
     <th>TANGGAL</th>
     <th>MATI</th>
     <th>TANGGAL</th>
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
   <?php 
   $i=0; 
   foreach($record->result() as $row ) : 
   $i++;
   ?>
   <tr>
     <td><?php echo $i; ?></td>
     <td><?php echo $row->nama; ?></td>
     <td><?php echo $row->tmp_lahir; ?></td>
     <td><?php echo  $row->tgl_lahir ; ?></td>
     <td><?php echo $row->jk; ?></td>
     <td><?php echo $row->warga_negara; ?></td>
     <td><?php echo $row->datang_dari; ?></td>
     <td><?php echo flipdate($row->datang_tanggal); ?></td>
     <td><?php echo $row->tmp_dilahirkan; ?></td>
     <td><?php echo flipdate($row->tgl_lahir2); ?></td>
     <td><?php echo $row->pindah_ke; ?></td>
     <td><?php echo flipdate($row->pindah_tanggal); ?></td>
     <td><?php echo $row->mati; ?></td>
     <td><?php echo flipdate($row->mati_tanggal); ?></td>
     <td>&nbsp;</td>
   </tr>
   <?php 
   endforeach;
   ?>
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