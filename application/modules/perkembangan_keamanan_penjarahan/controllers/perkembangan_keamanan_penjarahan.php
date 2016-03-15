<?php 
class perkembangan_keamanan_penjarahan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Penjarahan dan penyerobotan tanah';
$form['title2'] = 'penjarahan';
$form['table'] = 'perkembangan_keamanan_penjarahan';
$form['id'] = 'perkembangan_keamanan_penjarahan';
$form['f1'] = 'penjarahan';
$form['l1'] = 'Penjarahan dan penyerobotan tanah';
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