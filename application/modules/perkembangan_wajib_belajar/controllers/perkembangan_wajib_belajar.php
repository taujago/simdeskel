<?php 
class perkembangan_wajib_belajar extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Wajib belajar 9 tahun';
$form['title2'] = '';
$form['table'] = 'perkembangan_wajib_belajar';
$form['id'] = 'perkembangan_wajib_belajar';
$form['f1'] = 'ket';
$form['l1'] = 'Keterangan';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (orang)';
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