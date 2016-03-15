<?php 
class perkembangan_keamanan_miras extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
		$form['title1'] = 'Pemakaian miras dan narkoba';
		$form['title2'] = 'pemakaian miras dan narkoba';
		$form['table'] = 'perkembangan_keamanan_miras';
		$form['id'] = 'perkembangan_keamanan_miras';
		$form['f1'] = 'miras';
		$form['l1'] = 'Pemakaian miras dan narkoba';
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