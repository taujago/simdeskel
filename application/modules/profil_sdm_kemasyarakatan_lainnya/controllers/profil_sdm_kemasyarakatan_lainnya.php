<?php 
class profil_sdm_kemasyarakatan_lainnya extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Lembaga kemasyarakatan lainnya';
		$form['title2'] = 'lembaga kemasyarakatan';
		$form['table'] = 'profil_sdm_kemasyarakatan_lainnya';
		$form['id'] = 'profil_sdm_kemasyarakatan_lainnya';
		$form['f1'] = 'jumlah';
		$form['l1'] = 'Jumlah organisasi (unit)';
		$form['f2'] = 'hukum';
		$form['l2'] = 'Dasar hukum pembentukan';
		$form['f3'] = 'jumlah_pengurus';
		$form['l3'] = 'Jumlah pengurus';
		$form['f4'] = 'alamat';
		$form['l4'] = 'Alamat kantor';
		$form['f5'] = 'jenis';
		$form['l5'] = 'Ruang lingkup kegiatan (Jenis)';
		$form['f6'] = 'yakni';
		$form['l6'] = 'Ruang lingkup kegiatan (Yakni)';
		$form['f7'] = 'nama';
		$form['l7'] = 'Nama';
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