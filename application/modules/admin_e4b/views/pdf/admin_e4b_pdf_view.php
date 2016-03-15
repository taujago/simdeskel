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
 	  <span class="judul"> BUKU  EKSPEDISI BPD  <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 
 
 <p   style="font-weight:bold; text-align:right">MODEL E.4.b </p> 
<br /><br />

<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
<tr>
<th width="5%" align="center"><strong>NO.<BR>URUT</strong></th>
<th width="10%" align="center"><strong>TANGGAL PENGIRIMAN</strong></th>
<th width="21%" align="center"><strong>TANGGAL DAN NOMOR SURAT</strong></th>
<th width="20%" align="center"><strong>ISI SINGKAT SURAT YANG DIKIRIM</strong></th>
<th width="26%" align="center"><strong>SURAT YANG DITUJU</strong></th> 
<th width="18%" align="center"><strong>KETERANGAN</strong></th> 
</tr>
<tr>
<th width="5%" align="center"><strong>1</strong></th>
<th width="10%" align="center"><strong>2 </strong></th>
<th width="21%" align="center"><strong>3</strong></th>
<th width="20%" align="center"><strong>4</strong></th>
<th width="26%" align="center"><strong>5</strong></th> 
<th width="18%" align="center"><strong>6</strong></th> 
</tr>
</thead>

<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td width="5%"><?php echo $i ?></td>
		<td width="10%"><?php echo flipdate($data->tanggal) ?></td>
		<td width="21%"><?php echo "Tanggal : ".flipdate($data->tanggal)."<br>Nomor : ".$data->no_surat ?></td>
		<td width="20%"><?php echo $data->isi; ?></td>
		<td width="26%"><?php echo $data->tujuan ?> </td>
        <td width="18%"><?php echo $data->ket ?> </td>
	</tr>
<?php endforeach; ?>

</table> 
 




<br /><br />
<!-- </div> end of wrap -->
</body>

</html>