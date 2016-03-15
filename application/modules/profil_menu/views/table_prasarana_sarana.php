<?php 
$c = 1;
$bef = $data[0]['cat_teks'];
?>
F. PRASARANA DAN SARANA LEMBAGA KEMASYARAKATAN
<br /><br />
<table class='menjorok' style="border:1px solid black;border-collapse:separate;border-spacing:0">
<tr><td width='450'class="thin"><strong><?php echo $data[0]['cat_teks'] ?></strong>&nbsp;</td><td width='150'class="thin"<?php echo $data[0]['ket1_teks'] ?>>&nbsp;</td></tr>
<?php
foreach($data as $key=>$val){ 
$now = $val['cat_teks'];
if($now != $bef){
	echo '<tr><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td></tr>';
	echo '<tr><td class="thin"><strong>'.$now.'</strong>&nbsp;</td><td class="thin">'.$val['ket1_teks'].'&nbsp;</td></tr>';
	}
if(empty($val['jumlah'])) $str ="";
else $str = " - ".$val['jumlah']." ".$val['id_satuan_teks'];
?>
</td><td width='150' class="thin"><?php echo $val['sarana'] ?>&nbsp;</td><td width='150' class="thin"><?php echo $val['ket_teks'].$str ?>&nbsp;</td></tr>
<?php
$bef = $val['cat_teks'];
$c++;
} 
?>
</table>
<p style="clear:both"></p>