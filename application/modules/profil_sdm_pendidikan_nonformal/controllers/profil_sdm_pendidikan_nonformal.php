<?php 
class profil_sdm_pendidikan_nonformal extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
$form['title1'] = 'Pendidikan Non formal / Kursus';
$form['title2'] = 'pendidikan';
$form['table'] = 'profil_sdm_pendidikan_nonformal';
$form['id'] = 'profil_sdm_pendidikan_nonformal';
$form['f1'] = 'pendidikan';
$form['l1'] = 'Nama';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah';
$form['f3'] = 'status_teks';
$form['l3'] = 'Status';
$form['arr3'] = array("1"=>"Terdaftar","2"=>"Terakreditasi");
$form['f4'] = 'kepemilikan_teks';
$form['l4'] = 'kepemilikan';
$form['arr4'] = array("1"=>"Pemerintah","2"=>"Yayasan","3"=>"dll");
$form['f5'] = 'pengajar';
$form['l5'] = 'Jumlah tenaga pengajar';
$form['f6'] = 'siswa';
$form['l6'] = 'Jumlah siswa / mahasiswa';
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