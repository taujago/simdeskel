<?php 
class profil_sdm_usaha_hiburan extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
$form['title1'] = 'Usaha jasa hiburan';
$form['title2'] = 'usaha jasa hiburan';
$form['table'] = 'profil_sdm_usaha_hiburan';
$form['id'] = 'profil_sdm_usaha_hiburan';
$form['f1'] = 'hiburan';
$form['l1'] = 'Usaha jasa hiburan';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (unit)';
$form['f3'] = 'jenis';
$form['l3'] = 'Jenis produk yang <br>diperdagangakan <br>(jenis)';
$form['f4'] = 'tenaga_kerja';
$form['l4'] = 'Jumlah tenaga kerja <br>yang terserap <br>(orang)';
//add
		$form['default'] = 'id';
		$form['url'] = "grid/get_data";
		$cont = $form['controller'];
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