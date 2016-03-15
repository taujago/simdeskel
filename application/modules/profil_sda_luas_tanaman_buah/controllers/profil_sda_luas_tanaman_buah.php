<?php 
class profil_sda_luas_tanaman_buah extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}
	
	function index(){
		$data['controller'] = get_class($this);
		$cont = get_class($this);
		$data['header'] = "";
		$form['id'] = "luas_tanaman_buah";
		$form['title1'] = "Hasil tanaman dan luas tanaman buah-buahan";
		$form['f1'] = "produksi_tanaman_buah";
		$form['f2'] = "lahan";
		$form['f3'] = "hasil";
		$form['l1'] = "Nama Buah";
		$form['l2'] = "Luas (Ha)";
		$form['l3'] = "Produksi (Ton/Ha)";
		$form['url'] = "grid/get_data";
		$form['table'] = "total_tanaman_buah";
		$form['default'] = "produksi_tanaman_buah";
		$content = $this->load->view("$cont/grid",$form,true);
		$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>