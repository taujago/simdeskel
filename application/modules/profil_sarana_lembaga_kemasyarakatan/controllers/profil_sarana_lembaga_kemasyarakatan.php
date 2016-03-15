<?php 
class profil_sarana_lembaga_kemasyarakatan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		$form['title1'] = 'Kategori prasarana dan sarana lembaga kemasyarakatan desa/kelurahan';
		$form['title2'] = 'Prasarana dan sarana';
		$form['table'] = 'profil_sarana_lembaga_kemasyarakatan_cat';
		$form['id'] = 'profil_sarana_lembaga_kemasyarakatan_cat';
		$form['f1'] = 'cat';
		$form['l1'] = 'Katgori prasarana dan sarana';
		$form['f2'] = 'ket_teks';
		$form['l2'] = 'Keterangan';
		$form['arr2'] = array("1"=>"Ada","2"=>"Tidak");
		$form['arr2'] = $this->cm->add_arr_head($form['arr2'],"","Kosong");
		$form['f3'] = 'ordr';
		$form['l3'] = 'Urutan/Order';
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js1",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		/////////////
		
		$form['title1'] = 'Prasarana dan sarana lembaga kemasyarakatan desa/kelurahan';
		$form['title2'] = "Prasarana dan sarana";
		$form['table'] = 'profil_sarana_lembaga_kemasyarakatan';
		$form['id'] = 'profil_sarana_lembaga_kemasyarakatan';
		$form['f1'] = 'sarana';
		$form['l1'] = 'Prasarana dan sarana';
		$form['f5'] = 'cat_teks';
		$form['l5'] = 'Kategori';
		$form['arr5'] = $this->cm->arr_tabel("profil_sarana_lembaga_kemasyarakatan_cat","id","cat","cat");
		$form['f2'] = 'ket_teks';
		$form['l2'] = 'Keterangan';
		$form['arr2'] = array("1"=>"Ada","2"=>"Tidak");
		$form['arr2'] = $this->cm->add_arr_head($form['arr2'],"","Kosong");
		$form['f3'] = 'jumlah';
		$form['l3'] = 'Jumlah';
		$form['f4'] = 'id_satuan_teks';
		$form['l4'] = 'Satuan';
		$form['arr4'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['arr4'] = $this->cm->add_arr_head($form['arr4'],"0","Kosong");
		$form['default'] = 'cat';
		$form['url'] = "grid/get_data";
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid1",$form,true);
		$this->load->view("$cont/grid_form1",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		///////////////////////
		
			//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>