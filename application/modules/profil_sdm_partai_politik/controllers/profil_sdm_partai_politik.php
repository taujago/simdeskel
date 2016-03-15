<?php 
class profil_sdm_partai_politik extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Lembaga politik';
		$form['title2'] = 'partai';
		$form['table'] = 'profil_sdm_partai_politik';
		$form['id'] = 'profil_sdm_partai_politik';
		$form['f1'] = 'partai_politik';
		$form['l1'] = 'Nama partai';
		$form['f2'] = 'pengurus';
		$form['l2'] = 'Jumlah pengurus';
		$form['f3'] = 'anggota';
		$form['l3'] = 'Jumlah anggota';
		$form['f4'] = 'pemilih';
		$form['l4'] = 'Jumlah pemilih pada pemilu terakhir';
		$form['f5'] = 'alamat';
		$form['l5'] = 'Alamat sekretariat / Kantor';
		$form['f6'] = 'hukum';
		$form['l6'] = 'Dasar hukum pembentukan';
		$form['f7'] = 'jenis';
		$form['l7'] = 'Ruang linkup kegiatan (jenis)';
		$form['f8'] = 'yakni';
		$form['l8'] = 'Ruang linkup kegiatan (yakni)';
		$form['f9'] = 'underbow';
		$form['l9'] = 'Organisasi underbow';
		$form['f10'] = 'lokal';
		$form['l10'] = 'Jumlah partai politik lokal';
		$form['f11'] = 'nasional';
		$form['l11'] = 'Jumlah partai politik nasional';
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid",$form,true);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>