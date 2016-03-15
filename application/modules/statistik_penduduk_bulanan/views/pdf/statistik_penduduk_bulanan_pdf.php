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
	font-size:6px;
	
}
</style>
</head>
<?php 
$desa2 = $this->cm->data_desa();

$arr_bulan = $this->add->arr_bulan;
?>
<body>
 
<p style="text-align:center">
<span class="judul">LAPORAN BULANAN <br />
PEMERINTAH <?php echo  strtoupper($desa2->kota); ?> <br />KECAMATAN <?php echo  strtoupper($desa2->kecamatan); ?> </span><br />
<span class="judul"><?php echo  strtoupper($desa2->bentuk_lembaga. " " . $desa2->desa); ?><br />
</span>
</p>
<table width="43%" border="0" align="center" cellpadding="3">
  <tr>
    <td width="38%" align="left"><?php echo  strtoupper($desa2->bentuk_lembaga); ?> </td>
    <td width="3%" align="left">:</td>
    <td width="59%" align="left"> <?php echo  strtoupper($desa2->desa); ?> </td>
  </tr>
  <tr>
    <td align="left">KECAMATAN</td>
    <td align="left">:</td>
    <td align="left"> <?php echo  strtoupper($desa2->kecamatan); ?> </td>
  </tr>
  <tr>
    <td align="left">LAPORAN BULAN</td>
    <td align="left">:</td>
    <td align="left"><?php echo strtoupper($arr_bulan[$bulan]). " ".date("Y"); ?> </td>
  </tr>
</table>
 
<table width="100%" border="0" cellpadding="3" class="cetak">
  <tr>
    <th width="5%" rowspan="2" align="center"><strong>No.</strong></th>
    <th width="17%" rowspan="2" align="center"><strong>Perincian</strong></th>
    <th colspan="2" align="center" width="22%"><strong>WARGA NEGARA RI</strong></th>
    <th colspan="2" align="center" width="22%"><strong>WARGA NEGARA ASING</strong></th>
    <th colspan="3" align="center" width="34%"><strong>JUMLAH</strong></th>
  </tr>
  <tr>
    <th width="11%" align="center"><strong>Laki-laki</strong></th>
    <th width="11%" align="center"><strong>Perempuan</strong></th>
    <th width="11%" align="center"><strong>Laki - laki</strong></th>
    <th width="11%" align="center"><strong>Perempuan</strong></th>
    <th width="11%" align="center"><strong>Laki - laki</strong></th>
    <th width="11%" align="center"><strong>Perempuan</strong></th>
    <th width="12%" align="center"><strong>L + P</strong></th>
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
  </tr>
<!--  <tr>
    <td>1</td>
    <td>Penduduk Awal Bulan ini</td>
    <td align="center"><?php echo $bulan_ini->wni_l." ";  echo $bulan_ini->wni_l + $mati->wni_l - $datang->wni_l ; ?></td>
    <td align="center"><?php  echo $bulan_ini->wni_p + $mati->wni_p - $datang->wni_p; ?></td>
    <td align="center"><?php  echo $bulan_ini->wna_l + $mati->wna_l - $datang->wna_l; ?></td>
    <td align="center"><?php  echo $bulan_ini->wna_p + $mati->wna_p - $datang->wna_p; ?></td>
    <td align="center"><?php  echo $bulan_ini->jml_l + $mati->jml_l - $datang->jml_l; ?></td>
    <td align="center"><?php  echo $bulan_ini->jml_p + $mati->jml_p - $datang->jml_p; ?></td>
    <td align="center"><?php  echo $bulan_ini->total + $mati->total - $datang->total; ?></td>
  </tr>-->
    <tr>
    <td>1</td>
    <td>Penduduk Awal Bulan ini</td>
    <td align="center"><?php  //echo "$pi->wni_l + $bulan_ini->wni_l + $mati->wni_l + $pindah->wni_l ="; 
	echo ($pi->wni_l + $bulan_ini->wni_l + $mati->wni_l + $pindah->wni_l); ?></td>
    <td align="center"><?php  echo $pi->wni_p + $bulan_ini->wni_p + $mati->wni_p + $pindah->wni_p?></td>
    <td align="center"><?php  echo $pi->wna_l + $bulan_ini->wna_l + $mati->wna_l + $pindah->wna_l ?></td>
    <td align="center"><?php  echo $pi->wna_p + $bulan_ini->wna_p + $mati->wna_p  + $pindah->wna_p?></td>
    <td align="center"><?php  echo $pi->jml_l + $bulan_ini->jml_l + $mati->jml_l + $pindah->jml_l ?></td>
    <td align="center"><?php  echo $pi->jml_p + $bulan_ini->jml_p + $mati->jml_p + $pindah->jml_p?></td>
    <td align="center"><?php  echo $pi->total + $bulan_ini->total + $mati->total + $pindah->total  ?></td>
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
<p>CATATAN : </p>
<table width="100%" border="0">
  <tr>
    <td width="46%"><table width="100%" border="0" cellpadding="3" class="cetak">
      <tr>
        <th width="58%" rowspan="2" align="center" scope="col"><strong>PENDATANG</strong></th>
        <th colspan="2" align="center" scope="col" width="20%"><strong>WNI</strong></th>
        <th colspan="2" align="center" scope="col" width="22%"><strong>WNA</strong></th>
      </tr>
      <tr>
        <th width="10%" align="center"><strong>L</strong></th>
        <th width="10%" align="center"><strong>P</strong></th>
        <th width="11%" align="center"><strong>L</strong></th>
        <th width="11%" align="center"><strong>P</strong></th>
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
    <td width="48%"><table width="100%" border="0" cellpadding="3" class="cetak">
      <tr>
        <th width="58%" rowspan="2" align="center" scope="col"><strong>PINDAH</strong></th>
        <th colspan="2" align="center" scope="col" width="20%"><strong>WNI</strong></th>
        <th colspan="2" align="center" scope="col" width="22%"><strong>WNA</strong></th>
      </tr>
      <tr>
        <th width="10%" align="center"><strong>L</strong></th>
        <th width="10%" align="center"><strong>P</strong></th>
        <th width="11%" align="center"><strong>L</strong></th>
        <th width="11%" align="center"><strong>P</strong></th>
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
</table><br />
<br />
<?php  if($desa2->bentuk_lembaga=="Kelurahan")  {  ?>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="63%" align="left">MENGETAHUI,</td>
    <td width="37%" align="left"><?php echo $desa2->desa.", ".date("d-m-Y"); ?></td>
  </tr>
  <tr>
    <td align="left">LURAH <?php echo $desa2->desa; ?></td>
    <td align="left">SEKLUR </td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left"><u><?php echo  $desa2->nama_kepala_desa ?></u></td>
    <td align="left"><u><?php echo  $desa2->nama_sek_desa ?></u></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td width="8%" align="left">PANGKAT</td>
        <td width="92%" align="left">: <?php echo  $desa2->pangkat_kepala_desa ?></td>
      </tr>
      <tr>
        <td colspan="2" align="left">NIP. <?php echo  $desa2->nip_kepala_desa ?></td>
        </tr>
    </table></td>
    <td align="left"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td width="14%" align="left">PANGKAT</td>
        <td width="86%" align="left">: <?php echo  $desa2->pangkat_sek_desa ?></td>
      </tr>
      <tr>
        <td colspan="2" align="left">NIP. <?php echo  $desa2->nip_sek_desa ?></td>
        </tr>
    </table></td>
  </tr>
</table>
<?php }  else { ?>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="63%" align="left" valign="top">MENGETAHUI,</td>
    <td width="37%" align="left"><?php echo $desa2->desa.", ".date("d-m-Y"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top">KEPALA DESA <?php echo $desa2->desa; ?></td>
    <td align="left">SEKRETARIS DESA</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top"><u><?php echo  $desa2->nama_kepala_desa ?></u></td>
    <td align="left"><u><?php echo  $desa2->nama_sek_desa ?></u></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td width="14%" align="left">PANGKAT</td>
        <td width="86%" align="left">: <?php echo  $desa2->pangkat_sek_desa ?></td>
      </tr>
      <tr>
        <td colspan="2" align="left">NIP. <?php echo  $desa2->nip_sek_desa ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }  ?></body>
</html>