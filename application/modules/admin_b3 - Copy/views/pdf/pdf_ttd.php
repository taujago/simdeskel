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
<table width="100%">
  <tr>
    <td align="center">MENGETAHUI </td>
    <td align="center"><?php echo $desa2->desa.", ".date("d-m-Y") ?></td>
  </tr>
  <tr>
    <td align="center"> 
    <?php 
      if($desa2->bentuk_lembaga=="Kelurahan") {
        echo "LURAH ". $desa2->desa;
      }
      else {
        echo  "KEPALA DESA";
      }
    ?>
    

    </td>
    <td align="center"> SEKRETARIS </td>
  </tr>
  <tr>
    <td align="center">&nbsp; </td>
    <td align="center"></td>
  </tr>
  <tr>
    <td align="center"><br />
      <br />
      <br />
      <u><?php echo  $desa2->nama_kepala_desa ?></u><br />
       <?php if($desa2->bentuk_lembaga=="Kelurahan") {
         echo "NIP : ". $desa2->nip_kepala_desa;
      }
      
      ?>
      </td>
    <td align="center"><br />
      <br />
      <br />
      <u> <?php echo  $desa2->nama_sek_desa ?> </u><br /> 
      NIP : <?php echo  $desa2->nip_sek_desa ?>
      </td>
  </tr>
</table>
