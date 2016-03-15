	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jseasyui/themes/icon.css">
<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="cetak_silsilah('<?php echo $detail->id_penduduk ?>')">Cetak Silsilah</a><br />
<style>
td a.link {
	text-decoration:underline; 
	 
	margin-left: 5px;
	color:#000;
}
td a.link:hover {
	color:#666;
}
</style>
<fieldset>
<legend> <strong>DATA PENDUDUK </strong> </legend>
<?php 
$arr_status_kawin = $this->cm->arr_status_kawin;
?>
<table width="100%" border="0">
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td width="18%" valign="top"><img  width="150" height="200"  class="foto" src="<?php echo base_url()."/foto/".$detail->foto; ?>" /></td>
    <td width="82%" valign="top"><table width="100%" border="0">
      <tr>
        <td width="22%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="77%"><?php echo $detail->nama; ?></td>
      </tr>
      <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $detail->nik; ?></td>
      </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?php echo $detail->tmp_lahir; ?></td>
      </tr>
      <tr>
        <td>Tgl Lahir</td>
        <td>:</td>
        <td><?php echo $detail->tgl_lahir; ?></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?php echo $detail->umur; ?> thn </td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $detail->agama; ?></td>
      </tr>
      <tr>
        <td>Status Kawin</td>
        <td>:</td>
        <td><?php echo $arr_status_kawin[$detail->status_kawin]; ?></td>
      </tr>
    </table></td>
    </tr>
</table>

</fieldset>


<fieldset>
<legend> <strong>DATA PASANGAN </strong> </legend>
<?php if(!isset($pasangan->nama)) {
	echo "Tidak ada data";
}
else {
?>
<table width="100%" border="0">
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td width="18%" valign="top"><img width="150" height="200" class="foto" src="<?php echo base_url()."/foto/".$pasangan->foto; ?>" /></td>
    <td width="82%" valign="top"><table width="100%" border="0">
      <tr>
        <td width="22%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="77%"><?php echo $pasangan->nama; ?></td>
      </tr>
      <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $pasangan->nik; ?></td>
      </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?php echo $pasangan->tmp_lahir; ?></td>
      </tr>
      <tr>
        <td>Tgl Lahir</td>
        <td>:</td>
        <td><?php echo $pasangan->tgl_lahir; ?></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?php echo $pasangan->umur; ?> thn</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $pasangan->agama; ?></td>
      </tr>
      <tr>
        <td>Status Kawin</td>
        <td>:</td>
        <td><?php echo $arr_status_kawin[$pasangan->status_kawin]; ?></td>
      </tr>
      <tr>
        <td colspan="3"><a class="link" href="#" onclick="getdata('<?php echo $pasangan->nik ?>')">Lihat silsilah</a>
          <a class="link"  href="<?php echo site_url("operator_penduduk/detail/$pasangan->id_penduduk"); ?>" >Lihat Detail</a></td>
        </tr>
    </table></td>
    </tr>
</table><?php } ?>

</fieldset>


<fieldset>
<legend> <strong>ORANG TUA </strong> </legend>
 <!-- 
<table width="100%" border="1"  id="ortu">
  <tr>
    <td colspan="2" width="50%">BAPAK</td>
    <td colspan="2" width="50%">IBU</td>
    </tr>
  
  <tr>
    <td width="16%" valign="top">
    <?php 
	
	
	if($bapak=="0") echo "Tidak ada data";
	else { 
	$foto = isset($bapak->foto)?$bapak->foto:"no_photo.jpg";
	?>
    <img width="150" height="200" class="foto" src="<?php echo base_url()."/foto/".$foto; ?>" /></td>
    <td width="34%" valign="top"><table width="100%" border="0">
      <tr>
        <td width="41%">Nama Lengkap</td>
        <td width="2%">:</td>
        <td width="57%"><a href="#" onclick="getdata('<?php echo $bapak->nik ?>')"><?php echo isset($bapak->nama)?$bapak->nama:""; ?></a></td>
      </tr>
      <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo isset($bapak->nik)?$bapak->nik:""; ?></td>
      </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?php echo isset($bapak->tmp_lahir)?$bapak->tmp_lahir:""; ?></td>
      </tr>
      <tr>
        <td>Tgl Lahir</td>
        <td>:</td>
        <td><?php echo isset($bapak->tgl_lahir)?$bapak->tgl_lahir:""; ?></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?php echo isset($bapak->umur)?$bapak->umur." Tahun":""; ?> thn </td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo isset($bapak->agama)?$bapak->agama:""; ?></td>
      </tr>
      <tr>
        <td>Status Kawin</td>
        <td>:</td>
        <td><?php echo isset($bapak->status_kawin)?$arr_status_kawin[$bapak->status_kawin]:""; ?></td>
      </tr>
      <tr>
        <td colspan="3"><a class="link"  href="#" onclick="getdata('<?php echo $bapak->id_penduduk ?>')">Lihat silsilah</a> <a class="link"  href="<?php echo site_url("operator_penduduk/detail/$bapak->id_penduduk"); ?>" >Lihat Detail</a></td>
        </tr>
    </table>
    <?php 
	}
	?></td>
    <td width="17%" valign="top">
     <?php if($ibu=="0") echo "Tidak ada data";
	else { 
	$foto = isset($ibu->foto)?$ibu->foto:"no_photo.jpg";
	?>
    <img width="150" height="200" class="foto" src="<?php echo base_url()."/foto/".$foto; ?>" /></td>
    <td width="33%" valign="top"><table width="100%" border="0">
      <tr>
        <td width="41%">Nama Lengkap</td>
        <td width="2%">:</td>
        <td width="57%"><a href="#" onclick="getdata('<?php echo $ibu->nik ?>')"><?php echo isset($ibu->nama)?$ibu->nama:""; ?></a></td>
      </tr>
      <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo isset($ibu->nik)?$ibu->nik:""; ?></td>
      </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?php echo isset($ibu->tmp_lahir)?$ibu->tmp_lahir:""; ?></td>
      </tr>
      <tr>
        <td>Tgl Lahir</td>
        <td>:</td>
        <td><?php echo isset($ibu->tgl_lahir)?$ibu->tgl_lahir:""; ?></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?php echo isset($ibu->umur)?$ibu->umur." Tahun":""; ?> thn</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo isset($ibu->agama)?$ibu->agama:""; ?></td>
      </tr>
      <tr>
        <td>Status Kawin</td>
        <td>:</td>
        <td><?php echo isset($ibu->status_kawin)?$arr_status_kawin[$ibu->status_kawin]:""; ?></td>
      </tr>
      <tr>
        <td colspan="3"><a class="link"  href="#" onclick="getdata('<?php echo $ibu->id_penduduk ?>')">Lihat silsilah</a> <a class="link"  href="<?php echo site_url("operator_penduduk/detail/$ibu->id_penduduk"); ?>" >Lihat Detail</a></td>
        </tr>
    </table>
    <?php } ?>
    </td>
  </tr>
</table> -->

 <br />
 <table width="100%" border="0" cellpadding="3">
   <tr>
     <th width="49%" scope="col">DATA AYAH</th>
     <th width="51%" scope="col">DATA IBU</th>
   </tr>
   <tr>
     <td align="center"> <!--  begin of data ayah --> 
     <?php 
	 
	 	if($bapak=="0") { echo "<b>Tidak ada data</b>";  } 
		else { 
		 
		$foto_bapak = isset($bapak->foto)?$bapak->foto:"no_photo.jpg";  
	 ?>
     <table width="100%" border="0">
       <tr>
         <td width="18%" valign="top">
         <img width="150" height="200" class="foto" src="<?php echo base_url()."/foto/".$foto_bapak ; ?>" /></td>
         <td width="82%" valign="top"><table width="100%" border="0">
           <tr>
             <td width="35%">Nama Lengkap</td>
             <td width="2%">:</td>
             <td width="63%"><?php echo isset($bapak->nik)?$bapak->nama:""; ?></td>
             </tr>
           <tr>
             <td>NIK</td>
             <td>:</td>
             <td><?php echo isset($bapak->nik)?$bapak->nik:""; ?></td>
             </tr>
           <tr>
             <td>Tempat Lahir</td>
             <td>:</td>
             <td><?php echo isset($bapak->tmp_lahir)?$bapak->tmp_lahir:""; ?></td>
             </tr>
           <tr>
             <td>Tgl Lahir</td>
             <td>:</td>
             <td><?php echo isset($bapak->tgl_lahir)?$bapak->tgl_lahir:""; ?></td>
             </tr>
           <tr>
             <td>Umur</td>
             <td>:</td>
             <td><?php echo isset($bapak->umur)?$bapak->umur:""; ?> thn</td>
             </tr>
           <tr>
             <td>Agama</td>
             <td>:</td>
             <td><?php echo isset($bapak->umur)?$bapak->agama:""; ?> </td>
             </tr>
           <tr>
             <td>Status Kawin</td>
             <td>:</td>
             <td><?php echo isset($bapak->status_kawin)?$arr_status_kawin[$bapak->status_kawin]:""; ?></td>
             </tr>
           <tr> <?php $pasangan_id_penduduk = isset($pasangan->id_penduduk)?$pasangan->id_penduduk:"";  ?>
             <td colspan="3"><a class="link" href="#" onclick="getdata('<?php echo isset($bapak->nik)?$bapak->nik:"" ?>')">Lihat silsilah</a> <a class="link"  href="<?php echo site_url("operator_penduduk/detail/$bapak->id_penduduk"); ?>" >Lihat Detail</a></td>
             </tr>
           </table> 
           
           </td>
       </tr>
     </table><?php } ?> <!-- end of data ayah  --></td>
     <td align="center">
     <!--  begin of data ibu -->
      <?php if($ibu=="0") echo "<b>Tidak ada data</b>";
	else { 
	$foto = isset($ibu->foto)?$ibu->foto:"no_photo.jpg"; ?>
     <table width="100%" border="0">
       <tr><?php $pasangan_foto = isset($pasangan->foto)?$pasangan->foto:"nophoto.jpg"; ?>
         <td width="18%" valign="top"><img width="150" height="200" class="foto" src="<?php echo base_url()."/foto/".$ibu->foto; ?>" /></td>
         <td width="82%" valign="top"><table width="100%" border="0">
           <tr>
             <td width="35%">Nama Lengkap</td>
             <td width="2%">:</td>
             <td width="63%"><?php echo isset($ibu->nama)?$ibu->nama:""; ?></td>
           </tr>
           <tr>
             <td>NIK</td>
             <td>:</td>
             <td><?php echo isset($ibu->nik)?$ibu->nik:""; ?></td>
           </tr>
           <tr>
             <td>Tempat Lahir</td>
             <td>:</td>
             <td><?php echo isset($ibu->tmp_lahir)?$ibu->tmp_lahir:""; ?></td>
           </tr>
           <tr>
             <td>Tgl Lahir</td>
             <td>:</td>
             <td><?php echo isset($ibu->tgl_lahir)?$ibu->tgl_lahir:""; ?></td>
           </tr>
           <tr>
             <td>Umur</td>
             <td>:</td>
             <td><?php echo isset($ibu->umur)?$ibu->umur:""; ?> thn</td>
           </tr>
           <tr>
             <td>Agama</td>
             <td>:</td>
             <td><?php echo isset($ibu->agama)?$ibu->agama:""; ?></td>
           </tr>
           <tr>
             <td>Status Kawin</td>
             <td>:</td>
             <td><?php echo isset($ibu->status_kawin)?$arr_status_kawin[$ibu->status_kawin]:""; ?></td>
           </tr>
           <tr>  
             <td colspan="3"><a class="link" href="#" onclick="getdata('<?php echo isset($ibu->nik)?$ibu->nik:""; ?>')">Lihat silsilah</a> <a class="link"  href="<?php echo site_url("operator_penduduk/detail/$ibu->id_penduduk"); ?>" >Lihat Detail</a></td>
           </tr>
         </table>
         <!-- end of data ibu -->
         </td>
       </tr>
     </table><?php } ?></td>
   </tr>
 </table>
</fieldset>

<fieldset>
<legend> <strong>DATA SAUDARA  </strong> </legend>
<?php if($saudara->num_rows() == 0) {
	echo "Tidak ada data";
}
else {
	
?>
<table width="100%" border="0">

<?php foreach($saudara->result() as $row) :  ?>
  <tr>
    <td width="19%" valign="top"><img width="150" height="200" class="foto" src="<?php echo base_url()."/foto/".$row->foto; ?>" /></td>
    <td width="81%" valign="top"><table width="100%" border="0">
      <tr>
        <td width="29%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="70%"><a href="#" onclick="getdata('<?php echo $row->nik ?>')"><?php echo $row->nama; ?></a></td>
      </tr>  <td>NIK</td>
        <td>:</td>
        <td><?php echo $row->nik; ?></td>
      </tr>
       <tr>
         <td>Saudara ke </td>
         <td>:</td>
         <td><?php echo $row->anakke; ?></td>
       </tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?php echo $row->tmp_lahir; ?></td>
      </tr>
      <tr>
        <td>Tgl Lahir</td>
        <td>:</td>
        <td><?php echo $row->tgl_lahir; ?></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?php echo $row->umur; ?> thn</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $row->agama; ?></td>
      </tr>
      <tr>
        <td>Status Kawin</td>
        <td>:</td>
        <td><?php echo $arr_status_kawin[$row->status_kawin]; ?></td>
      </tr>
      <tr>
        <td colspan="3"><a class="link"  href="#" onclick="getdata('<?php echo $row->nik ?>')">Lihat silsilah</a> 
        <a class="link"  href="<?php echo site_url("operator_penduduk/detail/$row->id_penduduk"); ?>" >Lihat Detail</a></td>
        </tr>
    </table></td>
  </tr>
  
  <?php endforeach; } ?>
</table>
</fieldset>



<fieldset>
<legend> <strong>DATA ANAK  </strong> </legend>
<?php if($anak->num_rows() == 0) {
	echo "Tidak ada data";
}
else {
	
?>

<table width="100%" border="0">

<?php foreach($anak->result() as $row) :  ?>
  <tr>
    <td width="19%" valign="top"><img width="150" height="200" class="foto" src="<?php echo base_url()."/foto/".$row->foto; ?>" /></td>
    <td width="81%" valign="top"><table width="100%" border="0">
      <tr>
        <td width="29%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="70%"><a href="#" onclick="getdata('<?php echo $row->nik ?>')"><?php echo $row->nama; ?></a></td>
      </tr><tr>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $row->nik; ?></td>
      </tr>
       <tr>
        <td>Anak ke </td>
        <td>:</td>
        <td><?php echo $row->anakke; ?></td>
      </tr>
      
      <tr>
        <td>Tempat Lahir</td>
        <td>:</td>
        <td><?php echo $row->tmp_lahir; ?></td>
      </tr>
      <tr>
        <td>Tgl Lahir</td>
        <td>:</td>
        <td><?php echo $row->tgl_lahir; ?></td>
      </tr>
      <tr>
        <td>Umur</td>
        <td>:</td>
        <td><?php echo $row->umur; ?> thn</td>
      </tr>
      <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $row->agama; ?></td>
      </tr>
      <tr>
        <td>Status Kawin</td>
        <td>:</td>
        <td><?php echo $arr_status_kawin[$row->status_kawin]; ?></td>
      </tr>
      <tr>
        <td colspan="3"><a class="link"  href="#" onclick="getdata('<?php echo $row->nik ?>')">Lihat silsilah</a> 
        <a class="link"  href="<?php echo site_url("operator_penduduk/detail/$row->id_penduduk"); ?>" >Lihat Detail</a></td>
        </tr>
    </table></td>
  </tr>
  
  <?php endforeach; 
} ?>
</table>
</fieldset>

 