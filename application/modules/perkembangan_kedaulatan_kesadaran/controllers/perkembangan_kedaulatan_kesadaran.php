<?php 
class perkembangan_kedaulatan_kesadaran extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Kesadaran berpemerintahan, berbangsa dan bernegara';
		$form['title2'] = '';
		$form['table'] = 'perkembangan_kedaulatan_kesadaran';
		$form['id'] = 'perkembangan_kedaulatan_kesadaran';
		$form['f1'] = 'kesadaran';
		$form['l1'] = 'Kesadaran berpemerintahan, berbangsa dan bernegara';
		$form['f2'] = 'jumlah';
		$form['l2'] = 'Jumlah';
		$form['f3'] = 'id_satuan_teks';
		$form['l3'] = 'Satuan';
		$form['arr3'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
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