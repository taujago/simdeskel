<?php 
class perkembangan_angka_harapan_hidup extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Angka harapan hidup';
$form['title2'] = '';
$form['table'] = 'perkembangan_angka_harapan_hidup';
$form['id'] = 'perkembangan_angka_harapan_hidup';
$form['f1'] = 'harapan';
$form['l1'] = 'Angka harapan hidup';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (Orang)';
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