<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Penduduk</title>
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
	text-transform:capitalize;
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
<body>
<!--<h1 class="judul">DATA PENDUDUK PEMILIK HAK PILIH <?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></h1>
<h1 class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></h1>
<h1 class="judul"> <?php echo  strtoupper($desa2->kota ) ?></h1>
<br />
<br />
-->

<p style="text-align:center">
<span class="judul">DATA PENDUDUK PEMILIK HAK PILIH <br /></span><span class="judul"><?php echo  strtoupper($desa2->kota ) ?></span> <br />
<span class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></span> <br />
<span class="judul"> <?php echo  strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span> <br />
</p>

Statistik Penduduk : <BR />
<table width="321">
<tr><td width="118">Laki - Laki </td><td width="10">: </td><td width="177"> <?php echo $l; ?></td></tr>
<tr><td>Perempuan  </td><td>: </td><td> <?php echo $p; ?></td></tr>
<tr><td>Total  </td><td>: </td><td> <?php echo ($p+$l); ?></td></tr>

</table>
 <br />
<br />



<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
  <tr>
    <th width="4%" align="center" scope="col">No.</th>
    <th width="15%" align="center" scope="col">NIP / Nama</th>
    <th width="12%" align="center" scope="col">Alamat</th>
    <th width="3%" align="center" scope="col">RT</th>
    <th width="3%" align="center" scope="col">RW</th>
    <th width="7%" align="center" scope="col">Dusun</th>
    <th width="3%" align="center" scope="col">JK</th>
    <th width="7%" align="center" scope="col">Agama</th>
    <th width="10%" align="center" scope="col">Tmp / Tgl Lahir</th>
    <th width="5%" align="center" scope="col">Umur</th>
    <th width="10%" align="center" scope="col">Status Kawin</th>
    <th width="7%" align="center" scope="col">Status Penduduk</th>
    <th width="14%" align="center" scope="col">Pendidikan</th>
  </tr>
 </thead>
 <?php 
 
 $arr_status_kependudukan = $this->cm->arr_status_kependudukan;
 $arr_status_kawin = $this->cm->arr_status_kawin;
 $i =  0; 
 foreach($record->result() as $row) :  
 $i++;
 ?>
  <tr>
    <td width="4%"><?php echo $i;  ?></td>
    <td width="15%"><?php echo $row->nik . "<Br />" . $row->nama; ?></td>
    <td width="12%"><?php echo $row->alamat ?></td>
    <td width="3%"><?php echo $row->rt ?></td>
    <td width="3%"><?php echo $row->rw ?></td>
    <td width="7%"><?php echo $row->dusun ?></td>
    <td width="3%"><?php echo $row->jk ?></td>
    <td width="7%"><?php echo $row->agama ?></td>
    <td width="10%"><?php echo $row->tmp_lahir.", ".$row->tgl_lahir ?></td>
    <td width="5%"><?php echo $row->umur." Th" ?></td>
    <td width="10%"><?php echo $arr_status_kawin[$row->status_kawin] ?></td>
    <td width="7%"><?php echo $arr_status_kependudukan[$row->status_kependudukan] ?></td>
    <td width="14%"><?php echo $row->pendidikan ?></td>
  </tr>
 <?php endforeach; ?>
</table>
<p>&nbsp;</p>
</body>
</html>