<div id="detail" style="min-height: 500px;" >
	 <div id="detail-head">
	 	<?php echo $title; ?>
	 </div>
	 
 
	 	<form id="fm" method="post" enctype="multipart/form-data"  novalidate>
	 		<input type="hidden" name="id_desa_old" value="<?php echo $id_desa ?>" />
	 		<fieldset> <legend>Kabupaten / Kota</legend>
	 		<table width="765" class="referensi">
	 			
	 			<tr>
	 				<td width="255">Provinsi </td>
	 				<td width="498">  : <?php //echo  form_dropdown("",$this->cm->arr_tiger_provinsi(),'','id="id_provinsi" onchange="get_kota(this,\'#id_kota\',1)"')  ?> KEPULAUAN BANGKA BELITUNG</td>
	 			</tr>
	 			<tr>
	 				<td>Kabupaten / Kota  </td>
	 				<td>  : <?php //echo form_dropdown("",array(),'','id="id_kota" onchange="get_kecamatan(this,\'#id_kecamatan\',1)"') ?> BANGKA BARAT</td>
	 			</tr>
	 			 <tr>
	 				<td>Kecamatan </td>
	 				<td> :   <?php echo form_dropdown("",array(),'','id="id_kecamatan" onchange="get_desa2(this,\'#id_desa\',1)" ') ?> </td>
	 			</tr>

	 			 <tr>
	 				<td>Desa </td>
	 				<td> :   <?php  echo form_dropdown("id_desa",array(),'','id="id_desa"');   ?> </td>
	 			</tr>

	 			 <tr>
	 			   <td>Kode Desa (untuk Nomor Surat) </td>
	 			   <td>:                  
		             <input value="<?php echo (isset($kode_surat))?$kode_surat:"";  ?>"  type="text" name="kode_surat" id="kode_surat"  />
		      <tr><td>Bentuk Lembaga  </td>
 				  <td> : <!--DESA --><?php 
	 				 $arr_lembaga = array("Lembang"=>"Lembang",
	 				 					  "Desa" => "Desa",
	 				 					  "Kelurahan" => "Kelurahan");
	 				 $bentuk_lembaga = isset($bentuk_lembaga)?$bentuk_lembaga:"";
	 				 echo form_dropdown("bentuk_lembaga",$arr_lembaga,$bentuk_lembaga) ?>
	 			<tr>
	 				<td>Nama Kepala Desa / Lurah  </td>
	 				<td> : <input value="<?php echo (isset($nama_kepala_desa))?$nama_kepala_desa:"";  ?>"  type="text" name="nama_kepala_desa" id="nama_kepala_desa"  /> </td>
	 			</tr>

	 			<tr>
	 				<td>NIP Lurah   </td>
	 				<td> : <input value="<?php echo (isset($nip_kepala_desa))?$nip_kepala_desa:"";  ?>"  type="text" name="nip_kepala_desa" id="nip_kepala_desa"  /> </td>
	 			</tr>
	 			<tr>
	 				<td>Pangkat  Lurah   </td>
	 				<td> : <input value="<?php echo (isset($pangkat_kepala_desa))?$pangkat_kepala_desa:"";  ?>"  type="text" name="pangkat_kepala_desa" id="pangkat_kepala_desa"  /> </td>
	 			</tr>

				<tr>
	 				<td>Nama Sekreataris Desa </td>
	 				<td>  : <input  value="<?php echo (isset($nama_sek_desa))?$nama_sek_desa:"";  ?>" type="text" name="nama_sek_desa" id="nama_sek_desa" /> </td>
	 			</tr>

	 			<tr>
	 			  <td>NIP Sekretaris Desa / Kelurahan  </td>
	 			  <td>: 
 			      <input  value="<?php echo (isset($nip_sek_desa))?$nip_sek_desa:"";  ?>" type="text" name="nip_sek_desa" id="nip_sek_desa" /></td>
 			  </tr>

 			  <tr>
	 			  <td>Pangkat Sekretaris Desa / Kelurahan  </td>
	 			  <td>: 
 			      <input  value="<?php echo (isset($pangkat_sek_desa))?$pangkat_sek_desa:"";  ?>" type="text" name="pangkat_sek_desa" id="pangkat_sek_desa" /></td>
 			  </tr>

	 			<tr>
	 				<td>Nama Camat </td>
	 				<td>  : <input value="<?php echo (isset($nama_camat))?$nama_camat:"";  ?>" type="text" name="nama_camat" id="nama_nama_camat" /> </td>	 				
	 			</tr>
	 			<tr>
	 				<td>NIP Camat </td>
	 				<td>  : <input value="<?php echo (isset($nip_camat))?$nip_camat:"";  ?>" type="text" name="nip_camat" id="nip_camat" /> </td>	 				
	 			</tr>

	 			<tr>
	 				<td>Pangkat Camat </td>
	 				<td>  : <input value="<?php echo (isset($pangkat_camat))?$pangkat_camat:"";  ?>" type="text" name="pangkat_camat" id="pangkat_camat" /> </td>	 				
	 			</tr>
	 			<tr>
	 				<td>Alamat Kantor Desa</td>
	 				<td>  : <input value="<?php echo (isset($alamat))?$alamat:"";  ?>" size="40" type="text" name="alamat" id="alamat" /> </td>	 				
	 			</tr>
	 			<tr>
	 				<td>No. Telpon </td>
	 				<td>  : <input value="<?php echo (isset($telpon))?$telpon:"";  ?>" type="text" name="telpon" id="telpon" /> </td>	 				
	 			</tr>
	 			<tr>
	 				<td>Kode Pos </td>
	 				<td> :  <input  value="<?php echo (isset($kodepos))?$kodepos:"";  ?>" type="text" name="kodepos" id="kodepos" /> </td>	 				
	 			</tr>
	 			<!--<tr>
	 				<td>Logo Kabupaten / Kota</td>
	 				<td> :  <input  type="file" name="logo" id="logo" /> </td>	 				
	 				
	 			</tr>-->

	 			<tr>
	 			  <td>Format Kop Surat</td>
	 			  <td>: <?php 
				  $arr_kop = array(1=>"Menggunakan 'KANTOR'. Contoh : Kantor Desa Bangun Karya",
								   0=>"Tanpa 'KANTOR'. Contoh : Desa Bangun Karya");
				  echo form_dropdown("kop_surat",$arr_kop,$kop_surat,'id="kop_surat"');
				  ?></td>
 			  </tr>
	 			<tr><td></td><td>

	 			<a href="#" class="easyui-linkbutton" iconCls="icon-save"   onclick="simpan()" >Simpan</a>
	 			</td></tr> 
	 		</table>
 		  </fieldset>
	 	  
		 
		</form>
	 
	 		
	 	</div>
 
</div>

<style type="text/css">
.referensi {
	border-collapse: collapse;

}
.referensi td {
	border-bottom: solid 1px #ccc;
}
</style>
 
 <script type="text/javascript">
 
 $(document).ready(function(){

 	$("#id_provinsi").val('<?php echo $id_provinsi ?>').attr('selected','selected');

 	$.ajax({
		url :'<?php echo site_url("lokasi/get_tiger_kota/$id_provinsi/$id_kota") ?>',
		success : function(result){
		$("#id_kota").html('').append(result);
	}
	});

	$.ajax({
		url :'<?php echo site_url("lokasi/get_tiger_kecamatan/$id_kota/$id_kecamatan") ?>',
		success : function(result){
		$("#id_kecamatan").html('').append(result);
		}
	});

	$.ajax({
		url :'<?php echo site_url("lokasi/get_desa_register/$id_kecamatan/$id_desa") ?>',
		success : function(result){
			$("#id_desa").html('').append(result);
		}
	});

 });

function simpan(){
			$('#fm').form('submit',{
				url: '<?php echo site_url("operator_setting/save_desa") ?>',
				onSubmit: function(){
					return $(this).form('validate');
				},
				dataType:'json',
				success: function(result){
					 console.log(result);
					 obj = $.parseJSON(result);
 					if (obj.success == false ){
						$.messager.alert('Error',obj.pesan,'error');
					} else {
						$.messager.alert('Informasi',obj.pesan,'info');
						 
					}
				}
			});
		}

 </script>

 <?php 
$this->load->view("js/global_js");
 ?>