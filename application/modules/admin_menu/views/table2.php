<table class='menjorok <?php echo $dekat ?>' style="border:1px solid black;border-collapse:separate;border-spacing:0">
<tr><th <?php echo isset($style)?$style:'' ?> width="200" class="thin"><?php echo $title ?>&nbsp;</th><th width="140" class="thin">&nbsp;</th><th width="120" class="thin">&nbsp;</th><th width="140" class="thin">&nbsp;</th></tr>
<?php foreach($data as $val) { ?>
<tr><td width="200" class="thin"><?php echo $val['pengangkutan'] ?>&nbsp;</td><td width="140" class="thin"><?php echo $val['jumlah'] ?>&nbsp;</td><td width="120" class="thin"><?php echo $val['kapasitas'] ?>&nbsp;</td><td width="140" class="thin"><?php echo $val['tenaga_kerja'] ?>&nbsp;</td></tr>
<?php } ?>
<tr><td width="200" class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td><td class="thin">&nbsp;</td></tr>
</table>
<p style="clear:both"></p>