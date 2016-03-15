<?php 
class profil_sdm_rt extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		///////
		$form['title1'] = 'Rukun warga';
		$form['title2'] = 'rukun warga';
		$form['table'] = 'profil_sdm_rw';
		$form['id'] = 'profil_sdm_rw';
		$form['f1'] = 'unit';
		$form['l1'] = 'Jumlah RW';
		$form['f2'] = 'hukum';
		$form['l2'] = 'Dasar hukum pembentukan';
		$form['f3'] = 'jumlah_pengurus';
		$form['l3'] = 'Jumlah<br>pengurus';
		$form['f4'] = 'alamat';
		$form['l4'] = 'Alamat kantor';
		$form['f5'] = 'jenis';
		$form['l5'] = 'Ruang lingkup kegiatan (Jenis)';
		$form['f6'] = 'yakni';
		$form['l6'] = 'Ruang lingkup kegiatan (Yakni)';
		$form['f7'] = 'order';
		$form['l7'] = 'Urutan/Order';
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content = $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		//////////
		$form['title1'] = 'Rukun tetangga';
		$form['title2'] = 'rukun tetangga';
		$form['table'] = 'profil_sdm_rt';
		$form['id'] = 'profil_sdm_rt';
		$form['f1'] = 'unit';
		$form['l1'] = 'Jumlah RT';
		$form['f2'] = 'hukum';
		$form['l2'] = 'Dasar hukum pembentukan';
		$form['f3'] = 'jumlah_pengurus';
		$form['l3'] = 'Jumlah<br>pengurus';
		$form['f4'] = 'alamat';
		$form['l4'] = 'Alamat kantor';
		$form['f5'] = 'jenis';
		$form['l5'] = 'Ruang lingkup kegiatan (Jenis)';
		$form['f6'] = 'yakni';
		$form['l6'] = 'Ruang lingkup kegiatan (Yakni)';
		$form['f7'] = 'order';
		$form['l7'] = 'Urutan/Order';
		//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
		$content .= "<br><br>";
		$content .= $this->load->view("$cont/grid",$form,true);
		$this->load->view("$cont/grid_form",$form);
		$this->load->view("$cont/grid_js",$form);
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>