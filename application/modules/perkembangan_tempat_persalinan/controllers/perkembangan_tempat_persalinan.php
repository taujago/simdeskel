<?php 
class perkembangan_tempat_persalinan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Tempat persalinan';
$form['title2'] = '';
$form['table'] = 'perkembangan_tempat_persalinan';
$form['id'] = 'perkembangan_tempat_persalinan';
$form['f1'] = 'tempat_persalinan';
$form['l1'] = 'Data tempat persalinan';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (Unit)';
//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
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