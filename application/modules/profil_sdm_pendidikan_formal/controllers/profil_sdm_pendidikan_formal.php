<?php 
class profil_sdm_pendidikan_formal extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
		$form['title1'] = 'Pendidikan formal';
		$form['title2'] = 'pendidikan';
		$form['table'] = 'profil_sdm_pendidikan_formal';
		$form['id'] = 'profil_sdm_pendidikan_formal';
		$form['f1'] = 'pendidikan_formal';
		$form['l1'] = 'Nama';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah';
		$form['f3'] = 'status_teks';
		$form['l3'] = 'Status';
		$form['arr3'] = array("1"=>"Terdaftar","2"=>"Terakreditasi");
		$form['f4'] = 'pemerintah_teks';
		$form['l4'] = 'Pemerintah';
		$form['arr4'] = array("1"=>"Ya","0"=>"Tidak");
		$form['f5'] = 'swasta_teks';
		$form['l5'] = 'Swasta';
		$form['arr5'] = array("1"=>"Ya","0"=>"Tidak");
		$form['f6'] = 'desa_teks';
		$form['l6'] = 'Desa / <br>kelurahan';
		$form['arr6'] = array("1"=>"Ya","0"=>"Tidak");
		$form['f7'] = 'pengajar';
		$form['l7'] = 'Jumlah tenaga <br>pengajar';
		$form['f8'] = 'siswa';
		$form['l8'] = 'Jumlah siswa / <br>mahasiswa';
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