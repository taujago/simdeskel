<?php 
class profil_sda_kondisi_hutan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$form['id'] = "pemasaran_buah";//id form
		$form['title1'] = "Kondisi hutan";//untuk title grid
		$form['title2'] = "kondisi hutan";//untuk title pop-up form
		$form['f1'] = "kondisi_hutan";
		$form['f2'] = "luas_baik";
		$form['f3'] = "luas_rusak";
		$form['f4'] = "total";
		$form['l1'] = "Kondisi Hutan";
		$form['l2'] = "Baik (ha)";
		$form['l3'] = "Rusak (ha)";
		$form['l4'] = "Total";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_kondisi_hutan";
		$form['table_m'] = "master_produksi_perkebunan";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['default'] = 'id';
		$form['id1'] = "id_produksi_perkebunan";//id untuk dropdown di popup
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