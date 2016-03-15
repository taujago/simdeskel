<?php 
class profil_sda_pengelolaan_bahan_galian extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$form['id'] = "dampak_hutan";//id form
		$form['title1'] = "Kepemilikan dan pengolaan bahan galian";//untuk title grid
		$form['title2'] = "bahan galian";//untuk title pop-up form
		$form['f1'] = "bahan_galian";
		$form['f2'] = "ket";
		$form['l1'] = "Bahan galian";
		$form['l2'] = "Pengelola / pemilik";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_pengelolaan_bahan_galian";
		$form['table_m2'] = "master_pemilik_galian";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['table_m1'] = "master_bahan_galian";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['default'] = 'id';
		$form['id2'] = "id";//id untuk dropdown di popup
		$form['id1'] = "id_bahan_galian";//id untuk dropdown di popup
		$form['f4'] = "ket";//id untuk dropdown di popup
		$form['f3'] = "bahan_galian";//id untuk dropdown di popup
		$form['f5'] = "id_pengelola";//id untuk dropdown di popup
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