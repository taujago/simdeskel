<style>.wi{width:200px}</style>
<form id="kesehatan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="kesehatan" /><br />
<?php 
$data['label'] = "Kualitas Ibu Hamil dalam Keluarga";
$data['id'] = "ibu_hamil";
$data['table'] = "master_kualitas_hamil";
$data['id_t'] = "id_kualitas_hamil";
$data['data_t'] = "kualitas_hamil";
$data['ck_name'] = "id_kualitas_hamil";
$data['arr_danau'] = $this->dm->get_arr("penduduk_kualitas_hamil","id_kualitas_hamil",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Kualitas Bayi dalam Keluarga";
$data['id'] = "kualitas_bayi";
$data['table'] = "master_kualitas_bayi";
$data['id_t'] = "id_kualitas_bayi";
$data['data_t'] = "kualitas_bayi";
$data['ck_name'] = "id_kualitas_bayi";
$data['arr_danau'] = $this->dm->get_arr("penduduk_kualitas_bayi","id_kualitas_bayi",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<fieldset><br />
	<legend><strong>Kualitas Persalinan dalam Keluarga</strong></legend>
     <a href="javascript:void(0)" class="easyui-linkbutton persalinan" onclick="jQuery('#table_persalinan').toggle('slow');jQuery('a.persalinan').toggle();">Sembunyikan</a> 
<a href="javascript:void(0)" style="display:none" class="easyui-linkbutton persalinan" onclick="jQuery('#table_persalinan').toggle('slow');jQuery('a.persalinan').toggle();">Tampilkan</a> 
	 	<table id="table_persalinan">
        <input type="hidden" name="tab_name[]" value="penduduk_kualitas_persalinan" />
	 	<tr>
                <td>
						<?php
						$arr_danau = $this->dm->get_arr("penduduk_kualitas_persalinan","id_kualitas_persalinan",$arr_detail["id_penduduk"]);
						//$arr_cat = $this->dm->arr_master_perumahan();
                        $c = 0;
                        $arr = $this->cm->arr_tabel("master_kualitas_persalinan","id_kualitas_persalinan","kualitas_persalinan","kualitas_persalinan");
						$cc = 0;
						while($cc < 3){
						echo '<table style="float:left"><tr><td>';
							if($cc == 1) echo "<strong>Tempat Persalinan </strong><br/>";
							if($cc == 2) echo "<strong>Pertolongan Persalinan </strong><br/>";
							foreach($arr as $key=>$value)
							{
								$temp = $this->dm->cat_persalinan($key);
								if($temp == $cc){
									if(in_array($key,$arr_danau)){$check = true;}
									else{ $check = false; }
									echo form_checkbox("id_kualitas_persalinan[]",$key, $check);
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
<?php 
$data['label'] = "Cakupan Immunisasi";
$data['id'] = "cakupan_immunisasi";
$data['table'] = "master_cakupan_immunisasi";
$data['id_t'] = "id_cakupan_immunisasi";
$data['data_t'] = "cakupan_immunisasi";
$data['ck_name'] = "id_cakupan_immunisasi";
$data['arr_danau'] = $this->dm->get_arr("penduduk_cakupan_immunisasi","id_cakupan_immunisasi",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Penderita Sakit dan Kelainan dalam Keluarga";
$data['id'] = "penderita_sakit";
$data['table'] = "master_penderita_sakit";
$data['id_t'] = "id_penderita_sakit";
$data['data_t'] = "penderita_sakit";
$data['ck_name'] = "id_penderita_sakit";
$data['arr_danau'] = $this->dm->get_arr("penduduk_penderita_sakit","id_penderita_sakit",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<fieldset>
	<legend><strong>Perilaku Hidup Bersih dan Sehat dalam Keluarga  </strong></legend>
    <br />
    	<table>
	 	<tr>
	 		<td class="wi">Perilaku Hidup Bersih dan Sehat dalam Keluarga </td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_hidup_sehat","id_hidup_sehat","hidup_sehat","hidup_sehat");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_hidup_sehat", $data,
!empty($arr_detail['id_hidup_sehat'])?$arr_detail['id_hidup_sehat']:"",'id="id_hidup_sehat"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<br />
<fieldset>
	<legend><strong>Pola Makan Keluarga </strong></legend>
    <br />
    	<table>
	 	<tr>
	 		<td class="wi">Pola Makan Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_pola_makan","id_pola_makan","pola_makan","pola_makan");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_pola_makan", $data,
!empty($arr_detail['id_pola_makan'])?$arr_detail['id_pola_makan']:"",'id="id_pola_makan"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<br />
<fieldset>
	<legend><strong>Kebiasaan Berobat Bila Sakit dalam Keluarga </strong></legend>
    <br />
    	<table>
	 	<tr>
	 		<td class="wi">Kebiasaan Berobat Bila Sakit dalam Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_kebiasaan_berobat","id_kebiasaan_berobat","kebiasaan_berobat","kebiasaan_berobat");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_kebiasaan_berobat", $data,
!empty($arr_detail['id_kebiasaan_berobat'])?$arr_detail['id_kebiasaan_berobat']:"",'id="id_kebiasaan_berobat"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<br />
<fieldset>
	<legend><strong>Status Gizi Balita dalam Keluarga </strong></legend>
    <br />
    	<table>
	 	<tr>
	 		<td class="wi">Status Gizi Balita dalam Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_status_gizi","id_status_gizi","status_gizi","status_gizi");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_status_gizi", $data,
!empty($arr_detail['id_status_gizi'])?$arr_detail['id_status_gizi']:"",'id="id_status_gizi"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<?php 
$data['label'] = "Jenis Penyakit yang Diderita Keluarga";
$data['id'] = "jenis_penyakit";
$data['table'] = "master_jenis_penyakit";
$data['id_t'] = "id_jenis_penyakit";
$data['data_t'] = "jenis_penyakit";
$data['ck_name'] = "id_jenis_penyakit";
$data['arr_danau'] = $this->dm->get_arr("penduduk_jenis_penyakit","id_jenis_penyakit",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('kesehatan')">Simpan</a>