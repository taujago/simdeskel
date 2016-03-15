<head> 
<title>Data Penduduk</title>
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
<?php 
$desa2 = $this->cm->data_desa();

$arr_status_kependudukan = $this->cm->arr_status_kependudukan;
?>
<body>
<!--<h1 class="judul">DATA PENDUDUK <?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></h1>
<h1 class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></h1>
<h1 class="judul"> <?php echo  strtoupper($desa2->kota ) ?></h1>
<br />
<br />-->
 

 
<p style="text-align:center">
   <span class="judul"> DATA PENDUDUK  </span>   <br>
   <span class="judul"><?php echo  strtoupper($desa2->kota ) ?></span> <br />
   <span class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></span> <br />
   <span class="judul"> <?php echo  strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span> <br>

 	 

</p> 
 
 
 
<table width="298">
<tr>
  <td colspan="3">Statistik Penduduk</td>
  </tr>
<tr><td width="76">Laki - Laki </td><td width="10">: </td><td width="196"> <?php echo $l; ?></td></tr>
<tr><td>Perempuan  </td><td>: </td><td> <?php echo $p; ?></td></tr>
<tr><td>Total  </td><td>: </td><td> <?php echo ($p+$l); ?></td></tr>

</table>
 
<br />
<br />



<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
  <tr>
    <th width="3%" rowspan="2" align="center" scope="col">No.</th>
    <th width="12%" rowspan="2" align="center" scope="col">Nama Lengkap</th>
    <th width="3%" rowspan="2" align="center" scope="col">Jk</th>
    <th width="5%" rowspan="2" align="center" scope="col">Status Nikah</th>
    <th colspan="2" align="center" scope="col" width="12%">Tmp / Tgl Lahir</th>
    <th width="6%" rowspan="2" align="center" scope="col">Agama</th>
    <th width="7%" rowspan="2" align="center" scope="col">Pendidikan Terakhir</th>
    <th width="7%" rowspan="2" align="center" scope="col">Pekerjaan</th>
    <th width="7%" rowspan="2" align="center" scope="col">Dapat Membaca Huruf</th>
    <th width="7%" rowspan="2" align="center" scope="col">Kewarga Negaran</th>
    <th width="10%" rowspan="2" align="center" scope="col">Alamat Lengkap</th>
    <th width="5%" rowspan="2" align="center" scope="col">kedudukan dalam keluarga</th>
    <th width="10%" rowspan="2" align="center" scope="col">No. KTP</th>
    <th width="6%" rowspan="2" align="center" scope="col">Ket</th>
  </tr>
 

  <tr>
    <th width="6%" align="center">TEMPAT</th>
    <th width="6%" align="center">TANGGAL</th>
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
    <th align="center">11</th>
    <th align="center">12</th>
    <th align="center">13</th>
    <th align="center">14</th>
    <th align="center">15</th>
  </tr>
  </thead>
   <?php 
   $arr_status_kawin = $this->cm->arr_status_kawin;
 $i =  0; 
 foreach($record->result() as $row) :  
 $i++;
 ?>
  <tr>
    <td width="3%"><?php echo $i;  ?></td>
    <td width="12%"><?php echo  $row->nama; ?></td>
    <td width="3%"><?php echo $row->jk ?></td>
    <td width="5%"><?php echo $arr_status_kawin[$row->status_kawin] ?></td>
    <td width="6%"><?php echo $row->tmp_lahir ?></td>
    <td width="6%"><?php echo $row->tgl_lahir ?></td>
    <td width="6%"><?php echo $row->agama ?></td>
    <td width="7%"><?php echo  $row->pendidikan; //$arr_status_kependudukan[$row->status_kependudukan] ?></td>
    <td width="7%"><?php echo $row->pekerjaan ?></td>
    <td width="7%"><?php echo ($row->baca_tulis=="1")?"Ya":"Tidak"; ?></td>
    <td width="7%"><?php echo $row->warga_negara ?></td>
    <td width="10%"><?php echo $row->alamat ?></td>
    <td width="5%"><?php echo $this->cm->kedudukan_dalam_keluarga($row->id_penduduk);  ?></td>
    <td width="10%"><?php echo $row->nik ?></td>
    <td width="6%">&nbsp;</td>
  </tr>
 <?php endforeach; ?>
</table>
