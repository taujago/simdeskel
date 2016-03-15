<style>.wi{width:200px}</style>
<form id="kejahatan" method="post">
<input type="hidden" name="id_penduduk" id="id_penduduk" value='<?php echo $arr_detail["id_penduduk"]; ?>' />
<input type="hidden" name="tab" value="kejahatan" /><br />
<?php 
$data['label'] = "Kerukunan";
$data['id'] = "kerukunan";
$data['table'] = "master_kerukunan";
$data['id_t'] = "id_kerukunan";
$data['data_t'] = "kerukunan";
$data['ck_name'] = "id_kerukunan";
$data['arr_danau'] = $this->dm->get_arr("penduduk_kerukunan","id_kerukunan",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Perkelahian";
$data['id'] = "perkelahian";
$data['table'] = "master_perkelahian";
$data['id_t'] = "id_perkelahian";
$data['data_t'] = "perkelahian";
$data['ck_name'] = "id_perkelahian";
$data['arr_danau'] = $this->dm->get_arr("penduduk_perkelahian","id_perkelahian",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Pencurian";
$data['id'] = "pencurian";
$data['table'] = "master_pencurian";
$data['id_t'] = "id_pencurian";
$data['data_t'] = "pencurian";
$data['ck_name'] = "id_pencurian";
$data['arr_danau'] = $this->dm->get_arr("penduduk_pencurian","id_pencurian",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Penjarahan";
$data['id'] = "penjarahan";
$data['table'] = "master_penjarahan";
$data['id_t'] = "id_penjarahan";
$data['data_t'] = "penjarahan";
$data['ck_name'] = "id_penjarahan";
$data['arr_danau'] = $this->dm->get_arr("penduduk_penjarahan","id_penjarahan",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Penjudian";
$data['id'] = "perjudian";
$data['table'] = "master_perjudian";
$data['id_t'] = "id_perjudian";
$data['data_t'] = "perjudian";
$data['ck_name'] = "id_perjudian";
$data['arr_danau'] = $this->dm->get_arr("penduduk_perjudian","id_perjudian",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Pemakai MIRAS dan Narkoba";
$data['id'] = "pemakai_miras";
$data['table'] = "master_miras";
$data['id_t'] = "id_miras";
$data['data_t'] = "miras";
$data['ck_name'] = "id_miras";
$data['arr_danau'] = $this->dm->get_arr("penduduk_miras","id_miras",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Pembunuhan";
$data['id'] = "pembunuhan";
$data['table'] = "master_pembunuhan";
$data['id_t'] = "id_pembunuhan";
$data['data_t'] = "pembunuhan";
$data['ck_name'] = "id_pembunuhan";
$data['arr_danau'] = $this->dm->get_arr("penduduk_pembunuhan","id_pembunuhan",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Penculikan";
$data['id'] = "penculikan";
$data['table'] = "master_penculikan";
$data['id_t'] = "id_penculikan";
$data['data_t'] = "penculikan";
$data['ck_name'] = "id_penculikan";
$data['arr_danau'] = $this->dm->get_arr("penduduk_penculikan","id_penculikan",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Kejahatan Seksual";
$data['id'] = "kejahatan_seksual";
$data['table'] = "master_kejahatan_seksual";
$data['id_t'] = "id_kejahatan_seksual";
$data['data_t'] = "kejahatan_seksual";
$data['ck_name'] = "id_kejahatan_seksual";
$data['arr_danau'] = $this->dm->get_arr("penduduk_kejahatan_seksual","id_kejahatan_seksual",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
<br />
<?php 
$data['label'] = "Kekerasan dalam Keluarga / Rumah Tangga";
$data['id'] = "kekerasan_rumah";
$data['table'] = "master_kekerasan_rumah";
$data['id_t'] = "id_kekerasan_rumah";
$data['data_t'] = "kekerasan_rumah";
$data['ck_name'] = "id_kekerasan_rumah";
$data['arr_danau'] = $this->dm->get_arr("penduduk_kekerasan_rumah","id_kekerasan_rumah",$arr_detail["id_penduduk"]);
$this->load->view("profil/checkbox",$data); 
?>
</form>
<br /><br /><br />
<a href="#" class="easyui-linkbutton" onclick="submit('kejahatan')">Simpan</a>