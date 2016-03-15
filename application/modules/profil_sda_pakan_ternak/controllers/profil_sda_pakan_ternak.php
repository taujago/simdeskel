<?php 
class profil_sda_pakan_ternak extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$form['id'] = "dampak_hutan";//id form
		$form['title1'] = "Ketersediaan hijauan pakan ternak";//untuk title grid
		$form['title2'] = "pakan ternak";//untuk title pop-up form
		$form['f1'] = "pakan_ternak";
		$form['f2'] = "nilai";
		$form['f3'] = "satuan";
		$form['l1'] = "Ketersediaan pakan";
		$form['l2'] = "Keterangan";
		$form['l3'] = "Satuan";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_pakan_ternak";
		$form['table_m'] = "master_satuan";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['default'] = 'id';
		$form['id1'] = "id_satuan";//id untuk dropdown di popup
		//$form['f3'] = "";//id untuk dropdown di popup
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