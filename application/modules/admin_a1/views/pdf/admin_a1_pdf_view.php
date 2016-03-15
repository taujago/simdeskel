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
 	  <span class="judul">BUKU PERATURAN <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>

 
 <p   style="font-weight:bold; text-align:right">MODEL A.1</p>
 <br /><br />
 
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
<tr>
<th width="3%" align="center"><strong>No. </strong></th>
<th width="16%" align="center"><strong>NOMOR DAN TANGGAL PERATURAN DESA </strong></th>
<th width="20%" align="center"><strong>TENTANG</strong></th>
<th width="16%" align="center"><strong>URAIAN SINGKAT</strong></th>
 <th width="15%" align="center"><strong>NO. DAN TGL. PERSETUJUAN BPD </strong></th> 
<th width="16%" align="center"><strong>NO. DAN TGL. DILAPORKAN </strong></th> 
<th width="14%" align="center"><strong>KET </strong></th>
</tr>
<tr>
<th width="3%" align="center"><strong>1</strong></th>
<th width="16%" align="center"><strong>2 </strong></th>
<th width="20%" align="center"><strong>3</strong></th>
<th width="16%" align="center"><strong>4</strong></th>
 <th width="15%" align="center"><strong>5</strong></th> 
<th width="16%" align="center"><strong>6</strong></th> 
<th width="14%" align="center"><strong>7 </strong></th>
</tr>
</thead>

<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
	<tr>
		<td width="3%"><?php echo $i ?></td>
		<td width="16%"><?php echo $data->nomor ?><br>
		 <?php echo flipdate($data->tanggal) ?></td>
		<td width="20%"><?php echo $data->tentang; ?></td>
		<td width="16%"><?php echo $data->uraian_singkat; ?></td>
		<td width="15%"><?php echo $data->persetujuan_bpd_nomor ?> <br>
		<?php echo flipdate($data->persetujuan_bpd_tgl) ?></td>
		<td width="16%"><?php echo $data->dilaporkan_nomor ?> <br>
		<?php echo flipdate($data->dilaporkan_tgl) ?></td>
        <td width="14%"><?php echo $data->keterangan ?> </td>
	</tr>
<?php endforeach; ?>

</table> 
 




<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>