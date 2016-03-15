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
 	<h2> BUKU AGENDA <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <p   style="font-weight:bold; text-align:right">MODEL A.7</p>
 <br /><br />
<table width="100%" border="0" class="laporan">
   <tr>
     <th rowspan="3" scope="col">NO.</th>
     <th rowspan="3" scope="col">TANGGAL</th>
     <th colspan="4" scope="col">SURAT MASUK</th>
     <th colspan="3" scope="col">SURAT KELUAR</th>
     <th rowspan="3" scope="col">KETERANGAN</th>
   </tr>
   <tr>
     <th colspan="2">SURAT</th>
     <th rowspan="2">PENGIRIM</th>
     <th rowspan="2">ISI SINGKAT</th>
     <th rowspan="2">ISI SINGKAT</th>
     <th rowspan="2">TANGGAL/ NOMOR PENGIRIMAN</th>
     <th rowspan="2">TUJUAN</th>
   </tr>
   <tr>
     <th>NOMOR</th>
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
   </tr>
   <?php
   $i=0;
   foreach($record->result() as $row) : 
   $i++;
   ?>
   <tr>
     <td><?php  echo $i; ?></td>
     <td><?php  echo flipdate($row->tanggal); ?></td>
     <td><?php  echo $row->masuk_nomor; ?></td>
     <td><?php  echo flipdate($row->masuk_tanggal); ?></td>
     <td><?php  echo $row->masuk_pengirim; ?></td>
     <td><?php  echo $row->masuk_isi_singkat; ?></td>
     <td><?php  echo $row->keluar_isi_singkat; ?></td>
     <td><?php  echo flipdate($row->keluar_tanggal). " " . $row->keluar_nomor; ?></td>
     <td><?php  echo $row->keluar_tujuan; ?></td>
     <td><?php  echo $row->keterangan; ?></td>
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