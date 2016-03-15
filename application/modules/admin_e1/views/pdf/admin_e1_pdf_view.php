<html>
	<head>
		<title>
			<?php echo   $title; ?>
		</title>

  <style>
  * {
  	font-size:6px;
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
 
	<?php 
	$desa2 = $this->cm->data_desa();

	?>
 
<!-- <center>
 	<h2> BUKU DATA ANGGOTA BADAN PERMUSYAWARATAN DESA</h2>
 	<h2> TAHUN <?php echo $tahun; ?> </h2>
	<br>
 	<h2> MODEL E.1 </h2>


 </center>
 <br /><br />-->
 
 
 <p style="text-align:center">
 	  <span class="judul"> BUKU DATA ANGGOTA <br>
    BADAN PERMUSYAWARATAN  <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p>
 
 <p   style="font-weight:bold; text-align:right">MODEL E.1</p>
 <br /><br />
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
 
<tr>
<th width="3%" rowspan="2" align="center"><strong>NO</strong></th>
<th width="14%" rowspan="2" align="center"><strong><br>
  NAMA<BR>LENGKAP</strong></th>
<th width="3%" rowspan="2" align="center"><br>
  <br>
  JK</th>
<th colspan="2" align="center" width="11%"><strong>TEMPAT & TGL.<BR>LAHIR</strong></th>
<th width="6%" rowspan="2" align="center"><strong><br>
  <br>
  AGAMA</strong></th> 
<th width="6%" rowspan="2" align="center"><strong><br>
  <br>
  JABATAN</strong></th>
<th width="6%" rowspan="2" align="center"><strong><br>
  PENDIDIKAN<BR>TERAKAHIR</strong></th>
<th colspan="2" align="center" width="14%"><strong>KEPUTUSAN<BR>PENGANGKATAN</strong></th>
<th colspan="2" align="center" width="15%"><strong>KEPUTUSAN<BR>PEMBERHENTIAN</strong></th>
<th width="20%" rowspan="2" align="center"><strong><br>
  <br>
  KET</strong></th>
</tr>
<tr>
<th width="6%" align="center"><strong>TEMPAT</strong></th>
<th width="5%" align="center"><strong>TANGGAL</strong></th>
<th width="5%" align="center"><strong>TANGGAL</strong></th>
<th width="9%" align="center"><strong>NOMOR</strong></th>
<th width="5%" align="center"><strong>TANGGAL</strong></th>
<th width="10%" align="center"><strong>NOMOR</strong></th>
</tr>
<tr>
<th align="center"><strong>1</strong></th>
<th align="center"><strong>2 </strong></th>
<th align="center"><strong>3</strong></th>
<th align="center"><strong>4</strong></th>
<th align="center"><strong>5</strong></th> 
<th align="center"><strong>6</strong></th> 
<th align="center"><strong>7</strong></th>
<th align="center"><strong>8</strong></th>
<th align="center"><strong>9</strong></th>
<th align="center"><strong>10</strong></th> 
<th align="center"><strong>11</strong></th> 
<th align="center"><strong>12</strong></th>
<th align="center"><strong>13</strong></th>
</tr>
</thead>
<?php 
	$i=0;
	foreach($record->result() as $data) :  
		$i++;
	?>
  <tr>
<td width="3%"><strong><?php echo $i ?></strong></td>
<td width="14%"><?php echo $data->nama ?></td>
<td width="3%"><?php echo $data->jenis_kelamin; ?></td>
<td width="6%"><?php echo $data->tempat_lahir; ?></td>
<td width="5%"><?php echo flipdate($data->tanggal_lahir); ?></td> 
<td width="6%"><strong><?php echo $data->agama ?></strong></td> 
<td width="6%"><strong><?php echo $data->jabatan ?></strong></td>
<td width="6%"><?php echo $data->pendidikan_terakhir ?></td>
<td width="5%"><strong><?php echo flipdate($data->tanggal_pengangkatan) ?></strong></td>
<td width="9%"><?php echo $data->nomor_pengangkatan ?></td> 
<td width="5%"><?php echo flipdate($data->tanggal_pemberhentian) ?></td> 
<td width="10%"><?php echo $data->nomor_pemberhentian ?></td>
<td width="20%"><?php echo $data->ket ?></td>
</tr> 
 <?php endforeach; ?>
 

	






</table> 
 

 