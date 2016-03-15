<?php 
class profil_sarana_pendidikan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
$form['title1'] = 'Prasarana dan sarana pendidikan';
$form['title2'] = 'prasarana dan sarana';
$form['table'] = 'profil_sarana_pendidikan';
$form['id'] = 'profil_sarana_pendidikan';
$form['f1'] = 'prasarana';
$form['l1'] = 'Prasarana dan sarana pendidikan';
$form['f2'] = 'sewa';
$form['l2'] = 'Sewa (buah)';
$form['f3'] = 'milik_sendiri';
$form['l3'] = 'Milik sendiri (buah)';
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