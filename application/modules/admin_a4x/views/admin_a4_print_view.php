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
 	<h2>DATA APARATUR PEMERINTAH <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <p   style="font-weight:bold; text-align:right">MODEL A.4</p>
 <br /><br />
<table width="100%" border="0" class="laporan">
   <tr>
     <th scope="col">NO. </th>
     <th scope="col">NAMA</th>
     <th scope="col">NIAP</th>
     <th scope="col">NIP</th>
     <th scope="col">JK</th>
     <th scope="col">TEMPAT TANGGAL LAHIR</th>
     <th scope="col">AGAMA</th>
     <th scope="col">PANGKAT<br>
       GOLONGAN</th>
     <th scope="col">JABATAN</th>
     <th scope="col">PENDIDIKAN TERAKHIR</th>
     <th scope="col">NO. DAN TGL. PENGANGKATAN</th>
     <th scope="col">NO. DAN TGL PEMBERHENTIAN</th>
     <th scope="col">KETERANGAN</th>
   </tr>
   <tr>
     <th scope="col">1</th>
     <th scope="col">2</th>
     <th scope="col">3</th>
     <th scope="col">4</th>
     <th scope="col">5</th>
     <th scope="col">6</th>
     <th scope="col">7</th>
     <th scope="col">8</th>
     <th scope="col">9</th>
     <th scope="col">10</th>
     <th scope="col">11</th>
     <th scope="col">12</th>
     <th scope="col">13</th>
   </tr>
   <?php 
   $i=0;
   foreach($record->result() as $data) : 
   $i++;
   ?> 
   <tr>
     <td scope="col"><?php echo $i; ?></td>
     <td scope="col"><?php echo $data->nama; ?></td>
     <td scope="col"><?php echo $data->niap; ?></td>
     <td scope="col"><?php echo $data->nip; ?></td>
     <td scope="col"><?php echo $data->jk; ?></td>
     <td scope="col"><?php echo $data->tmp_lahir. "<br />". flipdate($data->tgl_lahir); ?></td>
     <td scope="col"><?php echo $data->agama; ?></td>
     <td scope="col"><?php echo $data->pangkat."<br />". $data->golongan; ?></td>
     <td scope="col"><?php echo $data->jabatan; ?></td>
     <td scope="col"><?php echo $data->pendidikan_terakhir; ?></td>
     <td scope="col"><?php echo $data->pengangkatan_nomor."<br />".flipdate($data->pengangkatan_tanggal); ?></td>
     <td scope="col"><?php echo $data->pemberhentian_nomor."<br />".flipdate($data->pemberhentian_tanggal); ?></td>
     <td scope="col"><?php echo $data->keterangan; ?></td>
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