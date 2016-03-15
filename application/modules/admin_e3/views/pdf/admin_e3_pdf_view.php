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
 
<!-- <center>
 	<h2> BUKU PERATURAN DATA KEGIATAN BPD </h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>
	<br>
 	<h2> MODEL E.3 </h2>
 </center>

 <br /><br />-->
 
 
 <p style="text-align:center">
 	  <span class="judul"> BUKU PERATURAN DATA KEGIATAN BPD <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 
 <p   style="font-weight:bold; text-align:right">MODEL E.3</p> 
<br /><br />
 
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
<tr>
<th width="4%" align="center"><strong>No.</strong></th>
<th width="20%" align="center"><strong>TENTANG</strong></th>
<th width="22%" align="center"><strong>PELAKSANA</strong></th>
<th width="18%" align="center"><strong>POKOK-POKOK<BR>KEGIATAN</strong></th> 
<th width="18%" align="center"><strong>HASIL KEGIATAN</strong></th> 
<th width="18%" align="center"><strong>KETERANGAN</strong></th>
</tr>
<tr>
<th width="4%" align="center"><strong>1</strong></th>
<th width="20%" align="center"><strong>2 </strong></th>
<th width="22%" align="center"><strong>3</strong></th>
<th width="18%" align="center"><strong>4</strong></th>
<th width="18%" align="center"><strong>5</strong></th> 
<th width="18%" align="center"><strong>6</strong></th> 
</tr>
</thead>

<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td width="4%"><?php echo $i ?></td>
		<td width="20%"><?php echo $data->tentang ?></td>
		<td width="22%"><?php echo $data->pelaksana; ?></td>
		<td width="18%"><?php echo $data->pokok; ?></td>
		<td width="18%"><?php echo $data->hasil ?></td>
        <td width="18%"><?php echo $data->ket ?> </td>
	</tr>
<?php endforeach; ?>

</table> 
 




<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>