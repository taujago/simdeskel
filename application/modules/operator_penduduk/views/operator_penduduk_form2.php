
<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.form.js" ?>">
</script>
<script type="text/javascript">
 
$(document).ready(function(){

//$('#fm').form('clear');


$("#fm").submit(function(){
	$(this).ajaxSubmit({
		url : '<?php echo site_url("$controller/$method") ?>',
		dataType : 'json',
		success: function(obj){
					 console.log(obj);
					 //obj = $.parseJSON(result);
					// return false;
					if (obj.success == false ){
						$.messager.alert('Error',obj.pesan,'error');
					 
					} else {
						$.messager.alert('Informasi',obj.pesan,'info');
						// $('#dlg').dialog('close');		// close the dialog
						// $('#tt').datagrid('reload');	// reload the user data
						if(obj.operation == "insert") {
						$('#fm').form('clear'); 
						}
						else {
							///location.href=('<?php echo site_url("operator_penduduk") ?>');
						}
					}
				}
	});
	return false;
});
 
$(".dn, .ln").hide();

$("#jenis_kedatangan").change(function(){
	
	if($(this).val() == "dn") {
		$(".dn").show();
		$(".ln").hide();
	}
	else {
		$(".dn").hide();
		$(".ln").show();
	}
	
});
 

$('#id_suku,#id_keturunan').combogrid({
				panelWidth:800,
				url: '<?php echo site_url('general/suku_dropdown') ?>',
				idField:'id_suku',
				textField:'suku',
				mode:'remote',
				fitColumns:true,
				columns:[[
					//{field:'id_member',title:'ID',width:60},
					{field:'suku',title:'Suku',width:400}
					 
					 
				]]
				
});

$("#sementara").hide();
$("#pendatang").hide();
$("#pindah").hide();
$("#status_kependudukan").change(function(){
	console.log($(this).val());
	jenis = $(this).val();

	if(jenis=="2") {  // pendatang 
		$("#pendatang").show('fast');
		$("#sementara").hide('fast');
		$("#pindah").hide('fast');
	}
	if(jenis=="1") {  // sementara
		$("#pendatang").hide('fast');
		$("#sementara").show('fast');
		$("#pindah").hide('fast');
	}
	if(jenis=="3"){ // pindah
		$("#pindah").show('fast');
		$("#pendatang").hide('fast');
		$("#sementara").hide('fast');
	}
	if(jenis=="0"){ //. tetap
		$("#pindah").hide('fast');
		$("#pendatang").hide('fast');
		$("#sementara").hide('fast');
	}
});


	$('#tgl_lahir, #regdate').datebox({  
        required:true  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    }); 

$('#tgl_paspor_akhir').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    });

$('#tgl_akta_nikah').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    });


$('#tgl_akta_cerai').datebox({  
        required:false  ,
        formatter : function(date) {
        	var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			return d+'-'+m+'-'+y;
        }
    });

});



function simpan(){
			$('#fm').form('submit',{
				url: '<?php echo site_url("$controller/$method") ?>',
				dataType:'json',
				success: function(result){
					 console.log(result);
					 obj = $.parseJSON(result);
					// return false;
					if (obj.success == false ){
						$.messager.alert('Error',obj.pesan,'error');
						return false;
					} else {
						$.messager.alert('Informasi',obj.pesan,'info');
						// $('#dlg').dialog('close');		// close the dialog
						// $('#tt').datagrid('reload');	// reload the user data
						return false;
					}
				}
			});
			$('#fm').form('clear');
			return false;
		}


</script>

<div id="detail" style="min-height: 500px;" >
	 <div id="detail-head">
	 	<?php 
		
		 
	 	$desa2 = $this->cm->data_desa();
	 	echo $title; ?>
	 </div>

<!-- <div id="dlg" class="easyui-dialog" style="width:950px;height:800px;padding:10px 10px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">Penduduk</div> -->
<br />
		<div>
			<a href="#" class="easyui-linkbutton" iconCls="icon-back" onclick="javascript:location.href=('<?php echo site_url("operator_penduduk") ?>')">Kembali</a> 
		
		<form id="fm" method="post" novalidate enctype="multipart/form-data">
			<input type="hidden" name="id_penduduk" id="id_penduduk" value="<?php echo $penduduk['id_penduduk']; ?>" />
		 	<fieldset>
	<legend>Biodata</legend>

		<table border="0" width="100%" > 
		<tr>
		  <td>Tanggal Pendaftaran </td>
		  <td>: 
		    <input type="text" name="regdate" id="regdate" class="text ui-widget-content ui-corner-all" value="<?php echo $penduduk['regdate']; ?>"  /></td>
		  </tr>
		<tr><td width="200">NIK   </td>
		<td>: <input type="text" value="<?php echo $penduduk['nik']; ?>" name="nik" id="nik" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td >Nama   </td>
		<td>: <input  value="<?php echo $penduduk['nama']; ?>" size="40" type="text" name="nama" id="nama" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr>
		  <td >No. KK</td>
		  <td>: 
	      <input  value="<?php echo $penduduk['no_kk']; ?>" name="no_kk" type="text" class="text ui-widget-content ui-corner-all" id="no_kk" size="50"  /></td>
		  </tr>
		<tr>
		  <td >Kepala Keluarga</td>
		  <td>: <?php 
		  	$arr_kk = array(0=>"Tidak","Ya");
			echo form_dropdown("kepala_keluarga",$arr_kk,$penduduk['kepala_keluarga'],'id="kepala_keluarga"');
		  ?></td>
		  </tr>
        <tr>
		  <td >Hubungan dalam Keluarga </td>
		  <td>: 
	      <input size="40" type="text" name="hubungan_dlm_keluarga" id="hubungan_dlm_keluarga" class="text ui-widget-content ui-corner-all"   value="<?php echo $penduduk['hubungan_dlm_keluarga']; ?>" /></td>
		  </tr>
		<!--<tr>
		  <td >Penduduk Miskin </td>
		  <td>: <?php echo form_dropdown("miskin",array(0=>"Tidak","Ya"),$penduduk['miskin'],''); ?></td>
		  </tr>-->
		<tr><td>Tempat Lahir   </td>
		<td>: <input type="text"  value="<?php echo $penduduk['tmp_lahir']; ?>" name="tmp_lahir" id="tmp_lahir" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td>Tanggal Lahir   </td>
		<td>: <input type="text"  value="<?php echo $penduduk['tgl_lahir']; ?>" name="tgl_lahir" id="tgl_lahir" class="text ui-widget-content ui-corner-all"  /></td></tr>
		<tr><td>Jenis Kelamin   </td>
		<td>: <?php 
			$jk = isset($penduduk['jk'])?$penduduk['jk']:"";
		echo form_dropdown("jk",$arr_jk,$jk,'id="jk"');?></td></tr>
		
		<tr><td>Golongan Darah   </td>
		<td>: <?php echo form_dropdown("golongan_darah",

			$this->cm->add_arr_head(
				$this->cm->arr_tabel("master_gol_darah", "gol", "gol", "gol"), 'x',"Pilih Golongan Darah" )
,$penduduk['golongan_darah'],'id="golongan_darah"');?></td></tr>
		<tr><td >Kewarganegaraan   </td>
		<td>: <?php echo form_dropdown("warga_negara",$arr_warga_negara,$penduduk['warga_negara'],'id="warga_negara"');?></td></tr>
		<tr><td>Agama   </td>
		<td>: <?php echo form_dropdown("id_agama",$arr_agama,$penduduk['id_agama'],'id="id_agama"');?></td></tr>
		<tr><td >Pekerjaan   </td>
		<td>:  <?php echo form_dropdown("id_pekerjaan",$arr_pekerjaan,$penduduk['id_pekerjaan'],'id="id_pekerjaan"');?>		 </td></tr>
		<tr><td >Status perkawinan   </td>
		<td>: <?php echo form_dropdown("status_kawin",$arr_status_kawin,$penduduk['status_kawin'],'id="status_kawin"');?></td></tr>
		<!-- <tr><td>Cacat fisik   </td>
		<td>: <input type="text" name="cacat_fisik" id="cacat_fisik" class="text ui-widget-content ui-corner-all"  /></td></tr>
		-->
		<tr><td >Pendidikan   </td>
		<td>: <?php echo form_dropdown("id_pendidikan",$arr_pendidikan,$penduduk['id_pendidikan'],'id="id_pendidikan"');?></td></tr>
		
		<tr><td >Kemampuan Baca Tulis   </td>
		<td>: <?php echo form_dropdown("baca_tulis",$this->cm->arr_baca_tulis,$penduduk['baca_tulis'],'id="baca_tulis"');?></td></tr>
		


		
		<tr><td > Hidup / Mati   </td>
		<td>: <?php //echo form_dropdown("hidup_mati",$this->cm->arr_status_hidup,'','id="hidup_mati"');
		echo form_dropdown("hidup_mati",$this->cm->arr_status_hidup,$penduduk['hidup_mati'],'id="hidup_mati"');
		?></td></tr>
		
		<tr><td >Foto   </td>
		<td>: <input type="file" name="foto" id="foto" > </td></tr>
		
		<tr><td >Status Kependudukan   </td>
		<td>: <?php
		$arr_status_penduduk = $this->cm->arr_status_kependudukan; 
		unset($arr_status_penduduk[3]);
		echo form_dropdown("status_kependudukan",$arr_status_penduduk,$penduduk['status_kependudukan'],'id="status_kependudukan"');?></td></tr>
		</table>
		</fieldset>

<!-- pendatang section    -->

<fieldset id="sementara">
	<legend>Diisi untuk penduduk sementara</legend>
	<table border="0" width="100%" > 
		<tr>
			<td width="200px">Maksud </td>
			<td><input type="text" name="sementara_maksud" id="sementara_maksud"></td>
		</tr>
		<tr>
			<td>Nama penduduk yang dituju </td>
			<td><input type="text" name="sementara_id_tujuan" id="sementara_id_tujuan">
		<a  class="easyui-linkbutton" iconCls="icon-search"  href="javascript:show_dialog('sementara_id_tujuan');">		

			</td>
		</tr>
	</table>
</fieldset>
 

<fieldset id="pendatang">		
		<legend>Alamat Sebelumnya. Diisi untuk penduduk pendatang  </legend>
		<table border="0" width="100%" > 
		<tr>
		  <td width="227">Jenis Kedatangan</td>
		  <td width="717">: <?php 
		  echo form_dropdown("jenis_kedatangan",array("x"=>"-- Pilih Jenis Kedatangan --", "dn"=>"Dalam Negeri","ln"=>"Luar Negeri"),'','id="jenis_kedatangan"' )?></td>
		  </tr>
		<tr class="ln">
		  <td>Asal Negara</td>
		  <td>: 
		    <input name="asal_negara" type="text" id="asal_negara" size="50" /></td>
		  </tr>
		<tr class="dn"><td width="201">Alamat   </td>
		<td>:  <textarea name="alamat_sebelumnya" id="alamat_sebelumnya" class="text ui-widget-content ui-corner-all" ></textarea> </td></tr>
		
		<tr class="dn"><td >Provinsi  </td>
		<td>: <?php echo form_dropdown("id_provinsi_sebelumnya",$arr_provinsi,'','id="id_provinsi" onchange="get_kota(this,\'#id_kota_sebelumnya\',1)"') ?></td></tr>
		<tr class="dn"><td >Kabupaten  </td>
		<td>: 
			  <?php echo form_dropdown("id_kota_sebelumnya",array(),'','id="id_kota_sebelumnya" onchange="get_kecamatan(this,\'#id_kecamatan_sebelumnya\',1)"') ?>
         <span id="btn_add_kabupaten">     
         <a href="javascript:showhide('add_kabupaten','btn_add_kabupaten');" title="Tambahkan baru">
         <img src="<?php echo base_url() ?>/assets/images/add.png" width="16" height="16" /></a> 
         </span>
		<span id="add_kabupaten" style="display:none"> 
        <input id="add_kabupaten_nama" placeholder="Nama Kabupaten Baru" /> 
        <a href="javascript:simpan_kabupaten();" class="simpan">Simpan</a> 
        <a href="javascript:showhide('btn_add_kabupaten','add_kabupaten');" class="batal">Batal</a> 
        </span>
        </td></tr>
		
		
		<tr class="dn"><td >Kecamatan  </td>
		<td>: <?php
						    echo form_dropdown('id_kecamatan_sebelumnya',array(),'',
						    'id="id_kecamatan_sebelumnya" onchange="get_desa(this,\'#id_desa_sebelumnya\',1)" ');
						?>
		 
         <span id="btn_add_kecamatan">     
         <a href="javascript:showhide('add_kecamatan','btn_add_kecamatan');" title="Tambahkan baru">
         <img src="<?php echo base_url() ?>/assets/images/add.png" width="16" height="16" /></a> 
         </span>
		<span id="add_kecamatan" style="display:none"> <input id="add_kecamatan_nama" placeholder="Nama Kecamatan Baru" /> 
        <a href="javascript:simpan_kecamatan();" class="simpan">Simpan</a> 
        <a href="javascript:showhide('btn_add_kecamatan','add_kecamatan');" class="batal">Batal</a> </span>
         
         
         
          </td></tr>
		
		<tr class="dn"><td>Desa  </td>
		<td>: <?php
						    	 echo form_dropdown('id_desa_sebelumnya',array('x'=>" - Semua Desa - "),'', 'id="id_desa_sebelumnya"');
						?>
		 <span id="btn_add_desa">     
         <a href="javascript:showhide('add_desa','btn_add_desa');" title="Tambahkan baru">
         <img src="<?php echo base_url() ?>/assets/images/add.png" width="16" height="16" /></a> 
         </span>
		<span id="add_desa" style="display:none"> <input id="add_desa_nama" placeholder="Nama Desa Baru" /> 
        <a href="javascript:simpan_desa();" class="simpan">Simpan</a> 
        <a href="javascript:showhide('btn_add_desa','add_desa');" class="batal">Batal</a> </span>
          
          </td></tr>		
		 
		
		</td></tr>
		
		<tr class="dn"><td>RT/RW   </td>
		<td>: <input size="5" type="text" name="rt_sebelumnya" id="rt_sebelumnya" class="text ui-widget-content ui-corner-all"  />
		<input size="5" type="text" name="rw_sebelumnya" id="rw_sebelumnya" class="text ui-widget-content ui-corner-all"  /></td></tr>
		</table>
		
		</fieldset>




		<fieldset>
		<legend>Alamat </legend>
		<table border="0" width="100%" > 
		<tr><td width="200px">Alamat   </td>
		<td valign="top">:  <textarea name="alamat" id="alamat" 
        class="text ui-widget-content ui-corner-all" ><?php echo  $penduduk['alamat'] ?></textarea> </td></tr>
 	   	<tr><td> Dusun </td><td>: 
 	   	
 	   	    <input value="<?php echo  $penduduk['dusun'] ?>" type="text" name="dusun" id="dusun" class="text ui-widget-content ui-corner-all"  /></td>
 	   	</tr>
		<tr><td>RT/RW   </td>
		<td>: <input size="5" value="<?php echo  $penduduk['rt'] ?>" type="text" name="rt" id="rt" class="text ui-widget-content ui-corner-all"  />
		<input size="5"  value="<?php echo  $penduduk['rw'] ?>"  type="text" name="rw" id="rw" class="text ui-widget-content ui-corner-all"  /></td></tr>
		</table>
		
		</fieldset>


<!-- SUKU DAN KETURUNAN  -->
		<fieldset>
			<legend>Suku dan keturunan </legend>
			<table border="0" width="100%">
				<tr>
					<td width="200px">Suku </td>
					<td>: <input style="width:100px" type="text"  value="<?php echo  $penduduk['suku'] ?>"  name="suku" id="suku" /> </td>
				</tr>
				<tr>
					<td width="200px">Keturunan </td>
					<td>: <input value="<?php echo  $penduduk['keturunan'] ?>"  type="text" name="keturunan" id="keturunan" /> </td>
				</tr>
				<tr>
					<td width="200px">Kebangsaan </td>
					<td>: <input  value="<?php echo  $penduduk['kebangsaan'] ?>"   type="text" name="kebangsaan" id="kebangsaan" /> </td>
				</tr>
			</table>
		</fieldset>
<!-- end of keturunan --> 

	<!--	<fieldset><legend>Data Kartu Keluarga</legend>
	 
		<table border="0" width="100%" > 
		<tr><td   width="200px">Nomor Kartu Keluarga  </td>
				<td>: <input type="text" name="no_kk" id="no_kk" class="text ui-widget-content ui-corner-all"  />
				</td></tr>
		 
		<tr><td   width="200px">Hubungan Keluarga</td>
				<td>: 
				<?php 
				echo form_dropdown('sebagai',$this->cm->arr_sebagai,'','id="sebagai"');
				?>

				</td></tr>
				
		<tr><td   width="200px">Kepala Keluarga </td>
				<td>: 
					<input type="checkbox" value="1" name="is_kk" id="is_kk" />
				</td></tr>
		</table>
		</fieldset> --> 


		<fieldset><legend>Biodata Orangtua</legend>
		<hr />
		<table border="0" width="100%" > 
		<tr><td   width="200px">NIK Ayah  </td>
				<td>: <input  value="<?php echo  $penduduk['nik_ayah'] ?>"   type="text" name="nik_ayah" id="nik_ayah" class="text ui-widget-content ui-corner-all"  />
				</td></tr>
		<tr><td   width="200px">Nama Ayah  </td>
				<td>: <input value="<?php echo  $penduduk['nama_ayah'] ?>"   type="text" name="nama_ayah" id="nama_ayah" class="text ui-widget-content ui-corner-all"  />
				</td></tr>
				
		<tr><td   width="200px">NIK Ibu</td>
				<td>: <input value="<?php echo  $penduduk['nik_ibu'] ?>"   type="text" name="nik_ibu" id="nik_ibu" class="text ui-widget-content ui-corner-all"  />
				</td></tr>
				
		<tr><td   width="200px">Nama Ibu</td>
				<td>: <input value="<?php echo  $penduduk['nama_ibu'] ?>"   type="text" name="nama_ibu" id="nama_ibu" class="text ui-widget-content ui-corner-all"  />
				</td></tr>
		</table>
		</fieldset>
		
		

 
 
 
	 <hr />
	 <input class="tombolsimpan" type="submit" name="simpan" value="Simpan" /> 
	 <!--<input class="tombolbatal" type="button" name="simpan" value="Batal" />--> 
	 
	  <hr /> <br /> <br /> <br /> <br />
</form>
</div>

<?php 

//$this->load->view($controller."_js");
$this->load->view("js/global_js");

?>


<script type="text/javascript">
$.ajax({
	 	url : '<?php echo site_url("$controller/detail_json/$id_penduduk") ?>/',
	 	dataType : 'json',
	 	success : function(v_row) {
	 		console.log(v_row);
	 		 
			if(v_row.status_kependudukan == "1") {
				$("#sementara").show();
				$("#sementara_maksud").val(v_row.sementara_maksud);
				$("#sementara_id_tujuan").val(v_row.sementara_nik);
			}
	 		 
		}
});

	 		//console.log(row);
	 		//// begin of add
	 		//$("#hidup_mati").val(row.hidup_mati).attr('selected','selected');
			/*if(row.status_kependudukan == "2") {
					$("#pendatang").show();
					$("#sementara").hide();
					
					if(row.jenis_kedatangan =="ln"){
						$(".ln").show();
						$(".dn").hide();
					}
					else {
						$(".ln").hide();
						$(".dn").show();
					}
					
				}
				
				if(row.status_kependudukan == "0") {
					$("#pendatang").hide();
					$("#sementara").hide();
				}
				if(row.status_kependudukan == "1") {
					$("#pendatang").hide();
					$("#sementara").show();
				}*/


/*
						$.ajax({
							url :'<?php echo site_url("lokasi/get_tiger_kota") ?>/'+row.id_provinsi_sebelumnya+'/'+row.id_kota_sebelumnya,
							success : function(result){
								$("#id_kota_sebelumnya").html('').append(result);
							}
						});

						$.ajax({
							url :'<?php echo site_url("lokasi/get_tiger_kecamatan") ?>/'+row.id_kota_sebelumnya+'/'+row.id_kecamatan_sebelumnya,
							success : function(result){
								$("#id_kecamatan_sebelumnya").html('').append(result);
							}
						});

						$.ajax({
							url :'<?php echo site_url("lokasi/get_tiger_desa") ?>/'+row.id_kecamatan_sebelumnya+'/'+row.id_desa_sebelumnya,
							success : function(result){
								$("#id_desa_sebelumnya").html('').append(result);
							}
						}); 
*/

	 		//// end of add 
			
/* 
	 	}
	 });
*/
 

</script>

<?php 
$this->load->view("search_penduduk_view");
$this->load->view("search_penduduk_js");
?>