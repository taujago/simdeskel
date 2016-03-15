<?php 
class perkembangan_pemilihan_fungsi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Pemilihan dan fungsi lembaga kemasyarakatan';
		$form['title2'] = '';
		$form['table'] = 'perkembangan_pemilihan_fungsi';
		$form['id'] = 'perkembangan_pemilihan_fungsi';
		$form['f1'] = 'lemabaga';
		$form['l1'] = 'Pemilihan dan fungsi lembaga kemasyarakatan';
		$form['f2'] = 'ket';
		$form['l2'] = 'Keterangan';
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