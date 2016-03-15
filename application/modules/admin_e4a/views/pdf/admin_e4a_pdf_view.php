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
<!-- 
 <center>
 	<h2> BUKU DATA AGENDA BPD </h2>
 	<h2> MODEL E.4.a </h2>
 </center>
 <br /><br />
 -->
 
 
<p style="text-align:center">
 	  <span class="judul"> BUKU DATA AGENDA BPD  <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 
 <p   style="font-weight:bold; text-align:right">MODEL E.4.a </p> 
<br /><br />
 
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
<tr>
<th width="3%" rowspan="3" align="center"><strong>No.</strong></th>
<th width="10%" rowspan="3" align="center"><strong>TANGGAL</strong></th>
<th colspan="4" align="center" width="39%"><strong>SURAT MASUK</strong></th>
<th colspan="3" align="center" width="35%"><strong>SURAT KELUAR</strong></th>
<th width="12%" rowspan="3" align="center"><strong>KET</strong></th>
</tr>
<tr>
<th colspan="2" align="center" width="17%"><strong>SURAT</strong></th>
<th width="10%" rowspan="2" align="center"><strong>PENGIRIM</strong></th> 
<th width="12%" rowspan="2" align="center"><strong>ISI<BR>SINGKAT</strong></th>
<th width="12%" rowspan="2" align="center"><strong>ISI<BR>SINGKAT</strong></th>
<th width="8%" rowspan="2" align="center"><strong>TANGGAL<BR>PENGIRIMAN</strong></th>
<th width="15%" rowspan="2" align="center"><strong>TUJUAN</strong></th>
</tr>
<tr>
<th width="10%" align="center"><strong>NOMOR</strong></th>
<th width="7%" align="center"><strong>TANGGAL</strong></th>
</tr>
<tr>
<th align="center"><strong>1</strong></th>
<th align="center"><strong>2</strong></th>
<th align="center"><strong>3</strong></th>
<th align="center"><strong>4</strong></th>
<th align="center"><strong>5</strong></th> 
<th align="center"><strong>6</strong></th> 
<th align="center"><strong>7 </strong></th>
<th align="center"><strong>8</strong></th> 
<th align="center"><strong>9</strong></th> 
<th align="center"><strong>10</strong></th>
</tr>
</thead>

<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td width="3%"><?php echo $i ?></td>
		<td><?php echo flipdate($data->tanggal) ?></td>
		<td><?php echo $data->nomor_surat_masuk; ?></td>
		<td width="7%"><?php echo flipdate($data->tanggal_surat_masuk); ?></td>
		<td width="10%"><?php echo $data->pengirim_surat_masuk ?></td>
		<td width="12%"><?php echo $data->isi_surat_masuk ?></td>
		<td width="12%"><?php echo $data->isi_surat_keluar ?></td>
		<td width="8%"><?php echo flipdate($data->tanggal_surat_keluar) ?></td>
      <td width="15%"><?php echo $data->tujuan ?> </td>
        <td width="12%"><?php echo $data->ket ?> </td>
	</tr>
<?php endforeach; ?>

</table> 
 




<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>