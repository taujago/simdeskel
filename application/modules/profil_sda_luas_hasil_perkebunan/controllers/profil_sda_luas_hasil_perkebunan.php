<?php 
class profil_sda_luas_hasil_perkebunan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$form['id'] = "pemasaran_buah";//id form
		$form['title1'] = "Luas dan hasil perkebunan menurut komoditas";//untuk title grid
		$form['title2'] = "Pemasaran Hasil";//untuk title pop-up form
		$form['f1'] = "produksi_perkebunan";
		$form['f2'] = "luas_swasta";
		$form['f3'] = "hasil_swasta";
		$form['f4'] = "luas_rakyat";
		$form['f5'] = "hasil_rakyat";
		$form['l1'] = "Jenis tanaman";
		$form['l2'] = "Luas (Ha)";
		$form['l3'] = "Hasil(kw/ha)";
		$form['l4'] = "Luas (Ha)";
		$form['l5'] = "Hasil (kw/ha)";
		$form['url'] = "grid/get_data";
		$form['table'] = "profil_sda_luas_hasil_perkebunan";
		$form['table_m'] = "master_produksi_perkebunan";//nama tabel master yang akan dijoin dengan tabel profil_sda
		$form['default'] = 'id';
		$form['id1'] = "id_produksi_perkebunan";//id untuk dropdown di popup
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid_perkebunan",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		$this->load->view("$cont/grid_toolbar",$form);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>