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
 
<!-- <center>
 	<h2> BUKU AGENDA <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>-->
 
 <p style="text-align:center">
 	  <span class="judul"> BUKU AGENDA <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 
 
<p   style="font-weight:bold; text-align:right">MODEL A.7</p>
 <br /><br />
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead> 
   <tr>
     <th width="3%" rowspan="3" align="center" scope="col"><br>
       <br>
      NO.</th>
     <th width="7%" rowspan="3" align="center" scope="col"><br>
       <br>
       <br>
      TANGGAL</th>
     <th colspan="4" align="center" scope="col" width="44%">SURAT MASUK</th>
     <th colspan="3" align="center" scope="col" width="34%">SURAT KELUAR</th>
     <th width="10%" rowspan="3" align="center" scope="col"><br>
       <br>
       <br>
      KETERANGAN</th>
   </tr>
   <tr>
     <th colspan="2" align="center" width="19%">SURAT</th>
     <th width="11%" rowspan="2" align="center">PENGIRIM</th>
     <th width="14%" rowspan="2" align="center">ISI SINGKAT</th>
     <th width="14%" rowspan="2" align="center">ISI SINGKAT</th>
     <th width="10%" rowspan="2" align="center">TANGGAL/ NOMOR PENGIRIMAN</th>
     <th width="10%" rowspan="2" align="center">TUJUAN</th>
   </tr>
   <tr>
     <th width="8%" align="center">NOMOR</th>
     <th width="11%" align="center">TANGGAL</th>
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
   </tr>
   </thead>
   <?php
   $i=0;
   foreach($record->result() as $row) : 
   $i++;
   ?>
   <tr>
     <td width="3%"><?php  echo $i; ?></td>
     <td width="7%"><?php  echo flipdate($row->tanggal); ?></td>
     <td width="8%"><?php  echo $row->masuk_nomor; ?></td>
     <td width="11%"><?php  echo flipdate($row->masuk_tanggal); ?></td>
     <td width="11%"><?php  echo $row->masuk_pengirim; ?></td>
     <td width="14%"><?php  echo $row->masuk_isi_singkat; ?></td>
     <td width="14%"><?php  echo $row->keluar_isi_singkat; ?></td>
     <td width="10%"><?php  echo flipdate($row->keluar_tanggal). " " . $row->keluar_nomor; ?></td>
     <td width="10%"><?php  echo $row->keluar_tujuan; ?></td>
     <td width="10%"><?php  echo $row->keterangan; ?></td>
   </tr>
   <?php
   endforeach;
   ?>
</table>
<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>