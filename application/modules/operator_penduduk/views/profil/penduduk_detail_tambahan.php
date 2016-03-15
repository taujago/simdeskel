<style>
.wi{width:200px}
</style>
<form id="data_tambahan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value="<?php echo $arr_detail['id_penduduk']; ?>" />
<?php 
$data['label'] = "Pekerjaan Tambahan ";
$data['id'] = "table_tambahan";
$data['table'] = "pekerjaan";
$data['id_t'] = "id_pekerjaan";
$data['data_t'] = "pekerjaan";
$data['ck_name'] = "id_pekerjaan";
$data['arr_danau'] = $this->dm->get_arr("penduduk_pekerjaan","id_pekerjaan",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<fieldset>
<br />
        <legend><strong>Akte Kelahiran </strong></legend>
        <table>
	 	<tr>
	 		<td class="wi">No</td><td> : <input name="no_akte" id="no_akte" value="<?php echo isset($arr_detail['no_akte'])?$arr_detail['no_akte']:""; ?>" required="required"/></td>
	 	</tr>
        <tr>
	 		<td>Tanggal</td><td> : <input name="tanggal_akte" id="tanggal_akte" type="text" class="easyui-datebox" value="<?php echo isset($arr_detail['tanggal_akte'])?flipdate($arr_detail['tanggal_akte']):""; ?>"></input>   </td>
	 	</tr>
        </table>
        <br />
</fieldset>
<br />
<fieldset>
<br />
	<legend><strong>Akseptor KB </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Akseptor KB</td><td> :  <?php 
			$data = $this->cm->arr_tabel("master_akseptor_kb","id_akseptor_kb","akseptor_kb","akseptor_kb");
			$data = $this->cm->add_arr_head($data,"","Belum ada data");
			echo form_dropdown("id_akseptor_kb",  $data, !empty($arr_detail['id_akseptor_kb'])?$arr_detail['id_akseptor_kb']:"",'id="id_akseptor_kb"'); ?> </td>
	 	</tr>
	 	</table>
        <br />
</fieldset>
<br />
<fieldset><br />
	<legend><strong>Cacat Menurut Jenis </strong></legend>
     <a href="javascript:void(0)" class="easyui-linkbutton perumahan" onclick="jQuery('#table_perumahan').toggle('slow');jQuery('a.perumahan').toggle();">Sembunyikan</a> 
<a href="javascript:void(0)" style="display:none" class="easyui-linkbutton perumahan" onclick="jQuery('#table_perumahan').toggle('slow');jQuery('a.perumahan').toggle();">Tampilkan</a> 
	 	<table id="table_perumahan">
        <input type="hidden" name="tab_name[]" value="penduduk_cacat" />
	 	<tr>
                <td>
						<?php
						$arr_danau = $this->dm->get_arr("penduduk_cacat","id_cacat",$arr_detail["id_penduduk"]);
						//$arr_cat = $this->dm->arr_master_perumahan();
                        $c = 0;
                        $arr = $this->cm->arr_tabel("master_cacat","id_cacat","cacat","cacat");
						$cc = 0;
						while($cc < 3){
						echo '<table style="float:left"><tr><td>';
							if($cc == 1) echo "<strong>Cacat Fisik </strong><br/>";
							if($cc == 2) echo "<strong>Cacat Mental </strong><br/>";
							foreach($arr as $key=>$value)
							{
								$temp = $this->dm->cat_cacat($key);
								if($temp == $cc){
									if(in_array($key,$arr_danau)){$check = true;}
									else{ $check = false; }
									echo form_checkbox("id_cacat[]",$key, $check);
									echo " : ";
									echo $value;
									echo "<br>";
								}
							}
							echo "</td></tr></table>";
							$cc++;
						}
                        ?> 
        			</td></tr>
            		</table>
           		</td>
	 	</tr>
        </table>
        <br />
</fieldset>
<br />
<fieldset>
<br />
	<legend><strong>Status Kepemilikan Rumah </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Status Kepemilikan Rumah</td><td> :  <?php 
			$data = $this->cm->arr_tabel("master_status_kepemilikan_rumah","id_status_kepemilikan_rumah","status_kepemilikan_rumah","status_kepemilikan_rumah");
			$data = $this->cm->add_arr_head($data,"","Belum ada data");
			echo form_dropdown("id_status_kepemilikan_rumah",  $data,
			!empty($arr_detail['id_status_kepemilikan_rumah'])?$arr_detail['id_status_kepemilikan_rumah']:"",'id="status_kepemilikan_rumah"'); ?> </td>
	 	</tr>
	 	</table>
        <br />
</fieldset>
<br />
<fieldset>
<br />
	<legend><strong>Jumlah Penghasilan Perbulan </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Penghasilan Perbulan</td><td> :  <?php 
			$data = $this->cm->arr_tabel("master_penghasilan","id_penghasilan","penghasilan","penghasilan");
			$data = $this->cm->add_arr_head($data,"","Belum ada data");
			echo form_dropdown("id_penghasilan", $data,
			!empty($arr_detail['id_penghasilan'])?$arr_detail['id_penghasilan']:"",'id="id_penghasilan"'); ?> </td>
	 	</tr>
	 	</table>
        <br />
</fieldset>
<br />
<fieldset>
<br />
	<legend><strong>Jumlah Pengeluaran Perbulan </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Penghasilan Perbulan</td><td> :  <?php 
			$data = $this->cm->arr_tabel("master_pengeluaran","id_pengeluaran","pengeluaran","pengeluaran");
			$data = $this->cm->add_arr_head($data,"","Belum ada data");
			echo form_dropdown("id_pengeluaran", $data,
			!empty($arr_detail['id_pengeluaran'])?$arr_detail['id_pengeluaran']:"",'id="id_pengeluaran"'); ?> </td>
	 	</tr>
	 	</table>
        <br />
</fieldset>
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('data_tambahan')">Simpan</a>
<script type="text/javascript">
$.fn.datebox.defaults.formatter = function(date){
	var y = date.getFullYear();
	var m = date.getMonth()+1;
	var d = date.getDate();
	return d+'-'+m+'-'+y;
}
function submit(data){
			$('#'+data).form('submit',{
				url: '<?php echo site_url("operator_penduduk/save_more") ?>',
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