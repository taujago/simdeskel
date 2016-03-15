<?php 
class profil_sdm_lembaga_pemerintah extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$form['title1'] = 'Pemerintah desa / kelurahan';
		$form['title2'] = 'lembaga pemerintah';
		$form['table'] = 'profil_sdm_lembaga_pemerintah';
		$form['id'] = 'profil_sdm_lembaga_pemerintah';
		$form['f1'] = 'lembaga';
		$form['l1'] = 'Lembaga pemerintah';
		$form['f2'] = 'ket_teks';
		$form['l2'] = 'Ada/Tidak';
		$form['arr2'] = array("0"=>"Kosong","1"=>"Ada","2"=>"Tidak");
		$form['f3'] = 'ket1_teks';
		$form['l3'] = 'Aktif/Tidak';
		$form['arr3'] = array("0"=>"Kosong","1"=>"Aktif","2"=>"Tidak");
		$form['f4'] = 'hukum_teks';
		$form['l4'] = 'Dasar hukum pembentukan';
		$form['arr4'] = array("0"=>"Kosong","1"=>"Perda","2"=>"Keputusan bupati","3"=>"Camat","4"=>"Belum ada keputusan");
		$form['f5'] = 'jumlah';
		$form['l5'] = 'Jumlah';
		$form['f6'] = 'id_satuan_teks';
		$form['l6'] = 'Satuan';
		$form['arr6'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
		$form['arr6'] = $this->cm->add_arr_head($form['arr6'],"0","Kosong");
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		/////////////
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>