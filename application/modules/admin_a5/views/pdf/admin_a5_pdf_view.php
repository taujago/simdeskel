<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>
 <style>
  * {
  	font-size:4px;
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
 	<h2>BUKU DATA TANAH MILIK <?php echo strtoupper($desa2->bentuk_lembaga) ?> / TANAH KAS <?php echo strtoupper($desa2->bentuk_lembaga) ?></h2>
   <h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>-->
 
 <p style="text-align:center">
 	  <span class="judul"> BUKU DATA TANAH MILIK <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 
 <p   style="font-weight:bold; text-align:right">MODEL A.5</p>
 <br /><br />
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
   <tr>
     <th rowspan="3" align="center" scope="col">No.</th>
     <th rowspan="3" align="center" scope="col">ASAL TANAH MILIK DESA</th>
     <th rowspan="3" align="center" scope="col">NOMOR SERTIFIKAT, BUKU LETTER C / PERSIL</th>
     <th rowspan="3" align="center" scope="col">LUAS</th>
     <th rowspan="3" align="center" scope="col">KELAS</th>
     <th colspan="6" align="center" scope="col">PEROLEHAN TKD</th>
     <th colspan="5" align="center" scope="col">JENIS TKD</th>
     <th colspan="2" align="center" scope="col">PATOK BATAS</th>
     <th colspan="2" align="center" scope="col">PAPAN NAMA</th>
     <th rowspan="3" align="center" scope="col">LOKASI</th>
     <th rowspan="3" align="center" scope="col">PERUNTUKAN </th>
     <th rowspan="3" align="center" scope="col">KET.</th>
   </tr>
   <tr>
     <th rowspan="2" align="center">ASLI MILIK DESA</th>
     <th colspan="3" align="center">BANTUAN</th>
     <th rowspan="2" align="center">LAIN - LAIN</th>
     <th rowspan="2" align="center">TGL PEROLEHAN</th>
     <th rowspan="2" align="center">SAWAH</th>
     <th rowspan="2" align="center">TEGALAN</th>
     <th rowspan="2" align="center">KEBUN</th>
     <th rowspan="2" align="center">TAMBAK / KOLAM</th>
     <th rowspan="2" align="center">TANAH KERING/DARAT</th>
     <th rowspan="2" align="center">ADA</th>
     <th rowspan="2" align="center">TIDAK ADA</th>
     <th rowspan="2" align="center">ADA</th>
     <th rowspan="2" align="center">TIDAK ADA</th>
   </tr>
   <tr>
     <th align="center">PEMERINTAH</th>
     <th align="center">PROV</th>
     <th align="center">KAB./ KOTA</th>
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
     <th align="center">16</th>
     <th align="center">17</th>
     <th align="center">18</th>
     <th align="center">19</th>
     <th align="center">20</th>
     <th align="center">21</th>
     <th align="center">22</th>
     <th align="center">23</th>
   </tr>
   </thead>
   <?php 
   $i=0 ;
   foreach($record->result() as $row) : 
   $i++;
   ?>
   
   <tr>
     <td><?php echo $i;  ?></td>
     <td><?php echo $row->asal_tanah; ?></td>
     <td><?php echo $row->nomor_sertifikat; ?></td>
     <td align="center"><?php echo $row->luas; ?></td>
     <td align="center"><?php echo $row->kelas_tanah; ?></td>
     <td align="center"><?php echo $row->luas_biaya_desa; ?></td>
     <td align="center"><?php echo $row->luas_biaya_pemerintah; ?></td>
     <td align="center"><?php echo $row->luas_biaya_pemprov; ?></td>
     <td align="center"><?php echo $row->luas_biaya_pemkab; ?></td>
     <td align="center"><?php echo $row->luas_biaya_lainnya; ?></td>
     <td align="center"><?php echo flipdate($row->tanggal_perolehan); ?></td>
     <td align="center"><?php echo $row->jenis_sawah; ?></td>
     <td align="center"><?php echo $row->jenis_tegalan; ?></td>
     <td align="center"><?php echo $row->jenis_kebun; ?></td>
     <td align="center"><?php echo $row->jenis_kolam; ?></td>
     <td align="center"><?php echo $row->jenis_tanah_kering; ?></td>
     <td align="center"><?php echo $row->tanda_ada; ?></td>
     <td align="center"><?php echo $row->tanda_tidak_ada; ?></td>
     <td align="center"><?php echo $row->papan_nama_ada; ?></td>
     <td align="center"><?php echo $row->papan_nama_tidak_ada; ?></td>
     <td><?php echo $row->lokasi; ?></td>
     <td><?php echo $row->peruntukan; ?></td>
     <td><?php echo $row->keterangan; ?></td>
   </tr>
   <?php endforeach; ?>
</table>
<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>