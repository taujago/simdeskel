<?php 
$c = 1;
$bef = $data[0]['id_sektor']; ?>
V. STRUKTUR MATA PENCAHARIAN MENURUT SEKTOR
<br /><br />
<table class='menjorok' style="border:1px solid black;border-collapse:collapse;">
<tr><td width='450'class="thin"><strong><?php echo $data[0]['sektor'] ?></strong></td><td width='150'class="thin"></td></tr>
<?php
foreach($data as $key=>$val){ 
$now = $val['id_sektor'];
if($now != $bef)echo '<tr><td class="thin">&nbsp;</strong></td><td class="thin">&nbsp;</td></tr>';
?>
<tr><td width='450'class="thin">
<?php
$title = $val['sektor'];
if($now != $bef)echo "<strong>$title</strong>";
else echo $val['pekerjaan'];
?>
</td><td width='150' class="thin"><?php echo ($val['penduduk']==0)?'-':$val['penduduk']." orang" ?></td></tr>
<?php
$bef = $val['id_sektor'];
$c++;
} 
?>
</table>
<p style="clear:both"></p>