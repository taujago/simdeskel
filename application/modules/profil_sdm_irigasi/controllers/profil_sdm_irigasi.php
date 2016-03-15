<?php 
class profil_sdm_irigasi extends op_controller {
	function __construct(){
		parent::__construct();
		$this->load->model("core_model","cm");
		//$this->load->model("pst","dm");
	}


	function index(){
		$form['controller'] = get_class($this);
		
$form['title1'] = 'Prasarana irigasi';
$form['title2'] = 'prasarana irigasi';
$form['table'] = 'profil_sdm_irigasi';
$form['id'] = 'profil_sdm_irigasi';
$form['f1'] = 'prasarana';
$form['l1'] = 'Prasarana irigasi';
$form['f2'] = 'jumlah';
$form['l2'] = 'Jumlah (unit)';
$form['f3'] = 'id_satuan_teks';
$form['l3'] = 'Satuan';
$form['arr3'] = $this->cm->arr_tabel("master_satuan","id_satuan","satuan","satuan");
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