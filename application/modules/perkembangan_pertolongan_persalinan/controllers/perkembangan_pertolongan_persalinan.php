<?php 
class perkembangan_pertolongan_persalinan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Pertolongan persalinan';
$form['title2'] = '';
$form['table'] = 'perkembangan_pertolongan_persalinan';
$form['id'] = 'perkembangan_pertolongan_persalinan';
$form['f1'] = 'kualitas_persalinan';
$form['l1'] = 'Data pertolongan persalinan';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (Tindakan)';
//add
		$form['default'] = $form['f1'];
		$form['url'] = "grid/get_data";
		$content = $this->load->view("$cont/grid",$form,true);
		
		//$this->set_title($data['header']);
		$this->set_content($content);
		$this->render();
	}

}
?>