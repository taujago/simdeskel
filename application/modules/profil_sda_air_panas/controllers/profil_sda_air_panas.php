<?php 
class profil_sda_air_panas extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$form['id'] = "air_panas";//id form
		$form['title1'] = "Air Panas";//untuk title grid
		$form['title2'] = "sumber air panas";//untuk title pop-up form
		$form['f1'] = "sumber";
		$form['f2'] = "jumlah";
		$form['f3'] = "pemanfaatan_teks";
		$form['f4'] = "pemda_teks";
		$form['f5'] = "swasta_teks";
		$form['f6'] = "adat_teks";
		$form['l1'] = "Sumber";
		$form['l2'] = "Jumlah lokasi";
		$form['l3'] = "Pemanfaatan <br>(Wisata, Pengobatan,<br>Energi,dll)";
		$form['l4'] = "Pemda";
		$form['l5'] = "Swasta";
		$form['l6'] = "Adat/Perorangan";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_air_panas";
		$form['default'] = 'id';
		$form['f7'] = "pemanfaatan";
		$form['f8'] = "pemda";
		$form['f9'] = "swasta";
		$form['f10'] = "adat";
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		$this->set_content($content);
		$this->render();
	}

}
?>