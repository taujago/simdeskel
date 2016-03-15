<form id="aset_keluarga" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="aset_keluarga" />
<fieldset>
<br />
	<legend><strong>Penguasaan Aset Tanah Oleh Keluarga </strong></legend>
    	<table>
	 	<tr>
	 		<td class="wi">Penguasaan Aset Tanah Oleh Keluarga</td>
<td> :
<?php 
$data = $this->cm->arr_tabel("master_aset_tanah","id_aset_tanah","aset_tanah","aset_tanah");
$data = $this->cm->add_arr_head($data,"","Belum ada data");
echo form_dropdown("id_aset_tanah", $data,
!empty($arr_detail['id_aset_tanah'])?$arr_detail['id_aset_tanah']:"",'id="id_aset_tanah"'); ?>
</td>
</tr>
</table>
<br />
</fieldset>
<?php
$data['label'] = "Aset Sarana Produksi yang Dimiliki";
$data['id'] = "table_produksi";
$data['table'] = "master_aset_produksi";
$data['id_t'] = "id_aset_produksi";
$data['data_t'] = "aset_produksi";
$data['ck_name'] = "id_aset_produksi";
$data['arr_danau'] = $this->dm->get_arr("penduduk_aset_produksi","id_aset_produksi",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data);
?>
<br />
<fieldset>
<br />
	<legend><strong>Aset Perumahan </strong></legend>
     <a href="javascript:void(0)" class="easyui-linkbutton perumahan" onclick="jQuery('#table_perumahan1').toggle('slow');jQuery('a.perumahan').toggle();">Sembunyikan</a> 
<a href="javascript:void(0)" style="display:none" class="easyui-linkbutton perumahan" onclick="jQuery('#table_perumahan1').toggle('slow');jQuery('a.perumahan').toggle();">Tampilkan</a> 
	 	<table id="table_perumahan1">
        <input type="hidden" name="tab_name[]" value="penduduk_aset_perumahan" />
	 	<tr>
                <td>
						<?php
						$arr_danau = $this->dm->arr_perumahan($arr_detail["id_penduduk"]);
						//$arr_cat = $this->dm->arr_master_perumahan();
                        $c = 0;
                        $arr = $this->cm->arr_tabel("master_aset_perumahan","id_aset_perumahan","aset_perumahan","aset_perumahan"); 
						$cc = 0;
						while($cc < 4){
						echo '<table style="float:left"><tr><td>';
							if($cc == 1) echo "<strong>Rumah Menurut Dinding </strong><br/>";
							if($cc == 2) echo "<strong>Rumah Menurut Lantai </strong><br/>";
							if($cc == 3) echo "<strong>Rumah Menurut Atap </strong><br/>";
							foreach($arr as $key=>$value)
							{
								$temp = $this->dm->cat_perumahan($key);
								if($temp == $cc){
									if(in_array($key,$arr_danau)){$check = true;}
									else{ $check = false; }
									echo form_checkbox("id_aset_perumahan[]",$key, $check);
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
$data['label'] = "Aset Lainnya ";
$data['id'] = "table_lainnya";
$data['table'] = "master_aset_lainnya";
$data['id_t'] = "id_aset_lainnya";
$data['data_t'] = "aset_lainnya";
$data['ck_name'] = "id_aset_lainnya";
$data['arr_danau'] = $this->dm->get_arr("penduduk_aset_lainnya","id_aset_lainnya",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data);
?>
</form>
<?php
/*$data['label'] = "Aset Transportasi Umum yang Dimiliki";
$data['id'] = "table_transportasi";
$data['table'] = "master_aset_transportasi";
$data['id_t'] = "id_aset_transportasi";
$data['data_t'] = "aset_transportasi";
$data['ck_name'] = "id_aset_transportasi";
$data['arr_danau'] = $this->dm->get_arr("penduduk_aset_transportasi","id_aset_transportasi",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data);*/
$data = '';
$data['title1'] = "Aset transportasi umum ";//title fieldset
$data['title2'] = "Aset transportasi umum";//title tabel
$data['id'] = "penduduk_aset_transportasi";//suffix untuk id tabel
$data['url'] = "grid/get_data";//suffix untuk id tabel
$data['f1'] = "id_aset_transportasi_teks";//field db pertama
$data['arr1'] = $this->cm->arr_tabel("master_aset_transportasi","id_aset_transportasi","aset_transportasi","aset_transportasi");
$data['f2'] = "jumlah";//field db kedua
$data['l1'] = "Nama alat transportasi";//field db pertama
$data['l2'] = "Jumlah kepemilikan";//field db kedua
$data['table'] = 'penduduk_aset_transportasi'; // nama tabel yang di-request 
$data['default'] = $data['f1'];
$this->load->view("profil/grid2",$data); 
$this->load->view("profil/grid_form",$data); 
$this->load->view("profil/grid_js",$data);
?>

<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('aset_keluarga')">Simpan</a>