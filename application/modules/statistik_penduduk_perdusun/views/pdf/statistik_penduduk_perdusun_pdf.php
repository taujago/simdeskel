<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<!--<h1 class="judul">DATA PENDUDUK PER DUSUN <?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></h1>
<h1 class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></h1>
<h1 class="judul"> <?php echo  strtoupper($desa2->kota ) ?></h1>
<br />
-->

<p style="text-align:center">

<span class="judul">DATA PENDUDUK PER DUSUN </span><br />
<span class="judul"><?php echo  strtoupper($desa2->kota ) ?></span> <br />
<span class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></span> <br />
<span class="judul"> <?php echo  strtoupper($desa2->bentuk_lembaga. " ". $desa2->desa) ?></span> <br />
</p>

<?php foreach($rec_dusun->result() as $row_dusun) :  
/*show_array($row_dusun);
*/?>
<BR /><br />
<br />

<span><b><?php echo "Dusun : $row_dusun->dusun "; ?> </b></span> <br /> <br />


<table width="100%" border="0" cellpadding="3" class="cetak">
<thead>
  <tr>
    <th width="3%" scope="col">No.</th>
    <th width="15%" scope="col">NIP / Nama</th>
    <th width="13%" scope="col">Alamat</th>
     <th width="3%" scope="col">JK</th>
    <th width="8%" scope="col">Agama</th>
    <th width="10%" scope="col">Tmp / Tgl Lahir</th>
    <th width="4%" scope="col">Umur</th>
    <th width="19%" scope="col">Pekerjaan</th>
    <th width="9%" scope="col">Status Penduduk</th>
    <th width="14%" scope="col">Pendidikan</th>
  </tr>
  </thead>
 <?php 
 $i =  0; 
 $rec = $this->dm->get_penduduk_perdusun($row_dusun->dusun);
 foreach($rec->result() as $row) :  
 $i++;
 ?>
  <tr>
    <td width="3%"><?php echo $i;  ?></td>
    <td width="15%"><?php echo $row->nik . "<Br />" . $row->nama; ?></td>
    <td width="13%"><?php echo $row->alamat ?></td>
    <td width="3%"><?php echo $row->jk ?></td>
    <td width="8%"><?php echo $row->agama ?></td>
    <td width="10%"><?php echo $row->tmp_lahir.", ".$row->tgl_lahir ?></td>
     <td width="4%"><?php echo $row->umur ?> Th </td>

    <td width="19%"><?php echo $row->pekerjaan ?></td>
    <td width="9%"><?php echo $arr_status_kependudukan[$row->status_kependudukan] ?></td>
    <td width="14%"><?php echo $row->pendidikan ?></td>
  </tr>
 <?php endforeach; ?>
</table>

 <?php 
 endforeach;
 ?>
<p>&nbsp;</p>
</body>
</html>