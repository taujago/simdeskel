<div class="menjorok">2. Pendidikan Formal Keagamaan</div>
<table class='menjorok' style="border:1px solid black;border-collapse:separate;border-spacing:0">
<tr><th width="105" rowspan='2'class="thin">Nama</th><th width="65" rowspan='2' class="thin">Jumlah</th><th width="70" rowspan='2' class="thin">Status<br />(Ter<br />daftar)&#44;<br />Ter<br />akreditasi</th><th colspan="3" class="thin">Kepemilikan</th><th rowspan='2' width="70" class="thin">Jumlah<br>Tenaga<br>Peng<br>ajar</th><th width="70" rowspan='2' class="thin">Jumlah<br>Siswa<br>Maha<br>siswa</th></tr>
<tr><th width="70" class="thin">Peme<br />rintah</th><th width="70" class="thin">Swasta</th><th width="70" class="thin">Dll</th></tr>
<tr><td class="thin"><strong><?php echo $data[0]['cat_teks'] ?></strong>&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td></tr>
<?php 
$cat_bef = $data[0]['cat_teks'];
foreach($data as $val){ 
$cat_now = $val['cat_teks'];
if($cat_now != $cat_bef){
	echo '<tr><td class="thin"><strong>'.$cat_now.'</strong>&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td></tr>';
}
?>
<tr><td class="thin"><?php echo $val['pendidikan_formal'] ?>&nbsp;</td><td  class="thin"><?php echo $val['jumlah'] ?>&nbsp;</td><td class="thin"><?php echo $val['status_teks'] ?>&nbsp;</td><td class="thin"><?php echo $val['pemerintah_teks'] ?>&nbsp;</td><td class="thin"><?php echo $val['swasta_teks'] ?>&nbsp;</td><td class="thin"><?php echo $val['dll_teks'] ?>&nbsp;</td><td class="thin"><?php echo $val['pengajar'] ?>&nbsp;</td><td class="thin"><?php echo $val['siswa'] ?>&nbsp;</td></tr>
<?php 
$cat_bef = $val['cat_teks'];
} ?>
</table>
<p style="clear:both"></p>