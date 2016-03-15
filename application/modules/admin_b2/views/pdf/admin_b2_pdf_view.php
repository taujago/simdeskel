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

<body>
	<?php 
	$desa2 = $this->cm->data_desa();

	?>
 
 


 <p style="text-align:center">
 	  <span class="judul"> BUKU DATA MUTASI PENDUDUK <?php echo strtoupper($desa2->bentuk_lembaga) ?> </span>   <br>

 	 <span class="judul"> <?php echo strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span>    <br>

 	 <span class="judul"> TAHUN <?php echo $tahun; ?>   </span><br>

</p> 
 
 
<p   style="font-weight:bold; text-align:right">MODEL B.2</p>
 <br /><br />
<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
   <tr>
     <th width="3%" rowspan="2" align="center" scope="col"><strong>NO</strong></th>
     <th width="12%" rowspan="2" align="center" scope="col"><strong>NAMA LENGKAP</strong></th>
     <th colspan="2" align="center" scope="col" width="13%"><strong>TTL</strong></th>
     <th width="5%" rowspan="2" align="center" scope="col"><strong>JK</strong></th>
     <th width="10%" rowspan="2" align="center" scope="col"><strong>WARGA NEGARA</strong></th>
     <th colspan="4" align="center" scope="col" width="28%"><strong>PENAMBAHAN</strong></th>
     <th colspan="4" align="center" scope="col" width="26%"><strong>PENGURANGAN</strong></th>
     <th width="5%" rowspan="2" align="center" scope="col"><strong>KET</strong></th>
   </tr>
   <tr>
     <th width="6%" align="center"><strong>TEMPAT</strong></th>
     <th width="7%" align="center"><strong>TANGGAL</strong></th>
     <th width="9%" align="center"><strong>DATANG DARI</strong></th>
     <th width="7%" align="center"><strong>TANGGAL</strong></th>
     <th width="5%" align="center"><strong>LAHIR</strong></th>
     <th width="7%" align="center"><strong>TANGGAL</strong></th>
     <th width="7%" align="center"><strong>PINDAH KE</strong></th>
     <th width="7%" align="center"><strong>TANGGAL</strong></th>
     <th width="5%" align="center"><strong>MATI</strong></th>
     <th width="7%" align="center"><strong>TANGGAL</strong></th>
   </tr>
   <tr>
     <th align="center"><strong>1</strong></th>
     <th align="center"><strong>2</strong></th>
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
     <th align="center"><strong>14</strong></th>
     <th align="center"><strong>15</strong></th>
   </tr>
   </thead>
   <?php 
   $i=0; 
   foreach($record->result() as $row ) : 
   $i++;
   ?>
   <tr>
     <td width="3%"><?php echo $i; ?></td>
     <td width="12%"><?php echo $row->nama; ?></td>
     <td width="6%"><?php echo $row->tmp_lahir; ?></td>
     <td width="7%"><?php echo  $row->tgl_lahir ; ?></td>
     <td width="5%"><?php echo $row->jk; ?></td>
     <td width="10%"><?php echo $row->warga_negara; ?></td>
     <td width="9%"><?php echo $row->datang_dari; ?></td>
     <td width="7%"><?php echo flipdate($row->datang_tanggal); ?></td>
     <td width="5%"><?php echo $row->tmp_dilahirkan; ?></td>
     <td width="7%"><?php echo flipdate($row->tgl_lahir2); ?></td>
     <td width="7%"><?php echo $row->pindah_ke; ?></td>
     <td width="7%"><?php echo flipdate($row->pindah_tanggal); ?></td>
     <td width="5%"><?php echo $row->mati; ?></td>
     <td width="7%"><?php echo flipdate($row->mati_tanggal); ?></td>
     <td width="5%">&nbsp;</td>
   </tr>
   <?php 
   endforeach;
   ?>
</table>
<br /><br /><br />
<!-- </div> end of wrap -->
</body>

</html>