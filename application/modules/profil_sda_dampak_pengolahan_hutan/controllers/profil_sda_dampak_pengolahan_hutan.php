<?php 
class profil_sda_dampak_pengolahan_hutan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$form['id'] = "dampak_hutan";//id form
		$form['title1'] = "Dampak yang timbul dari pengolahan hutan";//untuk title grid
		$form['title2'] = "dampak";//untuk title pop-up form
		$form['f1'] = "dampak";
		$form['f2'] = "ket";
		$form['l1'] = "Dampak";
		$form['l2'] = "Keterangan";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_dampak_pengolahan_hutan";
		$form['table_m'] = "master_ada_tidak";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['default'] = 'id';
		$form['id1'] = "id";//id untuk dropdown di popup
		$form['f3'] = "ket";//id untuk dropdown di popup
		$form['f4'] = "keterangan";//id untuk dropdown di popup
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