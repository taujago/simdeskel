<p style="clear:both"></p>
<div class="menjorok">C. LEMBAGA POLITIK</div>
<?php
foreach($data as $key=>$val){
if($key == 0)echo '<table class="menjorok" style="border:1px solid black;border-collapse:separate;border-spacing:0">';
?>
<tr>
<td width="250" class="thin"><strong><?php echo $val['partai_politik'] ?></strong></td><td width="350" class="thin">&nbsp;</td>
</tr>
<tr>
<td class="thin">Jumlah Pengurus</td><td class="thin"><?php echo empty($val['pengurus'])?"":$val['pengurus']." orang" ?>&nbsp;</td>
</tr>
<?php if(!empty($val['lokal'])) { ?>
<tr>
<td class="thin">Jumlah Partai Politik Lokal</td><td class="thin"><?php echo $val['lokal'] ?>&nbsp;</td>
</tr>
<?php } ?>
<?php if(!empty($val['nasional'])) { ?>
<tr>
<td class="thin">Jumlah Partai Politik Nasional</td><td class="thin"><?php echo $val['nasional'] ?>&nbsp;</td>
</tr>
<?php } ?>
<tr>
<td class="thin">Jumlah Anggota</td><td class="thin"><?php echo empty($val['anggota'])?"":$val['anggota']." orang" ?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Jumlah Pemilih pada Pemilu Terakhir</td><td class="thin"><?php echo empty($val['pemilih'])?"":$val['pemilih']." orang" ?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Alamat Sekretariat/Kantor</td><td class="thin"><?php echo $val['alamat'] ?>&nbsp;</td>
</tr>
<tr>
<td width="250" class="thin">Dasar Hukum Pembentukan</td><td width="350" class="thin"><?php echo $val['hukum'] ?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Ruang Lingkup Kegiatan</td><td class="thin"><?php echo empty($val['jenis'])?"":$val['jenis']." Jenis"; 
if(!empty($val['jenis']) && !empty($val['yakni'])) echo " , "; echo !empty($val['yakni'])?"Yakni ".$val['yakni']:""; ?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Organisasi Underbow</td><td class="thin"><?php echo $val['underbow'] ?>&nbsp;</td>
</tr>
<?php }
$temp['data'] = $underbow;
$this->load->view("table_underbow",$temp);
?>
</table>
<p style="clear:both"></p>