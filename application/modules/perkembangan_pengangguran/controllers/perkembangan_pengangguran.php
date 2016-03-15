<?php 
class perkembangan_pengangguran extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Pengangguran';
$form['title2'] = 'pengangguran';
$form['table'] = 'perkembangan_pengangguran';
$form['id'] = 'perkembangan_pengangguran';
$form['f1'] = 'pengangguran';
$form['l1'] = 'Keterangan';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (orang)';
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