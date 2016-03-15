<div style="width:100%;height:100px;text-align:center"><table style="float:right">
<tr><td>LAMPIRAN II :</td><td colspan="3" >PERATURAN MENTERI DALAM NEGERI</td></tr>
<tr><td></td><td>NOMOR</td><td>:</td><td>12 TAHUN 2007</td></tr>
<tr><td></td><td>TANGGAL</td><td>:</td><td>12 MARET 2007</td></tr>
<tr><td></td><td colspan="3" style="border-top-style:solid;border-top-width:1px">&nbsp;</td></tr>
</table>
</div>
<br style="clear:both">
<P style="font-size:16px;font-weight:bold;margin:0;text-align:center">DAFTAR ISIAN</P>
<P style="font-size:16px;font-weight:bold;margin:0;text-align:center"><?php echo $str ?></P>
<br>
<table>
<tr><td>Desa/Kelurahan</td><td>:</td><td><?php echo $desa['desa'] ?></td></tr>
<tr><td>Kecamatan</td><td>:</td><td><?php echo $desa['kecamatan'] ?></td></tr>
<tr><td>Kabupaten/Kota</td><td>:</td><td><?php echo $desa['kota'] ?></td></tr>
<tr><td>Provinsi</td><td>:</td><td><?php echo $desa['provinsi'] ?></td></tr>
<tr><td>Bulan</td><td>:</td><td><?php 
$m = array( 1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                 5 => 'Mei',     6 => 'Juni',     7 => 'Juli',  8 => 'Agustus',
                 9 => 'September', 10 => 'Oktober', 11 => 'November',
                 12 => 'Desember');
echo $m[date('m')+0]; ?></td></tr>
<tr><td>Tahun</td><td>:</td><td><?php echo date('Y') ?></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>Nama pengisi</td><td>:</td><td>..........................................................................................................</td></tr>
<tr><td>Pekerjaan</td><td>:</td><td>..........................................................................................................</td></tr>
<tr><td>Jabatan</td><td>:</td><td>..........................................................................................................</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
<p style="font-size:16px;font-weight:bold;margin:0;">SUMBER DATA YANG DIGUNAKAN UNTUK MENGISI PROFIL DESA/KELURAHAN</p>
<p>&nbsp;</p>
<p style="margin:0">1. ...............................................................................................................................................................</p>
<p style="margin:0">2. ...............................................................................................................................................................</p>
<p style="margin:0">3. ...............................................................................................................................................................</p>
<p style="margin:0">4. ...............................................................................................................................................................</p>
<p>&nbsp;</p>
Kepala Desa/Lurah,
<br>
<br>
<br>
<br>
<br>
<?php echo $desa['nama_kepala_desa'] ?>
<br>
<br>
<br style="page-break-after:always;clear:both">