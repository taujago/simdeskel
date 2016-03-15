<?php 
class profil_sda_sumber_air extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$form['id'] = "dampak_hutan";//id form
		$form['title1'] = "Sumber air bersih";//untuk title grid
		$form['title2'] = "sumber air";//untuk title pop-up form
		$form['f1'] = "sumber_air";
		$form['f2'] = "jumlah";
		$form['f3'] = "pemanfaat";
		$form['f4'] = "kondisi_teks";
		$form['l1'] = "Jenis";
		$form['l2'] = "Jumlah (unit)";
		$form['l3'] = "Pemanfaat (KK)";
		$form['l4'] = "Kondisi (Baik/Rusak)";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_sumber_air";
		$form['table_m'] = "master_sumber_air";
		$form['default'] = 'id';
		$form['f5'] = "kondisi";//id untuk dropdown di popup
		$form['id1'] = "id_sumber_air";//id untuk dropdown di popup	
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>