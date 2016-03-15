<?php 
class profil_sda_ruang_publik extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Ruang publik / taman';
		$form['title2'] = 'ruang publik / taman';
		$form['table'] = 'profil_sda_ruang_publik';
		$form['id'] = 'profil_sda_ruang_publik';
		$form['f1'] = 'ruang_publik';
		$form['l1'] = 'Ruang publik / Taman';
		$form['f2'] = 'keberadaan_teks';
		$form['l2'] = 'Keberadaan';
		$form['arr2'] = array("1"=>"Ada","0"=>"Tidak ada");
		$form['f3'] = 'luas';
		$form['l3'] = 'Luas (M&sup2;)';
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