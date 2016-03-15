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
 
 
 
 
 <p style="text-align:center">
 	  <span class="judul"> BUKU DATA KEPUTUSAN BPD <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 
 <p   style="font-weight:bold; text-align:right">MODEL E.2</p> 
<br /><br />
 
<table width="100%" border="0" cellpadding="3" class="cetak">
 <thead>
<tr>
<th width="6%" rowspan="2" align="center">NO</th>
<th colspan="2" align="center" width="20%">TANGGAL DAN NOMOR<BR>KEPUTUSAN</th>
<th width="30%" rowspan="2" align="center"><br>
  <br>
  TENTANG</th>
<th width="25%" rowspan="2" align="center"><br>
  <br>
  URAIAN SINGKAT</th> 
<th width="19%" rowspan="2" align="center"><br>
  <br>
  KETERANGAN</th>
</tr>
<tr>
<th width="8%" align="center">TANGGAL</th>
<th width="12%" align="center">NOMOR</th>
</tr>
<tr>
<th align="center">1</th>
<th align="center">2 </th>
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
	  <td width="8%"><?php echo flipdate($data->tanggal_keputusan) ?></td>
	  <td width="12%"><?php echo $data->nomor_keputusan; ?></td>
	  <td width="30%"><?php echo $data->tentang; ?></td>
	  <td width="25%"><?php echo $data->uraian_singkat; ?></td>
		<td width="19%"><?php echo $data->ket; ?></td>
	</tr>
<?php endforeach; ?>

</table> 
 




<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>