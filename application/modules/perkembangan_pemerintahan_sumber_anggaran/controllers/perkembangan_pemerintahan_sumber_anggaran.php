<?php 
class perkembangan_pemerintahan_sumber_anggaran extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'APB-Desa dan anggaran kelurahan';
$form['title2'] = '';
$form['table'] = 'perkembangan_pemerintahan_sumber_anggaran';
$form['id'] = 'perkembangan_pemerintahan_sumber_anggaran';
$form['f1'] = 'apb';
$form['l1'] = 'APD-Desa';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah';
//add
		$form['default'] = $form['f1'];
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