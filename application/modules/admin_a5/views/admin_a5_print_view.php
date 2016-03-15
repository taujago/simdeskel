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
 	<h2>BUKU DATA TANAH MILIK <?php echo strtoupper($desa2->bentuk_lembaga) ?> / TANAH KAS <?php echo strtoupper($desa2->bentuk_lembaga) ?></h2>
   <h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>
 <p   style="font-weight:bold; text-align:right">MODEL A.5</p>
 <br /><br />
<table width="100%" border="0" class="laporan">
   <tr>
     <th rowspan="3" scope="col">No.</th>
     <th rowspan="3" scope="col">ASAL TANA MILIK DESA</th>
     <th rowspan="3" scope="col">NOMOR SERTIFIKAT, BUKU LETTER C / PERSIL</th>
     <th rowspan="3" scope="col">LUAS</th>
     <th rowspan="3" scope="col">KELAS</th>
     <th colspan="6" scope="col">PEROLEHAN TKD</th>
     <th colspan="5" scope="col">JENIS TKD</th>
     <th colspan="2" scope="col">PATOK BATAS</th>
     <th colspan="2" scope="col">PAPAN NAMA</th>
     <th rowspan="3" scope="col">LOKASI</th>
     <th rowspan="3" scope="col">PERUNTUKAN </th>
     <th rowspan="3" scope="col">KETERANGAN</th>
   </tr>
   <tr>
     <th rowspan="2">ASLI MILIK DESA</th>
     <th colspan="3">BANTUAN</th>
     <th rowspan="2">LAIN - LAIN</th>
     <th rowspan="2">TGL PEROLEHAN</th>
     <th rowspan="2">SAWAH</th>
     <th rowspan="2">TEGALAN</th>
     <th rowspan="2">KEBUN</th>
     <th rowspan="2">TAMBAK / KOLAM</th>
     <th rowspan="2">TANAH KERING/DARAT</th>
     <th rowspan="2">ADA</th>
     <th rowspan="2">TIDAK ADA</th>
     <th rowspan="2">ADA</th>
     <th rowspan="2">TIDAK ADA</th>
   </tr>
   <tr>
     <th>PEMERINTAH</th>
     <th>PROV</th>
     <th>KAB./ KOTA</th>
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
     <th>17</th>
     <th>18</th>
     <th>19</th>
     <th>20</th>
     <th>21</th>
     <th>22</th>
     <th>23</th>
   </tr>
   <?php 
   $i=0 ;
   foreach($record->result() as $row) : 
   $i++;
   ?>
   
   <tr>
     <td><?php echo $i;  ?></td>
     <td><?php echo $row->asal_tanah; ?></td>
     <td><?php echo $row->nomor_sertifikat; ?></td>
     <td><?php echo $row->luas; ?></td>
     <td><?php echo $row->kelas_tanah; ?></td>
     <td><?php echo $row->luas_biaya_desa; ?></td>
     <td><?php echo $row->luas_biaya_pemerintah; ?></td>
     <td><?php echo $row->luas_biaya_pemprov; ?></td>
     <td><?php echo $row->luas_biaya_pemkab; ?></td>
     <td><?php echo $row->luas_biaya_lainnya; ?></td>
     <td><?php echo flipdate($row->tanggal_perolehan); ?></td>
     <td><?php echo $row->jenis_sawah; ?></td>
     <td><?php echo $row->jenis_tegalan; ?></td>
     <td><?php echo $row->jenis_kebun; ?></td>
     <td><?php echo $row->jenis_kolam; ?></td>
     <td><?php echo $row->jenis_tanah_kering; ?></td>
     <td><?php echo $row->tanda_ada; ?></td>
     <td><?php echo $row->tanda_tidak_ada; ?></td>
     <td><?php echo $row->papan_nama_ada; ?></td>
     <td><?php echo $row->papan_nama_tidak_ada; ?></td>
     <td><?php echo $row->lokasi; ?></td>
     <td><?php echo $row->peruntukan; ?></td>
     <td><?php echo $row->keterangan; ?></td>
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