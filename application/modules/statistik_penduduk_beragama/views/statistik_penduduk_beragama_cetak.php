<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Penduduk</title>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style_laporan.css">

</head>
<?php 
$desa2 = $this->cm->data_desa();
?>
<body>
<h1 class="judul">DATA PENDUDUK BERAGAMA <?php echo strtoupper($agama); ?> <?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></h1>
<h1 class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></h1>
<h1 class="judul"> <?php echo  strtoupper($desa2->kota ) ?></h1>
<br />
<br />
<fieldset>
<legend> Statistik Penduduk </legend>
<table>
<tr><td>Laki - Laki </td><td>: </td><td> <?php echo $l; ?></td></tr>
<tr><td>Perempuan  </td><td>: </td><td> <?php echo $p; ?></td></tr>
<tr><td>Total  </td><td>: </td><td> <?php echo ($p+$l); ?></td></tr>

</table>
</fieldset>
<br />
<br />



<table width="100%" border="0" class="tabel">
  <tr>
    <th width="2%" scope="col">No.</th>
    <th width="14%" scope="col">NIP / Nama</th>
    <th width="26%" scope="col">Alamat</th>
    <th width="1%" scope="col">RT</th>
    <th width="3%" scope="col">RW</th>
    <th width="8%" scope="col">Dusun</th>
    <th width="2%" scope="col">JK</th>
    <th width="13%" scope="col">Tmp / Tgl Lahir</th>
    <th width="9%" scope="col">Pekerjaan</th>
    <th width="8%" scope="col">Status Penduduk</th>
    <th width="14%" scope="col">Pendidikan</th>
  </tr>
 
 <?php 
 $i =  0; 
 
 $arr_status_kependudukan= $this->cm->arr_status_kependudukan;
 foreach($record->result() as $row) :  
 $i++;
 ?>
  <tr>
    <td><?php echo $i;  ?></td>
    <td><?php echo $row->nik . "<Br />" . $row->nama; ?></td>
    <td><?php echo $row->alamat ?></td>
    <td><?php echo $row->rt ?></td>
    <td><?php echo $row->rw ?></td>
    <td><?php echo $row->dusun ?></td>
    <td><?php echo $row->jk ?></td>
    <td><?php echo $row->tmp_lahir.", ".$row->tgl_lahir ?></td>
    <td><?php echo $row->pekerjaan ?></td>
    <td><?php echo $arr_status_kependudukan[$row->status_kependudukan] ?></td>
    <td><?php echo $row->pendidikan ?></td>
  </tr>
 <?php endforeach; ?>
 
  
</table>
<p>&nbsp;</p>
</body>
</html>