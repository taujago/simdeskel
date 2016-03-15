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
 
 <!--<center>
 	<h2> BUKU EKSPEDISI <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>-->
 
 
 <p style="text-align:center">
 	  <span class="judul"> BUKU EKSPEDISI  <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>

<p   style="font-weight:bold; text-align:right">MODEL A.8</p>
 <br /><br />
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
   <tr>
     <th width="5%" align="center" scope="col"><strong>NOMOR</strong></th>
     <th width="16%" align="center" scope="col"><strong>TANGGAL PENGIRIMAN</strong></th>
     <th width="19%" align="center" scope="col"><strong>TANGGAL DAN NOMOR SURAT</strong></th>
     <th width="31%" align="center" scope="col"><strong>ISI SINGKAT SURAT YANG DIKIRIM</strong></th>
     <th width="17%" align="center" scope="col"><strong>TUJUAN SURAT</strong></th>
     <th width="12%" align="center" scope="col"><strong>KETERANGAN</strong></th>
   </tr>
   <tr>
     <th align="center"><strong>1</strong></th>
     <th align="center"><strong>2</strong></th>
     <th align="center"><strong>3</strong></th>
     <th align="center"><strong>4</strong></th>
     <th align="center"><strong>5</strong></th>
     <th align="center"><strong>6</strong></th>
   </tr>
   </thead>
   <?php 
   $i=0; 
   foreach($record->result() as $row) : 
   $i++;
   ?>
   <tr>
     <td width="5%"><?php echo $i; ?></td>
     <td width="16%"><?php echo flipdate($row->tanggal) ?></td>
     <td width="19%"><?php echo flipdate($row->surat_tanggal). "  " . $row->surat_nomor ?></td>
     <td width="31%"><?php echo $row->isi_singkat ?></td>
     <td width="17%"><?php echo $row->tujuan ?></td>
     <td width="12%"><?php echo $row->keterangan ?></td>
   </tr>
   <?php endforeach; ?>
</table>
<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>