<?php 
class perkembangan_kedaulatan_etos_kerja extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		$cont = $form['controller'];
		
$form['title1'] = 'Etos kerja penduduk';
$form['title2'] = '';
$form['table'] = 'perkembangan_kedaulatan_etos_kerja';
$form['id'] = 'perkembangan_kedaulatan_etos_kerja';
$form['f1'] = 'etos_kerja';
$form['l1'] = 'Etos kerja penduduk';
$form['f2'] = 'ket_teks';
$form['l2'] = 'Keterangan';
$form['arr2'] = array("1"=>"Ya","2"=>"Tinggi","3"=>"Rendah","4"=>"Sedang","5"=>"Jarang","6"=>"Tidak");

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