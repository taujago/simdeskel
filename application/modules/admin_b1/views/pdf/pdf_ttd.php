<?php 
	$desa2 = $this->cm->data_desa();

	?>
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
	font-size:8px;
}

table.cetak td {
	/*border-left : 1px solid #000;
	border-right : 1px solid #000;*/
	border:1px solid #000;
	
}

 
</style>
<?php  if($desa2->bentuk_lembaga=="Kelurahan")  {  ?>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="63%" align="left">MENGETAHUI, </td>
    <td width="37%" align="left"><?php echo $desa2->desa.", ".date("d-m-Y"); ?></td>
  </tr>
  <tr>
    <td align="left">LURAH </td>
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
        <td align="left">PANGKAT : <?php echo  $desa2->pangkat_kepala_desa ?></td>
      </tr>
      <tr>
        <td align="left">NIP. <?php echo  $desa2->nip_kepala_desa ?></td>
      </tr>
    </table></td>
    <td align="left"><table width="100%" border="0" cellpadding="0">
      <tr>
        <td align="left">PANGKAT : <?php echo  $desa2->pangkat_sek_desa ?></td>
      </tr>
      <tr>
        <td align="left">NIP. <?php echo  $desa2->nip_sek_desa ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }  else { ?>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="63%" align="left" valign="top">MENGETAHUI, </td>
    <td width="37%" align="left"><?php echo $desa2->desa.", ".date("d-m-Y"); ?></td>
  </tr>
  <tr>
    <td align="left" valign="top">KEPALA DESA </td>
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
        <td align="left">PANGKAT : <?php echo  $desa2->pangkat_sek_desa ?></td>
      </tr>
      <tr>
        <td align="left">NIP. <?php echo  $desa2->nip_sek_desa ?></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }  ?>
