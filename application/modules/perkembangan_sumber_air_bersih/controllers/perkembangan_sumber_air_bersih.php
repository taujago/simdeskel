<?php 
class perkembangan_sumber_air_bersih extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Cakupan pemenuhan kebutuhan air bersih';
$form['title2'] = '';
$form['table'] = 'perkembangan_sumber_air_bersih';
$form['id'] = 'perkembangan_sumber_air_bersih';
$form['f1'] = 'sumber_air';
$form['l1'] = ' Data cakupan pemenuhan kebutuhan air bersih';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (Keluarga)';
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