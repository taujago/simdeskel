<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style_laporan_kecil.css">


		</head>

<body>
	<?php 
	$desa2 = $this->cm->data_desa();

	?>
 
 <center>
 	<h2>BUKU DATA TANAH DI <?php echo strtoupper($desa2->bentuk_lembaga) ?></h2>
   <h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <p   style="font-weight:bold; text-align:right">MODEL A.6</p>
 <br /><br />
<table width="100%" border="0" class="laporan">
   <tr>
     <th rowspan="3" scope="col">NO.</th>
     <th rowspan="3" scope="col">NAMA PEMILIK</th>
     <th rowspan="3" scope="col">LUAS</th>
     <th colspan="8" scope="col">SERTIFIKAT TANAH</th>
     <th colspan="13" scope="col">PENGGUNAAN TANAH</th>
   </tr>
   <tr>
     <th colspan="5">SUDAH BERSERTIFIKAT</th>
     <th colspan="3">BELUM BERSERTIFIKAT</th>
     <th colspan="5">NON PERTANIAN</th>
     <th colspan="8">PERTANIAN</th>
   </tr>
   <tr>
     <th>HM</th>
     <th>HGB</th>
     <th>HP</th>
     <th>HGU</th>
     <th>HPL</th>
     <th>MA</th>
     <th>VI</th>
     <th>TN</th>
     <th>PERU<br>
     MAHAN</th>
     <th>PERDA<br>
     GANGAN</th>
     <th>PERKAN<br>
     TORAN</th>
     <th>INDUSTRI</th>
     <th>FASILITAS UMUM</th>
     <th>SAWAH</th>
     <th>TEGALAN</th>
     <th>PERKE<br>
     BUNAN</th>
     <th>PETERNAKAN /PERIKANAN</th>
     <th>HUTAN BELUKAR</th>
     <th>HUTAN LINDUNG</th>
     <th>TANAH KOSONG</th>
     <th>LAIN - LAIN </th>
   </tr>
   <?php 
   $i=0;
   foreach($record->result() as $row) : 
   $i++;
   ?>
   <tr>
     <td><?php echo $i; ?></td>
     <td><?php echo $row->nama_pemilik ?></td>
     <td><?php echo $row->luas ?></td>
     <td><?php echo $row->luas_sertifikat_hm ?></td>
     <td><?php echo $row->luas_sertifikat_hgb ?></td>
     <td><?php echo $row->luas_sertifikat_hp ?></td>
     <td><?php echo $row->luas_sertifikat_hgu ?></td>
     <td><?php echo $row->luas_sertifikat_hpl ?></td>
     <td><?php echo $row->luas_sertifikat_ma ?></td>
     <td><?php echo $row->luas_sertifikat_vi ?></td>
     <td><?php echo $row->luas_sertifikat_tn ?></td>
     <td><?php echo $row->non_pertanian_perumahan ?></td>
     <td><?php echo $row->non_pertanian_perdagangan ?></td>
     <td><?php echo $row->non_pertanian_perkantoran ?></td>
     <td><?php echo $row->non_pertanian_industri ?></td>
     <td><?php echo $row->non_pertanian_fasilitas_umum ?></td>
     <td><?php echo $row->pertanian_sawah ?></td>
     <td><?php echo $row->pertanian_tegalan ?></td>
     <td><?php echo $row->pertanian_perkebunan ?></td>
     <td><?php echo $row->pertanian_peternakan ?></td>
     <td><?php echo $row->pertanian_hutan ?></td>
     <td><?php echo $row->pertanian_hutan_lindung ?></td>
     <td><?php echo $row->pertanian_tanah_kosong ?></td>
     <td><?php echo $row->pertanian_lain ?></td>
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