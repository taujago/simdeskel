<html>
  <head>
    <title>
      <?php echo   $title; ?>
    </title>

 <style>
* {
  font-size:10px;
}
 </style> 
    </head>

<body>
  <?php 
  $desa2 = $this->cm->data_desa();

  ?>

 
<p align="center"><b> 
<span id="judulsurat">DATA MONOGRAFI DESA </span><br />
</p>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="2%" align="left"><strong>A.</strong></td>
    <td colspan="6" align="left" width="98%"><strong>BIDANG PEMERINTAHAN</strong></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left"><strong>I.</strong></td>
    <td colspan="5" align="left"><strong>UMUM</strong></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">1. </td>
    <td colspan="4" align="left">Luas dan Batas Wilayah</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">a.</td>
    <td width="30%" align="left">Luas Desa</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($luas,0,',','.'); ?> m<sup>2</sup></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">b. </td>
    <td width="30%" align="left">Batas Desa</td>
    <td align="left">:</td>
    <td align="left">&nbsp;</td>
  </tr>
  <?php   
    foreach($rec_batas_wilayah->result() as $row ) : 
  ?>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">- <?php echo $row->batas ?> </td>
    <td align="left">:</td>
    <td align="left"><?php echo $row->desa ?></td>
  </tr>
  <?php endforeach; ?>
   
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">2.</td>
    <td colspan="4" align="left">Kondisi Geografi</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">a.</td>
    <td width="30%" align="left">Ketinggian DPL</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($ketinggian,0,',','.'); ?> M </td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">b.</td>
    <td width="30%" align="left">Banyaknya Curah Hujan</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($curah_hujan,0,',','.'); ?> / Th</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">c. </td>
    <td width="30%" align="left">Suhu Udara rata - rata </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo $suhu_udara; ?> derajat Celcius</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">d, </td>
    <td width="30%" align="left">Bentang Wilayah</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"> <?php echo $bentang_wilayah; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">e.</td>
    <td width="30%" align="left">Jumlah Bulan Hujan </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo $bulan_hujan; ?> Bulan </td>
  </tr>
   <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td width="30%" align="left">&nbsp;</td>
    <td width="1%" align="left">&nbsp;</td>
    <td width="80%" align="left">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">3.</td>
    <td colspan="4" align="left">Orbitasi</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">a. </td>
    <td width="30%" align="left">Jarak ke ibu kota kec. </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($jarak_kec,0,',','.'); ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">b.</td>
    <td width="30%" align="left">Jarak ke ibu kota Kab. </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($jarak_kab,0,',','.'); ?></td>
  </tr>
  
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">c.</td>
    <td width="30%" align="left">Jarak ke ibu kota Provinsi. </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($jarak_prop,0,',','.'); ?></td>
  </tr>
   <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td width="30%" align="left">&nbsp;</td>
    <td width="1%" align="left">&nbsp;</td>
    <td width="80%" align="left">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">4.</td>
    <td colspan="4" align="left">TIPOLOGI DESA</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">a. </td>
    <td width="30%" align="left">Desa Kepulauan </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo  ($tipologi_desa == "a")?" Ya  / <s>Bukan</s> ":" <s>Ya </s> /  Bukan  "; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">b.</td>
    <td width="30%" align="left">Desa Pantai Pesisir </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo  ($tipologi_desa == "b")?" Ya  / <s>Bukan</s> ":" <s>Ya </s> /  Bukan  "; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">c.</td>
    <td width="30%" align="left">Desa Terisolir </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo  ($tipologi_desa == "c")?" Ya  / <s>Bukan</s> ":" <s>Ya </s> /  Bukan  "; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">d. </td>
    <td width="30%" align="left">Desa Sekitar Hutan</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo  ($tipologi_desa == "d")?" Ya  / <s>Bukan</s> ":" <s>Ya </s> /  Bukan  "; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">e.</td>
    <td width="30%" align="left">Desa Perbatas dengan kab. lain </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo  ($tipologi_desa == "e")?" Ya  / <s>Bukan</s> ":" <s>Ya </s> /  Bukan  "; ?></td>
  </tr>
  
   <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td width="30%" align="left">&nbsp;</td>
    <td width="1%" align="left">&nbsp;</td>
    <td width="80%" align="left">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left"><strong>II.</strong></td>
    <td colspan="5" align="left"><strong>KEPENDUDUKAN</strong></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">1. </td>
    <td colspan="4" align="left">Jumlah Penduduk Menurut </td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">a.</td>
    <td width="30%" align="left">Jenis Kelamin </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">1 Laki - laki </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_data_penduduk_per_jk['L'],0,',','.'); ?> Jiwa</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">2. Perempuan </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_data_penduduk_per_jk['P'],0,',','.'); ?> Jiwa </td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">b.</td>
    <td width="30%" align="left">Jumlah KK </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($get_data_kk['KK'],0,',','.'); ?> KK </td>
  </tr>
<tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">c.</td>
    <td width="30%" align="left">Kewarganegaraan</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">- WNI </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_data_per_warga_negara['WNI'],0,',','.'); ?> Jiwa </td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">- WNA  </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_data_per_warga_negara['WNA'],0,',','.'); ?> Jiwa </td>
  </tr>  

<tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">2. </td>
    <td colspan="4" align="left">Penduduk Menurut Agama </td>
  </tr>
  <?php foreach($get_data_penduduk_per_agama->result() as $row) :  ?>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">a.</td>
    <td width="30%" align="left"><?php echo $row->agama ?></td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php  echo $row->jumlah; ?> Jiwa </td>
  </tr>
  <?php endforeach; ?>
  
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">3. </td>
    <td colspan="4" align="left">Penduduk Menurut Usia</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">a.</td>
    <td width="30%" align="left">Kelompok Pendidikan</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">1) 04 - 06 Tahun </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_penduduk_usia_pendidikan['u_04_06'],0,',','.'); ?> Jiwa</td>
  </tr>
   <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">2) 07 - 12 Tahun </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_penduduk_usia_pendidikan['u_07_12'],0,',','.'); ?> Jiwa</td>
  </tr>
   <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">3) 13 - 15 Tahun </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_penduduk_usia_pendidikan['u_13_15'],0,',','.'); ?> Jiwa</td>
  </tr>
  
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">b.</td>
    <td width="30%" align="left">Kelompok Tenaga Kerja </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">1) 20 - 60 Tahun </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_penduduk_usia_kerja['u_20_60'],0,',','.'); ?> Jiwa</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">2) 07 - 12 Tahun </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_penduduk_usia_kerja['u_07_12'],0,',','.'); ?> Jiwa</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
    <td width="30%" align="left">3) 13 - 15 Tahun </td>
    <td align="left">:</td>
    <td align="left"><?php echo number_format($get_penduduk_usia_kerja['u_13_15'],0,',','.'); ?> Jiwa</td>
  </tr>
 <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">4. </td>
    <td colspan="4" align="left">Penduduk menurut tingkat pendidikan </td>
  </tr> 
  <?php 
  $n = 0;
  foreach($get_penduduk_per_pekerjaan->result() as $row) : 
  $n++;  ?>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">a. </td>
    <td width="30%" align="left">Pendidikan</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"> Orang </td>
  </tr>
  <?php endforeach; ?>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">5. </td>
    <td colspan="4" align="left">Penduduk menurut Mata Pencaharian </td>
  </tr> 
  
  <?php 
  $n = 0;
  foreach($get_penduduk_per_pekerjaan->result() as $row) : 
  $n++;  ?>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left"><?php echo $n; ?>. </td>
    <td width="30%" align="left"><?php echo $row->pekerjaan; ?> </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo $row->jumlah; ?> Orang </td>
  </tr>
  <?php endforeach; ?>
  
  
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">6. </td>
    <td colspan="4" align="left">Mutasi Pendudk </td>
  </tr> 
  
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">1)</td>
    <td width="30%" align="left">Lahir </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($get_jumlah_lahir['jumlah'],0,',','.'); ?> Orang</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">2)</td>
    <td width="30%" align="left">Mati </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($get_jumlah_mati['jumlah'],0,',','.'); ?> Orang</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">3)</td>
    <td width="30%" align="left">Datang</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($get_jumlah_datang['jumlah'],0,',','.'); ?> Orang</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">4)</td>
    <td width="30%" align="left">Pindah </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo number_format($get_jumlah_pindah['jumlah'],0,',','.'); ?> Orang</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left"><strong>III.</strong></td>
    <td colspan="5" align="left"><strong>PEMERINTAHAN DESA</strong></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">1)</td>
    <td colspan="2" align="left">Kantor desa dibangun pada tahun </td>
    <td align="left" width="1%">:</td>
    <td align="left"><?php echo $kantor_desa_dibangun; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">2)</td>
    <td colspan="2" align="left">Permanen / Semi Permanen </td>
    <td align="left" width="1%">:</td>
    <td align="left"><?php echo $jenis_bangunan; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">3)</td>
    <td colspan="2" align="left">Status Desa</td>
    <td align="left" width="1%">:</td>
    <td align="left"><?php echo $status_desa; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">4)</td>
    <td colspan="2" align="left">Jumlah Dusun </td>
    <td align="left" width="1%">:</td>
    <td align="left"><?php echo $jumlah_dusun; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">5)</td>
    <td colspan="2" align="left">Jumlah RT</td>
    <td align="left" width="1%">:</td>
    <td align="left"><?php echo $jumlah_dusun; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">6)</td>
    <td colspan="2" align="left">Jumlah RW</td>
    <td align="left" width="1%">:</td>
    <td align="left"><?php echo $jumlah_rt; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td align="left" width="3%">7)</td>
    <td colspan="2" align="left">Jumlah Perangkat Desa</td>
    <td align="left" width="1%">:</td>
    <td align="left"><?php echo $jumlah_rw; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">a)</td>
    <td width="30%" align="left">Kepala Urusan </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo $jumlah_kaur; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">b)</td>
    <td width="30%" align="left">Kepala Dusun </td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo $jumlah_kadus; ?></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
    <td width="3%" align="left">&nbsp;</td>
    <td  align="left" width="3%">&nbsp;</td>
    <td width="3%" align="left">c)</td>
    <td width="30%" align="left">Staff</td>
    <td width="1%" align="left">:</td>
    <td width="80%" align="left"><?php echo $jumlah_staff; ?></td>
  </tr>
</table>
<p align="center">&nbsp; </p>
</body>

</html>