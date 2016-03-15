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
$arr_pekerjaan = $this->cm->arr_pekerjaan();
$arr_status_kependudukan = $this->cm->arr_status_kependudukan;
?>
<body>
<!--<h1 class="judul">DATA STATISTIK PEKERJAAN PENDUDUK </h1>
<h1 class="judul"> <?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></h1>
<h1 class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></h1>
<h1 class="judul"> <?php echo  strtoupper($desa2->kota ) ?></h1>
<p>&nbsp;</p>-->


<p style="text-align:center">
<span class="judul">DATA STATISTIK PEKERJAAN PENDUDUK </span><br />
<span class="judul"><?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></span>
<span class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></span>
<span class="judul"><?php echo  strtoupper($desa2->kota ) ?></span>
<br />
<br />
</p>


<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
  <tr>
    <th width="5%" align="center" scope="col"><strong>No.</strong></th>
    <th width="71%" align="center" scope="col"><strong>Pekerjaan</strong></th>
    <th width="6%" align="center" scope="col"><strong>L</strong></th>
    <th width="7%" align="center" scope="col"><strong>P</strong></th>
    <th width="11%" align="center" scope="col"><strong>Jumlah</strong></th>
  </tr>
  </thead>
  <?php 
  $i=0;
  $total=0;
  $total_l=0;
  $total_p=0;
  foreach($record->result() as $row): 
  $total_l += $row->l;
  $total_p += $row->p;
   
  $i++; ?>
  <tr>
    <td width="5%"><?php echo $i; ?></td>
    <td width="71%"><?php echo $row->pekerjaan; ?></td>
    <td width="6%" align="right"><?php echo $row->l; ?></td>
    <td width="7%" align="right"><?php echo $row->p;?></td>
    <td width="11%" align="right"><?php echo $row->p + $row->l;?></td>
  </tr>
  <?php 
  
  endforeach; ?>
  <tr>
    <th>&nbsp;</th>
    <th>Jumlah</th>
    <th width="6%" align="right"><?php echo $total_l; ?></th>
    <th width="7%" align="right"><?php echo $total_p; ?></th>
    <th align="right"><?php echo $total_l + $total_p; ?></th>
  </tr>
  
</table>
<p>&nbsp;</p>
</body>
</html>