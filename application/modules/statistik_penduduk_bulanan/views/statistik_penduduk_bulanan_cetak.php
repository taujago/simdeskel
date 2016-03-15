<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Penduduk</title>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style_laporan.css">

</head>
<?php 
$desa2 = $this->cm->data_desa();

$arr_bulan = $this->add->arr_bulan;
?>
<body>
<center>

<h1 class="judul">PEMERINTAH <?php echo  strtoupper($desa2->kota); ?></h1>
<h1 class="judul">LAPORAN BULANAN <?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?></h1>
 
<p>&nbsp;</p><table width="43%" border="0" align="center">
  <tr>
    <td width="47%"><span class="judul"><?php echo  strtoupper($desa2->bentuk_lembaga); ?></span></td>
    <td width="2%">:</td>
    <td width="51%"><span class="judul"><?php echo  strtoupper($desa2->desa); ?></span></td>
  </tr>
  <tr>
    <td>Kecamatan</td>
    <td>:</td>
    <td><span class="judul"><?php echo  strtoupper($desa2->kecamatan); ?></span></td>
  </tr>
  <tr>
    <td>Laporan Bulan</td>
    <td>:</td>
    <td><?php echo strtoupper($arr_bulan[$bulan]). " ".date("Y"); ?> </td>
  </tr>
</table>
<p>&nbsp;</p>
</center>
<table width="100%" border="0" class="tabel">
  <tr>
    <th width="5%" rowspan="2">No.</th>
    <th width="17%" rowspan="2">Perincian</th>
    <th colspan="2">WARGA NEGARA RI</th>
    <th colspan="2">WARGA NEGARA ASING</th>
    <th colspan="3">JUMLAH</th>
  </tr>
  <tr>
    <th width="11%">Laki-laki</th>
    <th width="11%">Perempuan</th>
    <th width="11%">Laki - laki</th>
    <th width="11%">Perempuan</th>
    <th width="11%">Laki - laki</th>
    <th width="11%">Perempuan</th>
    <th width="12%">L + P</th>
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
  </tr>
  <tr>
    <td>1</td>
    <td>Penduduk Awal Bulan ini</td>
    <td align="center"><?php  echo $bulan_ini->wni_l + $mati->wni_l - $datang->wni_l ; ?></td>
    <td align="center"><?php  echo $bulan_ini->wni_p + $mati->wni_p - $datang->wni_p; ?></td>
    <td align="center"><?php  echo $bulan_ini->wna_l + $mati->wna_l - $datang->wna_l; ?></td>
    <td align="center"><?php  echo $bulan_ini->wna_p + $mati->wna_p - $datang->wna_p; ?></td>
    <td align="center"><?php  echo $bulan_ini->jml_l + $mati->jml_l - $datang->jml_l; ?></td>
    <td align="center"><?php  echo $bulan_ini->jml_p + $mati->jml_p - $datang->jml_p; ?></td>
    <td align="center"><?php  echo $bulan_ini->total + $mati->total - $datang->total; ?></td>
  </tr>
  <tr>
    <td>2</td>
    <td>Kelahiran Bulan Ini</td>
    <td align="center"><?php  echo $lahir->wni_l; ?></td>
    <td align="center"><?php  echo $lahir->wni_p; ?></td>
    <td align="center"><?php  echo $lahir->wna_l; ?></td>
    <td align="center"><?php  echo $lahir->wna_p; ?></td>
    <td align="center"><?php  echo $lahir->jml_l; ?></td>
    <td align="center"><?php  echo $lahir->jml_p; ?></td>
    <td align="center"><?php  echo $lahir->total; ?></td>
  </tr>
  <tr>
    <td>3</td>
    <td>Kematian Bulan Ini</td>
    <td align="center"><?php  echo $mati->wni_l; ?></td>
    <td align="center"><?php  echo $mati->wni_p; ?></td>
    <td align="center"><?php  echo $mati->wna_l; ?></td>
    <td align="center"><?php  echo $mati->wna_p; ?></td>
    <td align="center"><?php  echo $mati->jml_l; ?></td>
    <td align="center"><?php  echo $mati->jml_p; ?></td>
    <td align="center"><?php  echo $mati->total; ?></td>
  </tr>
  <tr>
    <td>4</td>
    <td>Datang Bulan Ini</td>
    <td align="center"><?php  echo $datang->wni_l; ?></td>
    <td align="center"><?php  echo $datang->wni_p; ?></td>
    <td align="center"><?php  echo $datang->wna_l; ?></td>
    <td align="center"><?php  echo $datang->wna_p; ?></td>
    <td align="center"><?php  echo $datang->jml_l; ?></td>
    <td align="center"><?php  echo $datang->jml_p; ?></td>
    <td align="center"><?php  echo $datang->total; ?></td>
  </tr>
  <tr>
    <td>5</td>
    <td>Pindah Bulan Ini</td>
    <td align="center"><?php  echo $pindah->wni_l; ?></td>
    <td align="center"><?php  echo $pindah->wni_p; ?></td>
    <td align="center"><?php  echo $pindah->wna_l; ?></td>
    <td align="center"><?php  echo $pindah->wna_l; ?></td>
    <td align="center"><?php  echo $pindah->jml_l; ?></td>
    <td align="center"><?php  echo $pindah->jml_p; ?></td>
    <td align="center"><?php  echo $pindah->total; ?></td>
  </tr>
  <tr>
    <td>6</td>
    <td>Penduduk akhir bulan ini </td>
    <td align="center"><?php  echo $sekarang->wni_l; ?></td>
    <td align="center"><?php  echo $sekarang->wni_p; ?></td>
    <td align="center"><?php  echo $sekarang->wna_l; ?></td>
    <td align="center"><?php  echo $sekarang->wna_p; ?></td>
    <td align="center"><?php  echo $sekarang->jml_l; ?></td>
    <td align="center"><?php  echo $sekarang->jml_p; ?></td>
    <td align="center"><?php  echo $sekarang->total; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>CATATAN : </p>
<table width="100%" border="0">
  <tr>
    <td width="46%"><table width="100%" border="0" class="tabel">
      <tr>
        <th width="58%" rowspan="2" scope="col">PENDATANG</th>
        <th colspan="2" scope="col">WNI</th>
        <th colspan="2" scope="col">WNA</th>
      </tr>
      <tr>
        <th width="10%">L</th>
        <th width="10%">P</th>
        <th width="11%">L</th>
        <th width="11%">P</th>
      </tr>
      <tr>
        <td>Antar <?php echo $desa2->bentuk_lembaga ?></td>
        <td align="center"><?php echo isset($pendatang_antar_desa->wni_l)?$pendatang_antar_desa->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_desa->wni_p)?$pendatang_antar_desa->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_desa->wna_l)?$pendatang_antar_desa->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_desa->wna_p)?$pendatang_antar_desa->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Antar Kecamatan</td>
        <td align="center"><?php echo isset($pendatang_antar_kecamatan->wni_l)?$pendatang_antar_kecamatan->wni_l:"0"; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_kecamatan->wni_p)?$pendatang_antar_kecamatan->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_kecamatan->wna_l)?$pendatang_antar_kecamatan->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_kecamatan->wna_p)?$pendatang_antar_kecamatan->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Antar Kabupaten</td>
        <td align="center"><?php echo isset($pendatang_antar_kota->wni_l)?$pendatang_antar_kota->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_kota->wni_p)?$pendatang_antar_kota->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_kota->wna_l)?$pendatang_antar_kota->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_kota->wna_p)?$pendatang_antar_kota->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Antar Provinsi</td>
        <td align="center"><?php echo isset($pendatang_antar_provinsi->wni_l)?$pendatang_antar_provinsi->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_provinsi->wni_p)?$pendatang_antar_provinsi->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_provinsi->wna_l)?$pendatang_antar_provinsi->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_provinsi->wna_p)?$pendatang_antar_provinsi->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Dari Luar Negeri</td>
        <td align="center"><?php echo isset($pendatang_antar_negara->wni_l)?$pendatang_antar_negara->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_negara->wni_p)?$pendatang_antar_negara->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_negara->wna_l)?$pendatang_antar_negara->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_antar_negara->wna_p)?$pendatang_antar_negara->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td align="center"><?php echo isset($pendatang_jumlah->wni_l)?$pendatang_jumlah->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_jumlah->wni_p)?$pendatang_jumlah->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pendatang_jumlah->wna_l)?$pendatang_jumlah->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pendatang_jumlah->wna_p)?$pendatang_jumlah->wna_p:0; ?></td>
      </tr>
    </table></td>
    <td width="6%">&nbsp;</td>
    <td width="48%"><table width="100%" border="0" class="tabel">
      <tr>
        <th width="58%" rowspan="2" scope="col">PINDAH</th>
        <th colspan="2" scope="col">WNI</th>
        <th colspan="2" scope="col">WNA</th>
      </tr>
      <tr>
        <th width="10%">L</th>
        <th width="10%">P</th>
        <th width="11%">L</th>
        <th width="11%">P</th>
      </tr>
      <tr>
        <td>Antar <?php echo $desa2->bentuk_lembaga ?></td>
        <td align="center"><?php echo isset($pindah_antar_desa->wni_l)?$pindah_antar_desa->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_desa->wni_p)?$pindah_antar_desa->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_desa->wna_l)?$pindah_antar_desa->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_desa->wna_p)?$pindah_antar_desa->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Antar Kecamatan</td>
        <td align="center"><?php echo isset($pindah_antar_kecamatan->wni_l)?$pindah_antar_kecamatan->wni_l:"0"; ?></td>
        <td align="center"><?php echo isset($pindah_antar_kecamatan->wni_p)?$pindah_antar_kecamatan->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_kecamatan->wna_l)?$pindah_antar_kecamatan->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_kecamatan->wna_p)?$pindah_antar_kecamatan->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Antar Kabupaten</td>
        <td align="center"><?php echo isset($pindah_antar_kota->wni_l)?$pindah_antar_kota->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_kota->wni_p)?$pindah_antar_kota->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_kota->wna_l)?$pindah_antar_kota->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_kota->wna_p)?$pindah_antar_kota->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Antar Provinsi</td>
        <td align="center"><?php echo isset($pindah_antar_provinsi->wni_l)?$pindah_antar_provinsi->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_provinsi->wni_p)?$pindah_antar_provinsi->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_provinsi->wna_l)?$pindah_antar_provinsi->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_provinsi->wna_p)?$pindah_antar_provinsi->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Ke Luar Negeri</td>
        <td align="center"><?php echo isset($pindah_antar_negara->wni_l)?$pindah_antar_negara->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_negara->wni_p)?$pindah_antar_negara->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_negara->wna_l)?$pindah_antar_negara->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_antar_negara->wna_p)?$pindah_antar_negara->wna_p:0; ?></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td align="center"><?php echo isset($pindah_jumlah->wni_l)?$pindah_jumlah->wni_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_jumlah->wni_p)?$pindah_jumlah->wni_p:0; ?></td>
        <td align="center"><?php echo isset($pindah_jumlah->wna_l)?$pindah_jumlah->wna_l:0; ?></td>
        <td align="center"><?php echo isset($pindah_jumlah->wna_p)?$pindah_jumlah->wna_p:0; ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="41%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
    <td width="33%"><?php echo $desa2->desa.", "  . date("d-m-Y"); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo "Kepala " .$desa2->bentuk_lembaga ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><?php echo $desa2->nama_kepala_desa ?></td>
  </tr>
</table>
<p>&nbsp;</p>

</body>
</html>