<?php foreach($data as $key=>$val){ ?>
<tr>
<td width="250" class="thin"><strong><?php echo $val['underbow'] ?></strong>&nbsp;</td><td width="350" class="thin"><?php if(!empty($val['jumlah'])){ if($val['jumlah'] != '0')echo $val['jumlah']." unit organisasi"; }?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Jumlah pengurus</td><td class="thin"><?php echo empty($val['pengurus'])?"":$val['pengurus']." orang" ?>&nbsp;</td>
</tr>
<tr>
<tr>
<td class="thin">Jumlah anggota</td><td class="thin"><?php echo empty($val['anggota'])?"":$val['anggota']." orang" ?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Alamat kantor</td><td class="thin"><?php echo $val['alamat'] ?>&nbsp;</td>
</tr>
<tr>
<td width="250" class="thin">Dasar hukum pembentukan</td><td width="350" class="thin"><?php echo $val['hukum'] ?>&nbsp;</td>
</tr>
<tr>
<td class="thin">Ruang lingkup kegiatan</td><td class="thin"><?php echo empty($val['jenis'])?"":$val['jenis']." Jenis"; 
if(!empty($val['jenis']) && !empty($val['yakni'])) echo " , "; echo !empty($val['yakni'])?"Yakni ".$val['yakni']:""; ?>&nbsp;</td>
</tr>
<?php } ?>