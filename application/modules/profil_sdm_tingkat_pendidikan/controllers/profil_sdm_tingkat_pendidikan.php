<?php 
class profil_sdm_tingkat_pendidikan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
$form['title1'] = 'Tingkat pendidikan aparat desa / kelurahan';
$form['title2'] = 'tingkat pendidikan';
$form['table'] = 'profil_sdm_tingkat_pendidikan';
$form['id'] = 'profil_sdm_tingkat_pendidikan';
$form['f1'] = 'aparat';
$form['l1'] = 'Aparat desa / kelurahan';
$form['f2'] = 'tingkat_teks';
$form['l2'] = 'Tingkat pendidikan';
$form['arr2'] = array("1"=>"SD","2"=>"SMP","3"=>"SMA","4"=>"Diploma","5"=>"S1","6"=>"Pascasarjana");
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