<?php 
class profil_sda_potensi_air extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$form['id'] = "dampak_hutan";//id form
		$form['title1'] = "Potensi air dan sumber daya air";//untuk title grid
		$form['title2'] = "potensi/sumber daya air";//untuk title pop-up form
		$form['f1'] = "sumber_air";
		$form['f2'] = "debit_teks";
		$form['f3'] = "keterangan_teks";
		$form['l1'] = "Potensi air";
		$form['l2'] = "Debit/Volume";
		$form['l3'] = "Keterangan";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_potensi_air";
		$form['default'] = 'id';
		$form['f4'] = "debit";//id untuk dropdown di popup
		//$form['f3'] = "sumber_air";//id untuk dropdown di popup
		$form['f5'] = "keterangan";//id untuk dropdown di popup
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