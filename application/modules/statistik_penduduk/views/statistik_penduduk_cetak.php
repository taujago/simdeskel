<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Penduduk</title>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style_laporan.css">

</head>
<?php 
$desa2 = $this->cm->data_desa();

$arr_status_kependudukan = $this->cm->arr_status_kependudukan;
?>
<body>
<h1 class="judul">DATA PENDUDUK <?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></h1>
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



<table width="104%" border="0" class="tabel">
  <tr>
    <th width="3%" rowspan="2" scope="col">No.</th>
    <th width="9%" rowspan="2" scope="col">Nama Lengkap</th>
    <th width="2%" rowspan="2" scope="col">Jk</th>
    <th width="8%" rowspan="2" scope="col">Status Perkawinan</th>
    <th colspan="2" scope="col">Tmp / Tgl Lahir</th>
    <th width="5%" rowspan="2" scope="col">Agama</th>
    <th width="8%" rowspan="2" scope="col">Pendidikan Terakhir</th>
    <th width="7%" rowspan="2" scope="col">Pekerjaan</th>
    <th width="7%" rowspan="2" scope="col">Dapat Membaca Huru</th>
    <th width="7%" rowspan="2" scope="col">Kewarga Negaran</th>
    <th width="10%" rowspan="2" scope="col">Alamat Lengkap</th>
    <th width="8%" rowspan="2" scope="col">kedudukan dalam keluarga</th>
    <th width="3%" rowspan="2" scope="col">No. KTP</th>
    <th width="8%" rowspan="2" scope="col">Keterangan</th>
  </tr>
 

  <tr>
    <th width="7%">TEMPAT</th>
    <th width="8%">TANGGAL</th>
  </tr>
  <tr>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
    <th>5</th>
    <th>6</th>
    <th>7</th>
    <th>8</th>
    <th>9</th>
    <th>10</th>
    <th>11</th>
    <th>12</th>
    <th>13</th>
    <th>14</th>
    <th>15</th>
  </tr>
   <?php 
   $arr_status_kawin = $this->cm->arr_status_kawin;
 $i =  0; 
 foreach($record->result() as $row) :  
 $i++;
 ?>
  <tr>
    <td><?php echo $i;  ?></td>
    <td><?php echo  $row->nama; ?></td>
    <td><?php echo $row->jk ?></td>
    <td><?php echo $arr_status_kawin[$row->status_kawin] ?></td>
    <td><?php echo $row->tmp_lahir ?></td>
    <td><?php echo $row->tgl_lahir ?></td>
    <td><?php echo $row->agama ?></td>
    <td><?php echo $arr_status_kependudukan[$row->status_kependudukan] ?></td>
    <td><?php echo $row->pekerjaan ?></td>
    <td><?php echo $row->baca_tulis ?></td>
    <td><?php echo $row->warga_negara ?></td>
    <td><?php echo $row->alamat ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row->nik ?></td>
    <td>&nbsp;</td>
  </tr>
 <?php endforeach; ?>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>