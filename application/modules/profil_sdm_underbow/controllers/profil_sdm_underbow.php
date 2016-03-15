<?php 
class profil_sdm_underbow extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Organisasi underbow';
		$form['title2'] = 'organisasi underbow';
		$form['table'] = 'profil_sdm_underbow';
		$form['id'] = 'profil_sdm_underbow';
		$form['f1'] = 'underbow';
		$form['l1'] = 'Nama organisasi underbow';
		$form['f2'] = 'pengurus';
		$form['l2'] = 'Jumlah pengurus';
		$form['f3'] = 'anggota';
		$form['l3'] = 'Jumlah anggota';
		$form['f4'] = 'alamat';
		$form['l4'] = 'Alamat sekretariat / Kantor';
		$form['f5'] = 'hukum';
		$form['l5'] = 'Dasar hukum pembentukan';
		$form['f6'] = 'jenis';
		$form['l6'] = 'Ruang linkup kegiatan (jenis)';
		$form['f7'] = 'yakni';
		$form['l7'] = 'Ruang linkup kegiatan (yakni)';
		$form['f8'] = 'jumlah';
		$form['l8'] = 'Jumlah unit organisasi';
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