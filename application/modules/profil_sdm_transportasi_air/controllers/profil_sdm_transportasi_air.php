<?php 
class profil_sdm_transportasi_air extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
$form['title1'] = 'Sarana transportasi laut / sungai';
$form['title2'] = 'transportasi';
$form['table'] = 'profil_sdm_transportasi_air';
$form['id'] = 'profil_sdm_transportasi_air';
$form['f1'] = 'transportasi';
$form['l1'] = 'Sarana transportasi laut / sungai';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (unit)';
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