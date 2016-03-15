<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>
<style>
  * {
  	font-size:10px;
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
 	<h2> BUKU KEPUTUSAN KEPALA <?php echo strtoupper($desa2->bentuk_lembaga) ?> </h2>
 	<h2> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?> </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>


 </center>-->
 <p style="text-align:center">
 	  <span class="judul"> BUKU KEPUTUSAN KEPALA <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 <p   style="font-weight:bold; text-align:right">MODEL A.2</p>
 <br /><br />
 
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
<tr>
<th width="6%" align="center">No. </th>
<th width="18%" align="center">NOMOR DAN TANGGAL PERATURAN DESA </th>
<th width="22%" align="center">TENTANG</th>
<th width="19%" align="center">URAIAN SINGKAT</th>
<th width="17%" align="center">NO. DAN TGL. DILAPORKAN </th> 
<th width="18%" align="center">KET </th>
</tr>

	<tr>
	  <th align="center">1</th>
	  <th align="center">2</th>
	  <th align="center">3</th>
	  <th align="center">4</th>
	  <th align="center">5</th>
	  <th align="center">6</th>
  </tr>
  </thead>
  
<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>

	<tr>
		<td width="6%"><?php echo $i ?></td>
		<td width="18%"><?php echo $data->nomor ?><br>
		 <?php echo flipdate($data->tanggal) ?></td>
		<td width="22%"><?php echo $data->tentang; ?></td>
		<td width="19%"><?php echo $data->uraian_singkat; ?></td>
		<td width="17%"><?php echo $data->dilaporkan_nomor ?> <br>
		<?php echo flipdate($data->dilaporkan_tgl) ?></td>
        <td width="18%"><?php echo $data->keterangan ?> </td>
	</tr>
<?php endforeach; ?>

</table> 
 




<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>