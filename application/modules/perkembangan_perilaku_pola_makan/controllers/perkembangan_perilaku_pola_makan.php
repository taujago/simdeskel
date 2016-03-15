<?php 
class perkembangan_perilaku_pola_makan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Pola makan';
$form['title2'] = '';
$form['table'] = 'perkembangan_perilaku_pola_makan';
$form['id'] = 'perkembangan_perilaku_pola_makan';
$form['f1'] = 'pola_makan';
$form['l1'] = 'Pola makan';
$form['f2'] = 'ket';
$form['l2'] = 'Keterangan';
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