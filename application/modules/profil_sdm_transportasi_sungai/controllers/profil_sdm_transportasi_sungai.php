<?php 
class profil_sdm_transportasi_sungai extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
$form['title1'] = 'Sarana transportasi sungai / laut';
$form['title2'] = 'transportasi';
$form['table'] = 'profil_sdm_transportasi_sungai';
$form['id'] = 'profil_sdm_transportasi_sungai';
$form['f1'] = 'transportasi';
$form['l1'] = 'Sarana transportasi';
$form['f2'] = 'ket_teks';
$form['l2'] = 'Keterangan';
$form['arr2'] = array("1"=>"Ada","0"=>"Tidak");
$form['f3'] = 'jumlah';
$form['l3'] = 'Jumlah (unit)';
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