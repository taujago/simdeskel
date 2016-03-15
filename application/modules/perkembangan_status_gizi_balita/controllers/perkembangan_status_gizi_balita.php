<?php 
class perkembangan_status_gizi_balita extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Status gizi balita';
$form['title2'] = '';
$form['table'] = 'perkembangan_status_gizi_balita';
$form['id'] = 'perkembangan_status_gizi_balita';
$form['f1'] = 'status_gizi';
$form['l1'] = 'Status gizi balita';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (Orang)';
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