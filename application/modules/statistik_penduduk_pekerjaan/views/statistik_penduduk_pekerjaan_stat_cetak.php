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
<h1 class="judul">DATA STATISTIK PEKERJAAN PENDUDUK </h1>
<h1 class="judul"> <?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></h1>
<h1 class="judul">KECAMATAN <?php echo  strtoupper($desa2->kecamatan ) ?></h1>
<h1 class="judul"> <?php echo  strtoupper($desa2->kota ) ?></h1>
<p>&nbsp;</p>
<table width="100%" border="0" class="tabel">
  <tr>
    <th width="3%" scope="col">No.</th>
    <th width="81%" scope="col">Pekerjaan</th>
    <th width="4%" scope="col">L</th>
    <th width="4%" scope="col">P</th>
    <th width="8%" scope="col">Jumlah</th>
  </tr>
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
    <td><?php echo $i; ?></td>
    <td><?php echo $row->pekerjaan; ?></td>
    <td align="center"><?php echo $row->l; ?></td>
    <td align="center"><?php echo $row->p;?></td>
    <td align="center"><?php echo $row->p + $row->l;?></td>
  </tr>
  <?php 
  
  endforeach; ?>
  <tr>
    <th>&nbsp;</th>
    <th>Jumlah</th>
    <th><?php echo $total_l; ?></th>
    <th><?php echo $total_p; ?></th>
    <th><?php echo $total_l + $total_p; ?></th>
  </tr>
  
</table>
<p>&nbsp;</p>
</body>
</html>