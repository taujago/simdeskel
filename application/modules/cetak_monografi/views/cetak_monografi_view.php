<div id="detail" style="min-height: 400px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 <div style="padding : 100px">
	  
	 	<center>
	 	 	
	 	 	<form target="blank"  action="<?php echo site_url("$this->controller/cetak") ?>" method="post" > Tahun 
	 	 	<input type="text" name="tahun" value="<?php echo date("Y") ?>" / >
	 	 	<input type="submit" value="Cetak" />
	 	 	</form>

	 	 </center>
	  
	 <div>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
</div>
<form id="monografi" name="monografi" action="<?php echo site_url("cetak_monografi/save"); ?>" method="post" > 
	 <table width="100%" border="0" cellpadding="0" class="referensi">
       <tr>
         <td width="33%">Luas Desa</td>
         <td width="1%">: </td>
         <td width="66%"><input type="text" name="luas" id="luas" value="<?php echo $luas; ?>" /></td>
       </tr>
       <tr>
         <td colspan="3"><strong>Kondisi geografis</strong></td>
       </tr>
       <tr>
         <td>Ketinggian DPL </td>
         <td>:</td>
         <td><input type="text" name="ketinggian" id="ketinggian" value="<?php echo $ketinggian; ?>" /></td>
       </tr>
       <tr>
         <td>Banyaknya Curah Hujan</td>
         <td>:</td>
         <td><input type="text" name="curah_hujan" id="curah_hujan" value="<?php echo $curah_hujan; ?>"  /></td>
       </tr>
       <tr>
         <td>Suhu Udara rata - rata </td>
         <td>: </td>
         <td><input type="text" name="suhu_udara" id="suhu_udara" value="<?php echo $suhu_udara; ?>"  /></td>
       </tr>
       <tr>
         <td>Bentangan Wilayah </td>
         <td>:</td>
         <td><input type="text" name="bentang_wilayah" id="bentang_wilayah"  value="<?php echo $bentang_wilayah; ?>"  /></td>
       </tr>
       <tr>
         <td>Jumlah Bulan Hujan </td>
         <td>: </td>
         <td><input type="text" name="bulan_hujan" id="bulan_hujan" value="<?php echo $bulan_hujan; ?>"  /></td>
       </tr>
       <tr>
         <td colspan="3"><strong>Orbitansi</strong> </td>
       </tr>
       <tr>
         <td>Jarak ke Ibu Kota Kecamatan </td>
         <td>: </td>
         <td><input type="text" name="jarak_kec" id="jarak_kec" value="<?php echo $jarak_kec; ?>"  /></td>
       </tr>
       <tr>
         <td>Jarak ke Ibu Kota Kabuapten </td>
         <td>:</td>
         <td><input type="text" name="jarak_kab" id="jarak_kab"  value="<?php echo $jarak_kab; ?>" /></td>
       </tr>
       <tr>
         <td>Jarak ke Ibu Kota Provinsi</td>
         <td>: </td>
         <td><input type="text" name="jarak_kab" id="jarak_kab"  value="<?php echo $jarak_kab; ?>" /></td>
       </tr>
       <tr>
         <td>Tipologi Desa </td>
         <td>:</td>
         <td><!--<input type="text" name="tipologi_desa" id="tipologi_desa"  value="<?php echo $tipologi_desa; ?>" />-->
         <?php 
		 	$arr = array('a'=>"Desa Kepulauan",
						 'b'=>"Pantai / Pesisir",
						 'c'=>"Desa Terisolir",
						 'd'=>"Desa Sekitar Hutan",
						 'e'=>"Desa Perbatas dengan kabupaten Lain ");
			 echo form_dropdown("tipologi_desa",$arr,$tipologi_desa,'');
		 ?>         </td>
       </tr>
       <tr>
         <td colspan="3"><strong>Pemerintahan Desa</strong></td>
       </tr>
       <tr>
         <td>Kantor Desa Dibangun Tahun </td>
         <td>:</td>
         <td><input type="text" name="kantor_desa_dibangun" id="kantor_desa_dibangun"  value="<?php echo $kantor_desa_dibangun; ?>"  /></td>
       </tr>
       <tr>
         <td>Permanen / Semi Permanen</td>
         <td>:</td>
         <td><input type="text" name="jenis_bangunan" id="jenis_bangunan" value="<?php echo $jenis_bangunan; ?>"  /></td>
       </tr>
       <tr>
         <td>Status Desa </td>
         <td>:</td>
         <td><input type="text" name="status_desa" id="status_desa" value="<?php echo $status_desa; ?>"  /></td>
       </tr>
       <tr>
         <td>Jumlah Dusun </td>
         <td>:</td>
         <td><input type="text" name="jumlah_dusun" id="jumlah_dusun" value="<?php echo $jumlah_dusun; ?>"  /></td>
       </tr>
       <tr>
         <td>Jumlah RT </td>
         <td>:</td>
         <td><input type="text" name="jumlah_rt" id="jumlah_rt" value="<?php echo $jumlah_rt; ?>"  /></td>
       </tr>
       <tr>
         <td>Jumlah RW </td>
         <td>:</td>
         <td><input type="text" name="jumlah_rw" id="jumlah_rw" value="<?php echo $jumlah_rw; ?>"  /></td>
       </tr>
       <tr>
         <td>Jumlah Kepala Urusan </td>
         <td>: </td>
         <td><input type="text" name="jumlah_kaur" id="jumlah_kaur" value="<?php echo $jumlah_kaur; ?>"  /></td>
       </tr>
       <tr>
         <td>Jumlah Kepada Dusun </td>
         <td>: </td>
         <td><input type="text" name="jumlah_kadus" id="jumlah_kadus" value="<?php echo $jumlah_kadus; ?>"  /></td>
       </tr>
       <tr>
         <td>Jumlah Staff</td>
         <td>:</td>
         <td><input type="text" name="jumlah_staff" id="jumlah_staff"  value="<?php echo $jumlah_staff; ?>"   /></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td><a href="#" class="easyui-linkbutton" iconCls="icon-save"   onclick="simpan()" >Simpan</a></td>
       </tr>
     </table>
</form>

<script type="text/javascript">
 

 function simpan(){
  // alert('bahlul');
    $.ajax({
      url : '<?php echo  site_url("cetak_monografi/save") ?>',
      dataType : 'json',
      type : 'post',
      data : $("#monografi").serialize(), 
      success : function(obj) {
          // alert('hafdfdj');
           if (obj.success == false ){
                $.messager.alert('Error',obj.pesan,'error');
              } else {
                $.messager.alert('Informasi',obj.pesan,'info');
                 
              }
      } 


    });
 }

  // function simpan(){
  //   $.ajax(function(){
  //     url : '<?php echo  site_url("cetak_monografi/save") ?>',
  //     data : $("#monografi").serialize() , 
  //     dataType : 'json',
  //     success: function(result){
  //          console.log(result);
  //          obj = $.parseJSON(result);
  //             if (obj.success == false ){
  //               $.messager.alert('Error',obj.pesan,'error');
  //             } else {
  //               $.messager.alert('Informasi',obj.pesan,'info');
                 
  //             }
  //       }
  //   });
 

</script>