<?php 
class profil_sda_potensi_wisata extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Potensi Wisata';
		$form['title2'] = 'potensi wisata';
		$form['table'] = 'profil_sda_potensi_wisata';
		$form['id'] = 'profil_sda_potensi_wisata';
		$form['f1'] = 'lokasi';
		$form['l1'] = 'Lokasi / Tempat / Area wisata';
		$form['f2'] = 'keberadaan_teks';
		$form['l2'] = 'Keberadaan';
		$form['arr2'] = array("1"=>"Ada","0"=>"Tidak ada");
		$form['f3'] = 'luas';
		$form['l3'] = 'Luas (ha)';
		$form['f4'] = 'tingkat_teks';
		$form['l4'] = 'Tingkat pemanfaatan<br>(Aktif/Pasif)';
		$form['arr4'] = array("1"=>"Aktif","0"=>"Pasif");
		//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
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