<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Penduduk</title>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style_laporan.css">

</head>
<?php 
$desa2 = $this->cm->data_desa();
$arr_pekerjaan = $this->cm->arr_pekerjaan();
$arr_status_kependudukan = $this->cm->arr_status_kependudukan;
?>
<body>
<h1 class="judul">DATA PENDUDUK MENURUT PEKERJAAN <?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></h1>
<h1 class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></h1>
<h1 class="judul"> <?php echo  strtoupper($desa2->kota ) ?></h1>

<br />

 <h3 class="judul"> PEKERJAAN : <?php echo  $arr_pekerjaan[$id_pekerjaan]; ?></h3>
<BR />
 <table width="100%" border="0" class="tabel">
  <tr>
    <th width="3%" scope="col">No.</th>
    <th width="15%" scope="col">NIP / Nama</th>
    <th width="13%" scope="col">Alamat</th>
    <th width="2%" scope="col">Dusun</th>
     <th width="2%" scope="col">JK</th>
    <th width="8%" scope="col">Agama</th>
    <th width="14%" scope="col">Tmp / Tgl Lahir</th>
    <th width="3%" scope="col">Umur</th>
    <th width="9%" scope="col">Status Penduduk</th>
    <th width="14%" scope="col">Pendidikan</th>
  </tr>
 <?php 
 $i =  0; 
 //$rec = $this->dm->get_penduduk_perdusun($row_dusun->id_dusun);
 foreach($rec->result() as $row) :  
 $i++;
 ?>
  <tr>
    <td><?php echo $i;  ?></td>
    <td><?php echo $row->nik . "<Br />" . $row->nama; ?></td>
    <td><?php echo $row->alamat ?></td>
    <td><?php echo $row->dusun ?></td>
    <td><?php echo $row->jk ?></td>
    <td><?php echo $row->agama ?></td>
    <td><?php echo $row->tmp_lahir.", ".$row->tgl_lahir ?></td>
     <td><?php echo $row->umur ?> Th </td>

    <td><?php echo $arr_status_kependudukan[$row->status_kependudukan] ?></td>
    <td><?php echo $row->pendidikan ?></td>
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
  </tr>
</table>
 
<p>&nbsp;</p>
</body>
</html>